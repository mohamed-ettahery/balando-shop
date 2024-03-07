<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Entities\OrderEntity;
use App\Models\ProductModel;
use App\Entities\ProductEntity;
use App\Models\CategoryModel;
use App\Entities\CategoryEntity;
class Dashboard extends \App\Controllers\BaseController
{
    private $order;
    private $product;
    private $category;
    public function __CONSTRUCT()
    {
        $this->order = new OrderModel;
        $this->product = new ProductModel;
        $this->category = new CategoryModel;
    }
    public function index()
    {
        $countOrders = count($this->order->findAll());
        $pendingOrders = count($this->order->where("status","pending")->findAll());
        $countProducts = count($this->product->findAll());
        $countCategories = count($this->category->findAll());
        $countOrders = count($this->order->findAll());
        $orders = $this->order->select("*")->orderBy("id","DESC")->findAll(5);
        return view('admin/dashboard',["countOrders"=>$countOrders,"countProducts"=>$countProducts,"countCategories"=>$countCategories,"pendingOrders"=>$pendingOrders,"orders"=>$orders]);
    }
}
