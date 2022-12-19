<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'address';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','address','note','lat','lng'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "name" => "required|min_length[2]|max_length[255]",
        "address" => "required|min_length[2]|max_length[255]",
        // "note" => "required",
        "lat" => "required",
        "lng" => "required",
    ];
    protected $validationMessages   = [ 
        "name" => [
            "required" => "Name is required",
            "min_length" => "Minimum length of name should be 2 chars",
            "max_length" => "Maximum length of name should be 255 chars",
        ],
        "address" => [
            "required" => "Address is required",
            "min_length" => "Minimum length of address should be 2 chars",
            "max_length" => "Maximum length of address should be 255 chars",
        ],
        "lat" => [
            "required" => "Latitude is required"
        ],
        "lng" => [
            "required" => "Longtitude is required"
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

    

    public function CreateAddress()
    {
        $this->db->table('address')->insert([
            'name' => null, 
        ]);
        return $this->db->insertId();
    }

    public function GetAddress()
    {
        return $this->db->table('address')->select('*')->where('id = '.user()->address_id)->get()->getResult();
    }
}
