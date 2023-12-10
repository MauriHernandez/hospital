<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PacienteController extends BaseController
{
    public function index()
    {
        //
    }

    public function informacion()
    {
        $infoModel = model('InfoModel');
        $usuarioModel = model('UsuarioModel');
        $pacienteModel = model('PacienteModel');

        $session = session();

        // Verificar si el paciente ha iniciado sesión
        if ($session->get('logged_in') && $session->get('id_paciente') !== null) {
            $id_paciente = $session->get('id_paciente');

            // Obtener la información del paciente actual
            $data['paciente'] = $pacienteModel->find($id_paciente);
            $data['infoPaciente'] = $infoModel->where('id', $id_paciente)->findAll();

            $data['usuarioPaciente'] = $usuarioModel->find($data['paciente']->id);

            // Cargar vistas y pasar datos
            return view('common/head') .
                view('paciente/menu') .
                view('paciente/informacion', $data) .
                view('common/footer');
        } else {
            // El paciente no ha iniciado sesión, redirigir a la página de inicio de sesión
            return redirect('usuarios/login', 'refresh');
        }
    }
}
