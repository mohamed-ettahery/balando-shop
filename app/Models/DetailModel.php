<?php
namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table = "details";
    protected $allowedFields = ["order_id,product_id","qty","size"];
    // protected $useTimestamps = true;
    protected $returnType    = \App\Entities\DetailEntity::class;

    protected $validationRules = [
        'order_id'       => 'required',
        'product_id'       => 'required',
        'qty'       => 'required',
        'size'       => 'required',
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
        'order_id' => [
            'required' => 'Sorry, order id is required.',
        ],
    ];

}