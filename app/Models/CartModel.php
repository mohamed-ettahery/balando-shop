<?php
namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = "cart";
    protected $allowedFields = ["product_id","qty","size","ip"];
    // protected $useTimestamps = true;
    protected $returnType    = \App\Entities\CartEntity::class;

    protected $validationRules = [
        'product_id'       => 'required',
        'qty'       => 'required',
        'size'       => 'required',
        'ip'       => 'required',
    ];
    protected $validationMessages = [
        'product_id' => [
            'required' => 'Sorry, Product is required.',
        ],
        'qty' => [
            'required' => 'Sorry, qty is required.',
        ],
        'size' => [
            'required' => 'Sorry, size is required.',
        ],
        'ip' => [
            'required' => 'Sorry, ip is required.',
        ],
    ];

}