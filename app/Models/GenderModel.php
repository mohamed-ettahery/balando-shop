<?php
namespace App\Models;

use CodeIgniter\Model;

class GenderModel extends Model
{
    protected $table = "gender";
    protected $allowedFields = ["entitled"];
    // protected $useTimestamps = true;
    protected $returnType    = \App\Entities\GenderEntity::class;

    protected $validationRules = [
        'entitled'       => 'required',
    ];
    protected $validationMessages = [
        'entitled' => [
            'required' => 'Sorry, entitled is required.',
        ]
    ];

}