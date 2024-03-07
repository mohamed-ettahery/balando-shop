<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = "products";
    protected $allowedFields = ["name","image","price","description","rating","id_cat","id_gender"];
    // protected $useTimestamps = true;
    protected $returnType    = \App\Entities\ProductEntity::class;

    protected $validationRules = [
        'name'       => 'required|min_length[3]|max_length[100]',
        'image' => 'required',
        'price' => 'required',
        'description' => 'required|min_length[10]',
        'id_cat' => 'required',
        'id_gender' => 'required'

    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Sorry, name is required.',
            'min_length' => 'name must be atleast has a 3 characters.',
            'max_length' => 'name must be almost has a 100 characters.',
        ],
        'image' => [
            'required' => 'Sorry, image is required.',
        ],
        'price' => [
            'required' => 'Sorry, price is required.',
        ],
        'description' => [
            'required' => 'Sorry, description is required.',
            'min_length' => 'description must be atleast has a 10 characters.'
        ],
        'id_cat' => [
            'required' => 'Sorry, category is required.',
        ],
        'id_gender' => [
            'required' => 'Sorry, gender is required.',
        ]
    ];

}