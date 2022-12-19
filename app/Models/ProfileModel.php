<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'profiles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fullname','telephone','gender','birthdate'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "fullname" => "required|min_length[2]|max_length[255]",
        "telephone" => "required|min_length[10]|max_length[255]",
        // "note" => "required",
        "gender" => "required",
        "birthdate" => "required",
    ];
    protected $validationMessages   = [ 
        "fullname" => [
            "required" => "Name is required",
            "min_length" => "Minimum length of name should be 2 chars",
            "max_length" => "Maximum length of name should be 255 chars",
        ],
        "telephone" => [
            "required" => "Telephone is required",
            "min_length" => "Minimum length of telephone should be 10 chars",
            "max_length" => "Maximum length of telephone should be 255 chars",
        ],
        "gender" => [
            "required" => "Gender is required"
        ],
        "birthdate" => [
            "required" => "Birthdate is required"
        ]
    ];
    protected $skipValidation       = false; 
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function CreateProfile()
    {
        $this->db->table('profiles')->insert([
            'fullname' => null,
        ]);
        return $this->db->insertId();
    }
}
