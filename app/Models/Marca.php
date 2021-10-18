<?php 
namespace App\Models;

use CodeIgniter\Model;

class Marca extends Model{
    protected $table      = 'marcas';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre',];
}