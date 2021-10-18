<?php 
namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Model;
use PHPUnit\Framework\Constraint\RegularExpression;

class Vehiculo extends Model{
    protected $table      = 'vehiculos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_marca', 'id_modelo', 'id_tipo', 'id_color', 'precio_compra', 'precio_venta', 'cantidad'];

    public function getVehiculos()
    {
        $builder = $this->db->table("vehiculos");
        $builder->select('vehiculos.id as id, marcas.nombre as marca, modelos.nombre as modelo, tipos.nombre as tipo, colores.nombre as color, vehiculos.precio_venta as venta, vehiculos.precio_compra as compra, vehiculos.cantidad as existencias');
        $builder->join('marcas', 'vehiculos.id_marca = marcas.id');
        $builder->join('modelos', 'vehiculos.id_modelo = modelos.id');
        $builder->join('tipos', 'vehiculos.id_tipo = tipos.id');
        $builder->join('colores', 'vehiculos.id_color = colores.id');
        $dato = $builder->get()->getResultArray();

        return $dato;
    }

    public function getVehiculo($id)
    {
        
        $builder = $this->db->table("vehiculos");
        $builder->select('vehiculos.id as id, marcas.nombre as marca, modelos.nombre as modelo, tipos.nombre as tipo, colores.nombre as color, vehiculos.precio_venta as venta, vehiculos.precio_compra as compra, vehiculos.cantidad as existencias');
        $builder->join('marcas', 'vehiculos.id_marca = marcas.id');
        $builder->join('modelos', 'vehiculos.id_modelo = modelos.id');
        $builder->join('tipos', 'vehiculos.id_tipo = tipos.id');
        $builder->join('colores', 'vehiculos.id_color = colores.id');
        $builder->where('vehiculos.id',$id);
        $dato = $builder->get()->getRowArray();

        return $dato;
    }

    public function vehiculosBusqueda($busqueda)
    {
        
        $builder = $this->db->table("vehiculos");
        $builder->select('vehiculos.id as id, marcas.nombre as marca, modelos.nombre as modelo, tipos.nombre as tipo, colores.nombre as color, vehiculos.precio_venta as venta, vehiculos.precio_compra as compra, vehiculos.cantidad as existencias');
        $builder->join('marcas', 'vehiculos.id_marca = marcas.id');
        $builder->join('modelos', 'vehiculos.id_modelo = modelos.id');
        $builder->join('tipos', 'vehiculos.id_tipo = tipos.id');
        $builder->join('colores', 'vehiculos.id_color = colores.id');
        $builder->like('marcas.nombre', $busqueda);
        $builder->orLike('modelos.nombre', $busqueda);
        $builder->orLike('tipos.nombre', $busqueda);
        $builder->orLike('colores.nombre', $busqueda);

        $dato = $builder->get()->getResultArray();

        return $dato;
    }

}