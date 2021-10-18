<?php 
namespace App\Models;

use CodeIgniter\Model;

class Tipo extends Model{
    protected $table      = 'tipos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre',];
}