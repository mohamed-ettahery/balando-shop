<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GenderModel;
use App\Entities\GenderEntity;
class Genders extends BaseController
{
    private $gender;
    public function __CONSTRUCT()
    {
        $this->gender = new GenderModel;
    }
    public function index()
    {
        $genders = $this->gender->findAll();
        return view('admin/genders/view',["genders"=>$genders]);
    }
    public function add()
    {
        return view('admin/genders/add');
    }
    public function insert()
    {
        $gender = new GenderEntity($this->request->getPost());
        if($this->gender->insert($gender))
        {
            return redirect()->to("admin/genders")->with("success","gender Has been added successfuly !");
        }
        else
        {
            return redirect()->back()->with("errors",$this->gender->errors())->withinput(); 
        }
    }
    public function edit($id)
    {
        $gender = $this->gender->find($id);
        return view('admin/genders/edit',["gender"=>$gender]);
    }
    public function update($id)
    {
        $gender = $this->gender->find($id);
        $gender->fill($this->request->getPost());

        if($gender->hasChanged('entitled'))
        {
            if($this->gender->save($gender))
            {
                return redirect()->to("admin/genders")
                ->with("success","gender has been updated successfuly!");
            }
            else
            {
                return redirect()->back()
                ->with("errors",$this->gender->errors())
                ->withinput();
            }
        }
        else
        {
            return redirect()->back()
            ->with("info","There's nothing change!")
            ->withinput();
        }
    }
    public function delete($id)
    {
        $post = $this->gender->find($id);
        // if(session('admin'))
        // {
            if (!$post) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("gender Not found !");
            }
            $this->gender->delete($id);
            return redirect()->to("admin/genders")->with("success","The gender has been deleted succesfuly !");
        // }
        // else
        // {
        //     return redirect()->to("/")->with("warning","Not Authorized!"); 
        // }
    }
}
