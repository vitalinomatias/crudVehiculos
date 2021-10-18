<?php 
namespace App\Models;

use CodeIgniter\Model;

class Color extends Model{
    protected $table      = 'colores';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre',];
}