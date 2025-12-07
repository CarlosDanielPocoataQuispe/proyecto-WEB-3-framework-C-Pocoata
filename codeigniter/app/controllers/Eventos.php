<?php

namespace App\Controllers;

use App\Models\EventoModel;
use App\Models\LugarModel;
use App\Models\RolOrganizadorModel;

class Eventos extends BaseController
{
    public function index()
    {
        $model = new EventoModel();
        $data['registros'] = $model->findAll();
        $data['titulo'] = 'Eventos';
        $data['tipo'] = 'eventos';
        return $this->cargarVista('index', $data);
    }

    public function crear()
    {
        $lugarModel = new LugarModel();
        $rolModel = new RolOrganizadorModel();

        $data['lugares'] = $lugarModel->findAll();
        $data['roles'] = $rolModel->findAll();
        $data['titulo'] = 'Crear Evento';
        $data['tipo'] = 'eventos';
        return $this->cargarVista('crear', $data);
    }

    public function guardar()
    {
        $model = new EventoModel();
        $model->insert($this->request->getPost());
        return redirect()->to('/eventos');
    }

    public function editar($id)
    {
        $model = new EventoModel();
        $lugarModel = new LugarModel();
        $rolModel = new RolOrganizadorModel();

        $data['registro'] = $model->find($id);
        $data['lugares'] = $lugarModel->findAll();
        $data['roles'] = $rolModel->findAll();
        $data['titulo'] = 'Editar Evento';
        $data['tipo'] = 'eventos';
        return $this->cargarVista('editar', $data);
    }

    public function actualizar($id)
    {
        $model = new EventoModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/eventos');
    }

    public function eliminar($id)
    {
        $model = new EventoModel();
        $model->delete($id);
        return redirect()->to('/eventos');
    }

    private function cargarVista($vista, $data = [])
    {
        $session = session();
        $data['mensaje'] = $session->getFlashdata('success');

        // CSS y HTML directamente en el método
        echo $this->generarLayout($data, function () use ($vista, $data) {
            return view('eventos/' . $vista, $data);
        });
    }

    private function generarLayout($data, $contenidoCallback)
    {
        $menuActivo = $data['tipo'];
        $titulo = $data['titulo'];

        return '<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Gestión Eventos - ' . $titulo . '</title>
            <style>
                * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
                body { background: #f5f5f5; padding: 20px; }
                .container { max-width: 1200px; margin: 0 auto; }
                header { background: #2c3e50; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
                nav ul { display: flex; list-style: none; gap: 15px; margin-top: 10px; }
                nav a { color: white; text-decoration: none; padding: 8px 15px; background: #34495e; border-radius: 4px; }
                nav a:hover, nav a.active { background: #1abc9c; }
                .alert { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin: 10px 0; }
                table { width: 100%; background: white; border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
                th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
                th { background: #ecf0f1; }
                tr:hover { background: #f9f9f9; }
                .btn { display: inline-block; padding: 8px 15px; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; margin: 2px; }
                .btn-primary { background: #3498db; color: white; }
                .btn-edit { background: #2ecc71; color: white; }
                .btn-delete { background: #e74c3c; color: white; }
                .btn:hover { opacity: 0.9; }
                .form-container { background: white; padding: 30px; border-radius: 8px; max-width: 500px; margin: 0 auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
                .form-group { margin-bottom: 20px; }
                label { display: block; margin-bottom: 5px; font-weight: bold; }
                input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
                .actions { margin-bottom: 20px; }
            </style>
        </head>
        <body>
            <div class="container">
                <header>
                    <h1>Gestión de Eventos</h1>
                    <nav>
                        <ul>
                            <li><a href="' . base_url('eventos') . '" class="' . ($menuActivo == 'eventos' ? 'active' : '') . '">Eventos</a></li>
                            <li><a href="' . base_url('lugares') . '" class="' . ($menuActivo == 'lugares' ? 'active' : '') . '">Lugares</a></li>
                            <li><a href="' . base_url('roles') . '" class="' . ($menuActivo == 'roles' ? 'active' : '') . '">Roles</a></li>
                            <li><a href="' . base_url('asistentes') . '" class="' . ($menuActivo == 'asistentes' ? 'active' : '') . '">Asistentes</a></li>
                        </ul>
                    </nav>
                </header>
                
                <h2>' . $titulo . '</h2>
                
                ' . (!empty($data['mensaje']) ? '<div class="alert">' . $data['mensaje'] . '</div>' : '') . '
                
                ' . $contenidoCallback() . '
                
            </div>
        </body>
        </html>';
    }
}
