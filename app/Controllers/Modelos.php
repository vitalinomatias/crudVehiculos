<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Modelo;
class Modelos extends Controller{

    public function index()
    {
        $modelo = new Modelo();

        $datos['modelos'] = $modelo->findAll();

        $datos['mensaje'] = session('mensaje');
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('modelos/index', $datos);
    }

    public function create()
    {
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');
        return view('modelos/create', $datos);
    }

    public function store()
    {
        $modelo = new Modelo();

        $validacion = $this->validate([
            'modelo' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('modelo');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $modelo->insert($datos);
        if ($respuesta > 0) {
            return redirect()->to(base_url().'/modelos')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/modelos')->with('mensaje', '0');
        }
    }

    public function edit($id=null)
    {
        $modelo = new Modelo();
        $datos ['modelo'] = $modelo->where('id', $id)->first();
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('modelos/edit', $datos);
    }

    public function update($id=null)
    {
        $modelo = new Modelo();

        $validacion = $this->validate([
            'modelo' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('modelo');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $modelo->update($id,$datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/modelos')->with('mensaje', '3');
        } else {
            return redirect()->to(base_url().'/modelos')->with('mensaje', '4');
        }
        
    }

    public function destroy($id = null)
    {
        $modelo = new Modelo();

        $respuesta = $modelo->where('id',$id)->delete($id);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/modelos')->with('mensaje', '5');
        } else {
            return redirect()->to(base_url().'/modelos')->with('mensaje', '6');
        }
    }
}