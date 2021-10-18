<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Color;
class Colores extends Controller{

    public function index()
    {
        $color = new Color();

        $datos['colores'] = $color->findAll();

        $datos['mensaje'] = session('mensaje');
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('colores/index', $datos);
    }

    public function create()
    {
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');
        return view('colores/create', $datos);
    }

    public function store()
    {
        $color = new Color();

        $validacion = $this->validate([
            'color' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('color');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $color->insert($datos);
        if ($respuesta > 0) {
            return redirect()->to(base_url().'/colores')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/colores')->with('mensaje', '0');
        }
    }

    public function edit($id=null)
    {
        $color = new Color();
        $datos ['color'] = $color->where('id', $id)->first();
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('colores/edit', $datos);
    }

    public function update($id=null)
    {
        $color = new Color();

        $validacion = $this->validate([
            'color' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('color');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $color->update($id,$datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/colores')->with('mensaje', '3');
        } else {
            return redirect()->to(base_url().'/colores')->with('mensaje', '4');
        }
        
    }

    public function destroy($id = null)
    {
        $color = new Color();

        $respuesta = $color->where('id',$id)->delete($id);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/colores')->with('mensaje', '5');
        } else {
            return redirect()->to(base_url().'/colores')->with('mensaje', '6');
        }
    }
}