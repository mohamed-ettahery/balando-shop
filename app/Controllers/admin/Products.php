<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Entities\ProductEntity;
use App\Models\CategoryModel;
use App\Entities\CategoryEntity;
use App\Models\GenderModel;
use App\Entities\GenderEntity;

class Products extends BaseController
{
    private $product;
    private $category;
    private $gender;
    public function __CONSTRUCT()
    {
        $this->product = new ProductModel;
        $this->category = new CategoryModel;
        $this->gender = new GenderModel;
    }
    public function index()
    {
        $cats = $this->category->findAll();
        $genders = $this->gender->findAll();
        $products = $this->product->select("products.*,(select name from categories WHERE products.id_cat = categories.id) as 'catName',(select entitled from gender WHERE products.id_gender = gender.id) as 'genderName'")->orderBy("id","DESC")->paginate(2);
        return view('admin/products/view',["products" => $products,"cats" => $cats,"genders" => $genders,"pager"=>$this->product->pager]);
    }
    public function add()
    {
        $cats = $this->category->findAll();
        $genders = $this->gender->findAll();
        return view('admin/Products/add',["cats"=> $cats,"genders" => $genders]);
    }
    public function insert()
    {
        $product = new ProductEntity($this->request->getPost());
        $file = $this->request->getFile('image');
        if ($file->isValid()) {
                //check Extension
                $fileType = $file->getMimeType();
                $types = ['image/jpg','image/jpeg','image/png'];
                if(!in_array($fileType,$types))
                {
                return redirect()->back()
                ->with('error' , "Image Exension is wrong")
                ->withinput();
                }
                //check Size
                $fileSize = $file->getSizeByUnit("mb");
                if($fileSize > 2) {
                return redirect()->back()
                ->with('error' , "Image size must be equal or less than 2mb")
                ->withinput();
                }

                // $old_img_name = $this->request->getPost('hidden_image_name');
                $fileName = $file->getRandomName();
                $product->image = $fileName;
                // if($file->move("./images/products",$fileName))
                // {
                //     if(file_exists("./images/products/".$old_img_name) && $old_img_name!="default.jpg")
                //     {
                //         unlink("./images/profiles/".$old_img_name);
                //     }
                // }   
        }
        if($this->product->insert($product))
        {
            $file->move("./images/products",$fileName);
            return redirect()->to("admin/Products")->with("success","Product Has been added successfuly !");
        }
        else
        {
            return redirect()->back()->with("errors",$this->gender->errors())->withinput(); 
        }
    }
    public function edit($id)
    {
        $cats = $this->category->findAll();
        $genders = $this->gender->findAll();
        $product = $this->product->find($id);
        return view('admin/Products/edit',["product"=>$product,"cats"=>$cats,"genders"=>$genders]);
    }
    public function update($id)
    {
        $product = $this->product->find($id);
        $product->fill($this->request->getPost());

        // ***********************
                //upload image file

                $file = $this->request->getFile('image');
                if ($file->isValid()) {
                        //check Extension
                        $fileType = $file->getMimeType();
                        $types = ['image/jpg','image/jpeg','image/png'];
                        if(!in_array($fileType,$types))
                        {
                        return redirect()->back()
                        ->with('error' , "Image Exension is wrong")
                        ->withinput();
                        }
                        //check Size
                        $fileSize = $file->getSizeByUnit("mb");
                        if($fileSize > 2) {
                        return redirect()->back()
                        ->with('error' , "Image size must be equal or less than 2mb")
                        ->withinput();
                        }

                        $old_img_name = $this->request->getPost('hidden_image_name');
                        $fileName = $file->getRandomName();
                        $product->image = $fileName;
                        if($file->move("./images/products",$fileName))
                        {
                            if(file_exists("./images/products/".$old_img_name))
                            {
                                unlink("./images/products/".$old_img_name);
                            }
                        }   
                }
      
        
        // ***********************

        if($product->hasChanged('name')||$product->hasChanged('price')||$product->hasChanged('description')||$product->hasChanged('rating')||$product->hasChanged('id_cat')||$product->hasChanged('id_gender')||$product->hasChanged('image'))
        {
            if($this->product->save($product))
            {
                return redirect()->to("admin/Products/edit/$id")
                ->with("success","Product has been updated successfuly !");
            }
            else
            {
                return redirect()->back()
                ->with("errors",$this->product->errors())
                ->withinput();
            }
        }
        else
        {
            return redirect()->back()
            ->with("info","  There's Nothing change!")
            ->withinput();
        }
    }
    public function delete($id)
    {
        $product = $this->product->find($id);
        // if(session('admin'))
        // {
            if (!$post) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("product Not found !");
            }
            $this->product->delete($id);
            return redirect()->to("admin/Products")->with("success","The product has been deleted succesfuly !");
        // }
        // else
        // {
        //     return redirect()->to("/")->with("warning","Not Authorized!"); 
        // }
    }
}
