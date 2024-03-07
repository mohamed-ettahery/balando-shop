<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Entities\CartEntity;
use App\Models\ProductModel;
use App\Entities\ProductEntity;
use App\Models\OrderModel;
use App\Entities\OrderEntity;
use App\Models\DetailModel;
use App\Entities\DetailEntity;
class Cart extends BaseController
{
    private $cart;
    private $product;
    private $order;
    private $detail;
    public function __CONSTRUCT()
    {
        $this->cart = new CartModel;
        $this->product = new ProductModel;
        $this->order = new OrderModel;
        $this->detail = new DetailModel;
    }
    public function index()
    {
        $db       = \Config\Database::connect();
        $Query   = "SELECT products.*,categories.name as 'catName',cart.qty as 'qty',cart.size as 'size' FROM `products`
        INNER JOIN categories ON categories.id = products.id_cat
        INNER JOIN cart ON cart.product_id = products.id 
        WHERE cart.ip = '{$this->getUserIP()}'";
        $builder = $db->query($Query);
        $items  = $builder->getResult();

        $RelatedProducts = $this->product->select("products.*,(select name from categories WHERE products.id_cat = categories.id) as 'catName',(select entitled from gender WHERE products.id_gender = gender.id) as 'genderName'")->orderBy('rand()')->findAll("12");

        return view('cart',["items"=>$items,"relates"=>$RelatedProducts,"user_ip"=>$this->getUserIP()]);
    }
    public function delete($id)
    {
        $check = $this->cart->where(["product_id"=>$id,"ip"=>$this->getUserIP()])->first();
        if($check)
        {
            $this->cart->where("product_id",$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
    public function purchase()
    {
        return view("confirm-order",["user_ip"=>$this->getUserIP()]);
    }
    public function confirmOrder()
    {
        $db       = \Config\Database::connect();


        // if($builder)
        // {
        //     echo "inserted";
        // }
        // else
        // {
        //     echo "doesn't inserted";
        // }

        $order = new OrderEntity($this->request->getPost());
        $items = $this->cart->where("ip",$this->getUserIP())->findAll();

        if(!empty($items))
        {
            if($this->order->insert($order))
            {
                $order = $this->order->orderBy("id","DESC")->first();
                $order_id = $order->id;
                    foreach($items as $item)
                    {
                        $data = [
                            'order_id' => $order_id,
                            'product_id' => $item->product_id,
                            'size'       => $item->size,
                            'qty'        => $item->qty
                        ];
                       $db->table('details')->insert($data);
                        // $this->detail->insert($data);
                    }
                    $this->cart->where("ip",$this->getUserIP())->delete();
                    return view("thank-you",["user_ip"=>$this->getUserIP()]);
               

            }
            else
            {
                // dd($this->order->errors());
                return redirect()->back()->with("errors",$this->order->errors())->withInput();
            }
        }
        else
        {
          return redirect()->back()->with("error","Cart is empty !");
        }
    }
}
