<?php
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = "orders";
    protected $allowedFields = ["clientName","phone","email","address","order_date","delivery_date","status"];
    // protected $useTimestamps = true;
    protected $returnType    = \App\Entities\OrderEntity::class;

    protected $validationRules = [
        'clientName'   => 'required|min_length[3]|max_length[50]',
        'phone'        => 'required|min_length[9]|max_length[15]',
        'email'        => 'required|min_length[10]|valid_email|max_length[100]',
        'address'      => 'required',
    ];
    protected $validationMessages = [
        'clientName' => [
            'required' => 'Sorry, name is required.',
            'min_length' => 'name must be atleast has a 3 characters.',
            'max_length' => 'name must be almost has a 50 characters.',
        ],
        'phone' => [
            'required' => 'Sorry, phone is required.',
            'min_length' => 'phone must be atleast has a 9 characters.',
            'max_length' => 'phone must be almost has a 15 characters.',
        ],
        'email' => [
            'required' => 'Sorry, email is required.',
            'min_length' => 'email must be atleast has a 10 characters.',
            'valid_email' => 'invalid email.',
            'max_length' => 'email must be almost has a 100 characters.',
        ],
        'address' => [
            'required' => 'Sorry, address is required.',
        ],
    ];

}