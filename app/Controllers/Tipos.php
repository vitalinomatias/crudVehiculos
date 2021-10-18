<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Tipo;
class Tipos extends Controller{

    public function index()
    {
        $tipo = new Tipo();

        $datos['tipos'] = $tipo->findAll();

        $datos['mensaje'] = session('mensaje');
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('tipos/index', $datos);
    }

    public function create()
    {
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');
        return view('tipos/create', $datos);
    }

    public function store()
    {
        $tipo = new Tipo();

        $validacion = $this->validate([
            'tipo' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('tipo');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $tipo->insert($datos);
        if ($respuesta > 0) {
            return redirect()->to(base_url().'/tipos')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/tipos')->with('mensaje', '0');
        }
    }

    public function edit($id=null)
    {
        $tipo = new Tipo();
        $datos ['tipo'] = $tipo->where('id', $id)->first();
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('tipos/edit', $datos);
    }

    public function update($id=null)
    {
        $tipo = new Tipo();

        $validacion = $this->validate([
            'tipo' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('tipo');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $tipo->update($id,$datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/tipos')->with('mensaje', '3');
        } else {
            return redirect()->to(base_url().'/tipos')->with('mensaje', '4');
        }
        
    }

    public function destroy($id = null)
    {
        $tipo = new Tipo();

        $respuesta = $tipo->where('id',$id)->delete($id);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/tipos')->with('mensaje', '5');
        } else {
            return redirect()->to(base_url().'/tipos')->with('mensaje', '6');
        }
    }
}