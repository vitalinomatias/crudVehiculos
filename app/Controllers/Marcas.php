<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Marca;
class Marcas extends Controller{

    public function index()
    {
        $marcas = new Marca();

        $datos['marcas'] = $marcas->findAll();

        $datos['mensaje'] = session('mensaje');
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('marcas/index', $datos);
    }

    public function create()
    {
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');
        return view('marcas/create', $datos);
    }

    public function store()
    {
        $marca = new Marca();

        $validacion = $this->validate([
            'nombre' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('nombre');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $marca->insert($datos);
        if ($respuesta > 0) {
            return redirect()->to(base_url().'/marcas')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url().'/marcas')->with('mensaje', '0');
        }
    }

    public function edit($id=null)
    {
        $marca = new Marca();
        $datos ['marca'] = $marca->where('id', $id)->first();
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('marcas/edit', $datos);
    }

    public function update($id=null)
    {
        $marca = new Marca();

        $validacion = $this->validate([
            'marca' => 'required',
        ]);

        if (!$validacion){
            $session = session();
            $session->setFlashdata('mensaje','Todos los campos son obligatorios');

            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getVar('marca');

        $datos = [
            'nombre' => $nombre,
        ];

        $respuesta = $marca->update($id,$datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/marcas')->with('mensaje', '3');
        } else {
            return redirect()->to(base_url().'/marcas')->with('mensaje', '4');
        }
        
    }

    public function destroy($id = null)
    {
        $marca = new Marca();

        $respuesta = $marca->where('id',$id)->delete($id);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/marcas')->with('mensaje', '5');
        } else {
            return redirect()->to(base_url().'/marcas')->with('mensaje', '6');
        }
    }

}
