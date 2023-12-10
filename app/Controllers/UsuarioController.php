<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsuarioController extends BaseController
{
    public function index()
    {
      //Redireccionar en caso de que ya tenga una sesión iniciada
      $session = session();
      //Se envía a la vista según el tipo de usuario que se tenga
      if ($session->get('logged_in') == 1) {
          if ($session->get('doctor') == 0 && $session->get('paciente') == 0) {
            return redirect('admin/doctor/agregar', 'refresh');
          }

          if ($session->get('doctor') == 1 && $session->get('paciente') == 0) {
              return redirect('doctor', 'refresh');
          }

          if ($session->get('doctor') == 0 && $session->get('paciente') == 1) {
              return redirect('paciente/informacion', 'refresh');
          }
      }

      if (strtolower($this->request->getMethod()) === 'get') {
          return 
          view('common/head') .
              view('usuarios/login') .
              view('common/footer');
      }


      //Reglas de validación del formulario anterior
      $validation = \Config\Services::validation();
      $rules = [
          'tipo' => 'required|string',
          'email' => 'required|max_length[50]|min_length[1]|string',
          'contraseña' => 'required|max_length[150]|min_length[1]|string',
      ];

      //Se validan los datos del formulario
      if (!$this->validate($rules)) {
          return view('common/head') .
              view('usuarios/login', ['validation' => $validation]) .
              view('common/footer');
      } else {
          //si pasa las reglas, se redirecciona a la respectiva vista principal, guardanfo
          // el username y un id de referenci
          $email = $_POST['email'];
          $contraseña = $_POST['contraseña'];
          $tipo = $_POST['tipo'];
          $usuarioModel = model('UsuarioModel');

          if ($tipo == 'doctor') {
              $data['usuario'] = $usuarioModel->where('email', $email)
                  ->where('contraseña', $contraseña)
                  ->where('paciente', NULL)
                  ->findAll();
          }

          if ($tipo == 'paciente') {
              $data['usuario'] = $usuarioModel->where('email', $email)
                  ->where('contraseña', $contraseña)
                  ->where('doctor', NULL)
                  ->findAll();
          }

          if ($tipo == 'administrador') {
              $data['usuario'] = $usuarioModel->where('email', $email)
                  ->where('contraseña', $contraseña)
                  ->where('paciente', NULL)
                  ->where('doctor', NULL)
                  ->findAll();
          }
          if (count($data['usuario']) > 0) {
          

              if ($tipo == 'administrador') {
                  session()->set([
                      'idUsuario' => $data['usuario'][0]->id,
                      'email' => $data['usuario'][0]->email,
                      'logged_in' => true,
                  ]);
                  return redirect('admin/doctor/agregar', 'refresh');
              }

              if ($tipo == 'doctor') {
                  session()->set([
                      'idUsuario' => $data['usuario'][0]->id,
                      'email' => $data['usuario'][0]->email,
                      'logged_in' => true,
                      'doctor' => $data['usuario'][0]->doctor
                  ]);

                  return redirect('doctor', 'refresh');
              }

              if ($tipo == 'paciente') {
                  session()->set([
                      'idUsuario' => $data['usuario'][0]->id,
                      'email' => $data['usuario'][0]->email,
                      'logged_in' => true,
                      'paciente' => $data['usuario'][0]->paciente
                  ]);
                  return redirect('paciente/informacion', 'refresh');

              }
          } else {

              return redirect('/', 'refresh');
          }
      }

  }

  public function cerrarSesion()
  {
      //Redireccionar en caso de que ya tenga una sesión iniciada
      $session = session();
      if ($session->get('logged_in') == TRUE) {
          session_destroy();
          return redirect('/', 'refresh');
      }
  }

}
