<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Entities\ProductEntity;
use App\Models\CategoryModel;
use App\Entities\CategoryEntity;
use App\Models\GenderModel;
use App\Entities\GenderEntity;
use App\Models\CartModel;
use App\Entities\CartEntity;

class Shop extends BaseController
{
    private $product;
    private $category;
    private $gender;
    private $cart;
    public function __CONSTRUCT()
    {
        $this->product = new ProductModel;
        $this->category = new CategoryModel;
        $this->gender = new GenderModel;
        $this->cart = new CartModel;
    }
    public function index()
    {
        $cats = $this->category->findAll();
        $genders = $this->gender->findAll();
        $products = $this->product->select("products.*,(select name from categories WHERE products.id_cat = categories.id) as 'catName',(select entitled from gender WHERE products.id_gender = gender.id) as 'genderName'")->orderBy("id","DESC")->paginate(2);
        return view('shop',["products" => $products,"cats" => $cats,"genders" => $genders,"pager"=>$this->product->pager,"user_ip"=>$this->getUserIP()]);
    }
    public function details($id)
    {
        $product = $this->product->select("products.*,(select name from categories WHERE products.id_cat = categories.id) as 'catName',(select entitled from gender WHERE products.id_gender = gender.id) as 'genderName'")->find($id);
        $RelatedProducts = $this->product->select("products.*,(select name from categories WHERE products.id_cat = categories.id) as 'catName',(select entitled from gender WHERE products.id_gender = gender.id) as 'genderName'")->orderBy('rand()')->where(["id_cat"=>$product->id_cat,"id!="=>$product->id])->findAll("12");
        return view('details',["product"=>$product,"relates"=>$RelatedProducts,"user_ip"=>$this->getUserIP()]);
        // print_r($RelatedProducts);
    }
    public function addToCart($id)
    {
        $product = $this->product->find($id);
        if($product)
        {
            $product_size = $this->request->getPost("size");
            $product_quanity = $this->request->getPost("qty");
            $user_IP = $this->getUserIP();
            
            $checkProduct = $this->cart->where(["ip"=>$user_IP,"product_id"=>$id])->first();
            if(!$checkProduct)
            {
                $Item = new CartEntity($this->request->getPost());
                $Item->ip = $user_IP;
                $this->cart->insert($Item);
                return redirect()->back()->with("success","Item has been added in your cart !");
                // if($this->cart->insert($Item))
                // {
                //     echo "added";
                //     // return redirect()->back()->with("success","Item has been added in your cart !");
                // }
                // else
                // {
                //     echo "Error server";
                //     // return redirect()->back()->with("error","Wrong in the server !");
                // }
            }
            else
            {
                return redirect()->back()->with("error","This item already exist in your cart !");
            }
        }
    }
    // public function getUserIP()
    // {
    //     // Get real visitor IP behind CloudFlare network
    //     if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    //               $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    //               $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    //     }
    //     $client  = @$_SERVER['HTTP_CLIENT_IP'];
    //     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    //     $remote  = $_SERVER['REMOTE_ADDR'];
    
    //     if(filter_var($client, FILTER_VALIDATE_IP))
    //     {
    //         $ip = $client;
    //     }
    //     elseif(filter_var($forward, FILTER_VALIDATE_IP))
    //     {
    //         $ip = $forward;
    //     }
    //     else
    //     {
    //         $ip = $remote;
    //     }
    
    //     return $ip;
    // }
}
