<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Entities\OrderEntity;
use App\Models\DetailModel;
use App\Entities\DetailEntity;
use App\Models\ProductModel;
use App\Entities\ProductEntity;

class Orders extends BaseController
{
    private $order;
    private $detail;
    private $product;
    public function __CONSTRUCT()
    {
        $this->order = new OrderModel;
        $this->detail = new DetailModel;
        $this->product = new productModel;
    }
    public function index()
    {
        $orders = $this->order->select("*")->orderBy("id","DESC")->paginate(6);
        return view("admin/orders/view",["orders"=>$orders,"pager"=>$this->order->pager]);
    }
    public function confirm($id)
    {
        $order = $this->order->find($id);
        if($order)
        {
          $update = $this->order->update($id,["status"=>"confirmed"]);
          if($update)
          {
            return redirect()->back()->with("success","The Order $id Has been Confiemed !");
          }
          else
          {
            return redirect()->back()->with("error","Failed in the server, try again!");
          }
        }
        else
        {
            return redirect()->back()->with("error","Sorry , There's No order by this name !");
        }
    }
    public function cancel($id)
    {
        $order = $this->order->find($id);
        if($order)
        {
          $update = $this->order->update($id,["status"=>"canceled"]);
          if($update)
          {
            return redirect()->back()->with("success","The Order $id Has been Canceled !");
          }
          else
          {
            return redirect()->back()->with("error","Failed in the server, try again!");
          }
        }
        else
        {
            return redirect()->back()->with("error","Sorry , There's No order by this name !");
        }
    }
    public function vieworder($id)
    {
      $db      = \Config\Database::connect();
      $Query   = "SELECT products.*,details.size as 'proSize',details.qty as 'proQty' FROM `products`
      INNER JOIN details ON details.product_id = products.id
      INNER JOIN orders ON orders.id = details.order_id
      WHERE orders.id = $id";
      $builder = $db->query($Query);
      $items  = $builder->getResult();
        $order = $this->order->find($id);
        return view("admin/orders/view-order",["order"=>$order,"items"=>$items]);
    }
}
