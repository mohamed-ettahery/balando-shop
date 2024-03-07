<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Entities\CategoryEntity;
class Categories extends \App\Controllers\BaseController
{
    private $category;
    public function __CONSTRUCT()
    {
        $this->category = new CategoryModel;
    }
    public function index()
    {
        $cats = $this->category->findAll();
        return view('admin/categories/view',["cats"=>$cats]);
    }
    public function add()
    {
        return view('admin/categories/add');
    }
    public function insert()
    {
        $category = new CategoryEntity($this->request->getPost());
        if($this->category->insert($category))
        {
            return redirect()->to("admin/Categories")->with("success","Category Has been added successfuly !");
        }
        else
        {
            return redirect()->back()->with("errors",$this->category->errors())->withinput(); 
        }
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('admin/categories/edit',["cat"=>$category]);
    }
    public function update($id)
    {
        $category = $this->category->find($id);
        $category->fill($this->request->getPost());

        if($category->hasChanged('name')||$category->hasChanged('description'))
        {
            if($this->category->save($category))
            {
                return redirect()->to("admin/Categories")
                ->with("success","Category has been updated successfuly!");
            }
            else
            {
                return redirect()->back()
                ->with("errors",$this->category->errors())
                ->withinput();
            }
        }
        else
        {
            return redirect()->back()
            ->with("info","There's nothing change!")
            ->withinput();
        }

        // $update = $this->category->update($id,[
        //     "name" => esc($this->request->getPost("name")),
        //     "description" => esc($this->request->getPost("description")),
        // ]);

        // if($update)
        // {
        //     return redirect()->to("admin/Categories")->with("success","Category Has been updated successfuly !");
        // }
        // else
        // {
        //     return redirect()->back()->with("errors",$this->category->errors())->withinput(); 
        // }
    }
    public function delete($id)
    {
        $post = $this->category->find($id);
        // if(session('admin'))
        // {
            if (!$post) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Category Not found !");
            }
            $this->category->delete($id);
            return redirect()->to("admin/Categories")->with("success","The category has been deleted succesfuly !");
        // }
        // else
        // {
        //     return redirect()->to("/")->with("warning","Not Authorized!"); 
        // }
    }
}
