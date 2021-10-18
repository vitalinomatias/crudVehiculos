<?php 
namespace App\Models;

use CodeIgniter\Model;

class Modelo extends Model{
    protected $table      = 'modelos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre',];
}