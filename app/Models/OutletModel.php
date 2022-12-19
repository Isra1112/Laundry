<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'outlet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["name","address","telephone","lat","lng"] ;

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
        "telephone" => "required|min_length[10]|max_length[14]",
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
        "telephone" => [
            "required" => "Telephone is required",
            "min_length" => "Minimum length of telephone should be 10 chars",
            "max_length" => "Maximum length of telephone should be 255 chars",
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

    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
}
