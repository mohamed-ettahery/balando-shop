<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = "categories";
    protected $allowedFields = ["name","description"];
    // protected $useTimestamps = true;
    protected $returnType    = \App\Entities\CategoryEntity::class;

    protected $validationRules = [
        'name'       => 'required|min_length[2]|max_length[100]',
        'description' => 'required|min_length[10]|max_length[300]',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Sorry, name is required.',
            'min_length' => 'name must be atleast has a 2 characters.',
            'max_length' => 'name must be almost has a 100 characters.',
        ],
        'description' => [
            'required' => 'Sorry, description is required.',
            'min_length' => 'description must be atleast has a 10 characters.',
            'max_length' => 'description must be almost has a 300 characters.',
        ]
    ];

}