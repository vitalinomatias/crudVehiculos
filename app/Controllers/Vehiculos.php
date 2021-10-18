<?php 
namespace App\Controllers;

use App\Models\Color;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Tipo;
use CodeIgniter\Controller;
use App\Models\Vehiculo;

class Vehiculos extends Controller{  
    
    public function index()
    {
        $vehiculo = new Vehiculo();

        if($this->request->getVar('busqueda')){
            $datos['vehiculos'] = $vehiculo->vehiculosBusqueda($this->request->getVar('busqueda'));
        } else {
            $datos['vehiculos'] = $vehiculo->getVehiculos();
        }


        

        $datos['mensaje'] = session('mensaje');
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('vehiculos/index', $datos,);
    }

    public function create()
    {
        $marcas = new Marca();
        $modelos = new Modelo();
        $tipos = new Tipo();
        $colores = new Color();

        $datos['marcas'] = $marcas->findAll();
        $datos['modelos'] = $modelos->findAll();
        $datos['tipos'] = $tipos->findAll();
        $datos['colores'] = $colores->findAll();

        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');
        return view('vehiculos/create', $datos);
    }

    public function store()
    {
        $vehiculo = new Vehiculo();

        $validacion = $this->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'tipo' => 'required',
            'color' => 'required',
            'venta' => 'required',
            'compra' => 'required',
            'cantidad' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $marca = $this->request->getVar('marca');
        $modelo = $this->request->getVar('modelo');
        $tipo = $this->request->getVar('tipo');
        $color = $this->request->getVar('color');
        $venta = $this->request->getVar('venta');
        $compra = $this->request->getVar('compra');
        $cantidad = $this->request->getVar('cantidad');

        $datos = [
            'id_marca' => $marca,
            'id_modelo' => $modelo,
            'id_tipo' => $tipo,
            'id_color' => $color,
            'precio_compra' => $venta,
            'precio_venta' => $compra,
            'cantidad' => $cantidad,
        ];

        $respuesta = $vehiculo->insert($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/vehiculos')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/vehiculos')->with('mensaje', '0');
        }
    }

    public function edit($id=null)
    {
        $vehiculo = new Vehiculo();

        $datos['vehiculo'] = $vehiculo->getVehiculo($id);

        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('vehiculos/edit', $datos);
    }

    public function update($id=null)
    {
        $vehiculo = new Vehiculo();

        $validacion = $this->validate([
            'venta' => 'required',
            'compra' => 'required',
            'cantidad' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $venta = $this->request->getVar('venta');
        $compra = $this->request->getVar('compra');
        $cantidad = $this->request->getVar('cantidad');

        $datos = [
            'precio_compra' => $venta,
            'precio_venta' => $compra,
            'cantidad' => $cantidad,
        ];

        $respuesta = $vehiculo->update($id,$datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/vehiculos')->with('mensaje', '3');
        } else {
            return redirect()->to(base_url().'/vehiculos')->with('mensaje', '4');
        }
    }

    public function destroy($id = null)
    {
        $vehiculo = new Vehiculo();

        $respuesta = $vehiculo->where('id',$id)->delete($id);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/vehiculos')->with('mensaje', '5');
        } else {
            return redirect()->to(base_url().'/vehiculos')->with('mensaje', '6');
        }
    }
}