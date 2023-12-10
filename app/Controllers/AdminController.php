<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        //
    }


    public function inicio()
    {

        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return 
            view('common/head') .
           
           '<div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        ' . view('admin/menuA') . '
                    </div>
                    <div class="col-md-10">
                        ' . view('admin/inicio')
                        . '
                    </div>
                </div>
            </div>' .
           view('common/footer');
           
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }


       
    }
    //FUNCIONES CON DOCTOR
    //-------------------------------------------------------------------------------------------------------------------------------------------------
    //MOSTRAR ---------------------------------------------------------------------------------------------------------
    public function mostrarDoctor(){
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $infoModel = model('InfoModel');
        $data['infos'] = $infoModel->findAll();

        $usuarioModel = model('UsuarioModel');
        $data['usuarios'] = $usuarioModel->findAll();

        $doctorModel = model('DoctorModel');
        $data['doctors'] = $doctorModel->findAll();

        return view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/doctor/mostrar', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
    }
       // AGREGAR DOCTOR--------------------------------------------------------------------------
       
    public function agregarDoctor()
    {    $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        if (strtolower($this->request->getMethod()) === 'get') {
            return 
                view('common/head') .
                '<div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        ' . view('admin/menuA') . '
                    </div>
                    <div class="col-md-10">
                        ' . view('admin/doctor/agregar') . '
                    </div>
                </div>
            </div>' .
           view('common/footer');

        }
    }
    //AGREGAR USUARIO DOCTOR----------------------------------------------------------------------
    public function agregarUsuario()
    { $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $validation = \Config\Services::validation();
        $rules = [
            'nombre' => 'required|max_length[15]|min_length[3]|string',
            'apellidoP' => 'required|max_length[15]|string',
            'apellidoM' => 'required|max_length[15]|string',
            'genero' => 'required|max_length[10]|alpha_numeric_punct',
            'celular' => 'required|max_length[15]|min_length[10]',
            'especialidad' => 'required|max_length[50]|min_length[3]',
            'turno'=> 'required',
            'departamento'=> 'required',
            'estado' => 'required|max_length[50]|min_length[2]|string',
            'municipio' => 'required|max_length[50]|min_length[2]|string',
            'colonia' => 'required|max_length[50]|min_length[2]|string',
            'calle' => 'required|max_length[50]|min_length[2]|string',
            'numeroExterior' => 'required|max_length[11]|integer',
            'numeroInterior' => 'max_length[11]|',
            'codigoPostal' => 'required|max_length[5]|integer',       
        ];
    
        $data = [
            "nombre" => $_POST['nombre'],
            "apellidoP" => $_POST['apellidoP'],
            "apellidoM" => $_POST['apellidoM'],
            "genero" => $_POST['genero'],
            "celular" => $_POST['celular'],
            "especialidad" => $_POST['especialidad'],
            "turno"=> $_POST['turno'],
            "departamento"=>$_POST['departamento'],
            "estado"=>$_POST['estado'],
            "municipio"=>$_POST['municipio'],
            "colonia"=>$_POST['colonia'],
            "calle"=>$_POST['calle'],
            "numeroExterior"=>$_POST['numeroExterior'],
            "numeroInterior"=>$_POST['numeroInterior'],
            "codigoPostal"=>$_POST['codigoPostal'],
            'validation' => $validation
        ];
        if (!$this->validate($rules)) {
    
            return 

            view('common/head') .
       
            '<div class="container-fluid">
                 <div class="row">
                     <div class="col-md-2">
                         ' . view('admin/menuA') . '
                     </div>
                     <div class="col-md-10">
                         ' . view('admin/doctor/agregar', $data) . '
                     </div>
                 </div>
             </div>' .
            view('common/footer');


    
        } else {
            return 
            view('common/head') .
            '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/doctor/agregarUsuario', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
            
      
        }
    
    }
    
    public function insertDoctor()
    { $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $validation = \Config\Services::validation();
        $rules = [
            'email' => 'required|max_length[100]|min_length[7]|valid_email',
            'contraseña' => 'required|max_length[150]|min_length[1]|string',
            'especialidad' => 'required|max_length[50]|min_length[3]',
        ];
        if (!$this->validate($rules)) {        
            $data = [
                "nombre" => $_POST['nombre'],
                "apellidoP" => $_POST['apellidoP'],
                "apellidoM" => $_POST['apellidoM'],
                "genero" => $_POST['genero'],
                "celular" => $_POST['celular'],
                "especialidad" => $_POST['especialidad'],
                "turno"=> $_POST['turno'],
                "departamento"=>$_POST['departamento'],
                "estado"=>$_POST['estado'],
                "municipio"=>$_POST['municipio'],
                "colonia"=>$_POST['colonia'],
                "calle"=>$_POST['calle'],
                "numeroExterior"=>$_POST['numeroExterior'],
                "numeroInterior"=>$_POST['numeroInterior'],
                "codigoPostal"=>$_POST['codigoPostal'],
                'validation' => $validation
            ];
    
            return 
            view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/doctor/agregarUsuario', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
      
    
        } else {
        //informacion profesional
            $doctorModel = model('DoctorModel');
            $dataDoctor = [
            "especialidad" => $_POST['especialidad'],
            "turno"=> $_POST['turno'],
            "departamento"=>$_POST['departamento'],
                "created_at" => date('Y-m-d')
            ];
            $doctorModel->insert($dataDoctor);
    //informacion de usuario
            $usuarioModel = model('UsuarioModel');
            $dataUsuario= [
                "email" => $_POST['email'],
                "contraseña" => $_POST['contraseña'],
                "doctor" => $doctorModel->getInsertID(),
                "created_at" => date('Y-m-d')
            ];
            $usuarioModel->insert($dataUsuario);
    //información personal 
            $infoModel = model('InfoModel');
            $dataInformacion = [
                "id" => $usuarioModel->getInsertID(),
                "nombre" => $_POST['nombre'],
                "apellidoP" => $_POST['apellidoP'],
                "apellidoM" => $_POST['apellidoM'],
                "genero" => $_POST['genero'],
                "celular" => $_POST['celular'],
                "created_at" => date('Y-m-d')
            ];
            $infoModel->insert($dataInformacion);
            
            $direccionModel = model('DireccionModel');
            $dataDireccion = [
                "estado" => $_POST['estado'],
                "municipio" => $_POST['municipio'],
                "colonia" => $_POST['colonia'],
                "calle" => $_POST['calle'],
                "numeroExterior" => $_POST['numeroExterior'],
                "numeroInterior" => $_POST['numeroInterior'],
                "codigoPostal" => $_POST['codigoPostal'],
                "info" => $usuarioModel->getInsertID(),
                "created_at" => date('Y-m-d')
            ];
            $direccionModel->insert($dataDireccion);
    
            return redirect('admin/doctor/mostrar', 'refresh');
        }
    }
  // ELIMINAR DOCTOR---------------------------------------------------------------------------
    public function eliminarDoctor($id)
    { $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $direccionModel = model('DireccionModel');
        $direccionModel->delete(['info' => $id]);

        $infoModel = model('InfoModel');
        $infoModel->delete($id);

        $usuarioModel = model('UsuarioModel');
        $usuarioModel->delete($id);

        $doctorModel = model('DoctorModel');
        $doctorModel->delete(['doctor' => $id]);

        return redirect('admin/doctor/mostrar', 'refresh');
    }
    //EDITAR DOCTOR --------------------------------------------------------------------------
    public function editarDoctor($id)
    {     $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $infoModel = model('InfoModel');
        $data['info'] = $infoModel->find($id);
    
        $usuarioModel = model('UsuarioModel');
        $data['usuario'] = $usuarioModel->find($id);
    
        $direccionModel = model('DireccionModel');
        $data['direccion'] = $direccionModel->findAll($id);
    
        $idD = $usuarioModel->select('doctor')->find($id)->doctor;
        $doctorModel = model('DoctorModel');
        $data['doctor'] = $doctorModel->find($idD);
    
        $validation = \Config\Services::validation();
    
        $data['validation'] = $validation;
    
        return view('common/head') .
            '<div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">' . view('admin/menuA') . '</div>
                    <div class="col-md-10">' . view('admin/doctor/editar', $data) . '</div>
                </div>
            </div>' .
            view('common/footer');
    }
    public function doctorUpdate()
    {
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $validation = \Config\Services::validation();
        $rules = [
            'nombre' => 'required|max_length[15]|min_length[3]|string',
            'apellidoP' => 'required|max_length[15]|string',
            'apellidoM' => 'required|max_length[15]|string',
            'genero' => 'required|max_length[10]|alpha_numeric_punct',
            'celular' => 'required|max_length[15]|min_length[10]',
            'especialidad' => 'required|max_length[50]|min_length[3]',
            'turno'=> 'required',
            'departamento'=> 'required',
            'estado' => 'required|max_length[50]|min_length[2]|string',
            'municipio' => 'required|max_length[50]|min_length[2]|string',
            'colonia' => 'required|max_length[50]|min_length[2]|string',
            'calle' => 'required|max_length[50]|min_length[2]|string',
            'numeroExterior' => 'required|max_length[11]|integer',
            'numeroInterior' => 'max_length[11]|',
            'codigoPostal' => 'required|max_length[5]|integer',  
        ];


        //Redireccionar en caso de que se cumplan las reglas de validación
        if (!$this->validate($rules)) {
            $direccionModel = model('DireccionModel');

            $data = [
                
                "nombre" => $_POST['nombre'],
                "apellidoP" => $_POST['apellidoP'],
                "apellidoM" => $_POST['apellidoM'],
                
                
                "genero" => $_POST['genero'],
                "celular" => $_POST['celular'],
                "especialidad" => $_POST['especialidad'],
                "turno"=> $_POST['turno'],
                "departamento"=>$_POST['departamento'],
                "id" => $_POST['id'],
                "direccion" => $direccionModel->where('info', $_POST['id'])->findAll(),

                'validation' => $validation
            ];
            return 
            view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/doctor/editar', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
      

        } else {

            $doctorModel = model('DoctorModel');
            $usuarioModel = model('UsuarioModel');
            $infoModel = model('InfoModel');
            $direccionModel = model('DireccionModel');

            $dataDoctor = [
                "especialidad" => $_POST['especialidad'],
                "turno"=> $_POST['turno'],
                    "created_at" => date('Y-m-d')
            ];
            $doctorModel->update(($usuarioModel->select('doctor')->find($_POST['id'])->doctor), $dataDoctor);

           

            $dataUserInfo = [
                "nombre" => $_POST['nombre'],
                "apellidoP" => $_POST['apellidoP'],
                "apellidoM" => $_POST['apellidoM'],
                "genero" => $_POST['genero'],
                "celular" => $_POST['celular'],
                
                "created_at" => date('Y-m-d')
            ];
            $infoModel->update($_POST['id'], $dataUserInfo);

            $dataDireccion = [
                "estado" => $_POST['estado'],
                "municipio" => $_POST['municipio'],
                "colonia" => $_POST['colonia'],
                "calle" => $_POST['calle'],
                "numeroExterior" => $_POST['numeroExterior'],
                "numeroInterior" => $_POST['numeroInterior'],
                "codigoPostal" => $_POST['codigoPostal'],
                "created_at" => date('Y-m-d')
            ];
            $direccionModel->update($_POST['direccionID'], $dataDireccion);

            return redirect('admin/doctor/mostrar', 'refresh');
        }

    }








    // PACIENTES--------------------------------------------------------------------------------------------------------------
    //MOSTRAR---------------------------------------------------------------------------------
    public function mostrarPaciente(){
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $infoModel = model('InfoModel');
        $data['infos'] = $infoModel->findAll();

        $usuarioModel = model('UsuarioModel');
        $data['usuarios'] = $usuarioModel->findAll();

        $pacienteModel = model('PacienteModel');
        $data['pacients'] = $pacienteModel->findAll();

        return view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/paciente/mostrar', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
    }
//EDITAR-------------------------------------------------------------------------------------
public function agregarPaciente()
    {   $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        } 
        if (strtolower($this->request->getMethod()) === 'get') {
            return 
                view('common/head') .
                '<div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        ' . view('admin/menuA') . '
                    </div>
                    <div class="col-md-10">
                        ' . view('admin/paciente/agregar') . '
                    </div>
                </div>
            </div>' .
           view('common/footer');

        }
    }
    //AGREGAR USUARIO DOCTOR----------------------------------------------------------------------
    public function agregarUsuarioP()
    { $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $validation = \Config\Services::validation();
        $rules = [
            'nombre' => 'required|max_length[15]|min_length[3]|string',
            'apellidoP' => 'required|max_length[15]|string',
            'apellidoM' => 'required|max_length[15]|string',
            'genero' => 'required|max_length[10]|alpha_numeric_punct',
            'celular' => 'required|max_length[15]|min_length[10]',
            'sangre'=>'required|max_length[3]|min_length[1]',
        'numeroAsociacion' => 'required|max_length[10]|min_length[5]',
        'numeroTarjeta' => 'required|max_length[10]|min_length[5]',
            'estado' => 'required|max_length[50]|min_length[2]|string',
            'municipio' => 'required|max_length[50]|min_length[2]|string',
            'colonia' => 'required|max_length[50]|min_length[2]|string',
            'calle' => 'required|max_length[50]|min_length[2]|string',
            'numeroExterior' => 'required|max_length[11]|integer',
            'numeroInterior' => 'max_length[11]|',
            'codigoPostal' => 'required|max_length[5]|integer',       
        ];
    
        $data = [
            "nombre" => $_POST['nombre'],
            "apellidoP" => $_POST['apellidoP'],
            "apellidoM" => $_POST['apellidoM'],
            "genero" => $_POST['genero'],
            "celular" => $_POST['celular'],
            "sangre" => $_POST['sangre'],
            "numeroAsociacion" => $_POST['numeroAsociacion'],
            "numeroTarjeta" => $_POST['numeroTarjeta'],
            "estado"=>$_POST['estado'],
            "municipio"=>$_POST['municipio'],
            "colonia"=>$_POST['colonia'],
            "calle"=>$_POST['calle'],
            "numeroExterior"=>$_POST['numeroExterior'],
            "numeroInterior"=>$_POST['numeroInterior'],
            "codigoPostal"=>$_POST['codigoPostal'],
            'validation' => $validation
        ];
        if (!$this->validate($rules)) {
    
            return
            view('common/head') .
            '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/paciente/agregar', $data) . '
                </div>
            </div>
        </div>' . view('common/footer');
      
    
        } else {
            return 
            view('common/head') .
            '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/paciente/agregarUsuario', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
            
      
        }
    
    }
    
    public function insertPaciente()
    { $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $validation = \Config\Services::validation();
        $rules = [
            'email' => 'required|max_length[100]|min_length[7]|valid_email',
            'contraseña' => 'required|max_length[150]|min_length[1]|string',
        ];
        if (!$this->validate($rules)) {        
            $data = [
                "nombre" => $_POST['nombre'],
                "apellidoP" => $_POST['apellidoP'],
                "apellidoM" => $_POST['apellidoM'],
                "genero" => $_POST['genero'],
                "celular" => $_POST['celular'],
                "sangre" => $_POST['sangre'],
                "numeroAsociacion" => $_POST['numeroAsociacion'],
                "numeroTarjeta" => $_POST['numeroTarjeta'],
                "estado"=>$_POST['estado'],
                "municipio"=>$_POST['municipio'],
                "colonia"=>$_POST['colonia'],
                "calle"=>$_POST['calle'],
                "numeroExterior"=>$_POST['numeroExterior'],
                "numeroInterior"=>$_POST['numeroInterior'],
                "codigoPostal"=>$_POST['codigoPostal'],
                'validation' => $validation
            ];
    
            return view('common/head') .
                view('admin/menuA') .
                view('admin/paciente/agregarUsuario', $data) .
                view('common/footer');
    
        } else {
        //informacion profesional
            $pacienteModel = model('PacienteModel');
            $dataPaciente = [
                "sangre" => $_POST['sangre'],
                "numeroAsociacion" => $_POST['numeroAsociacion'],
                "numeroTarjeta" => $_POST['numeroTarjeta'],
                "created_at" => date('Y-m-d')
            ];
            $pacienteModel->insert($dataPaciente);
    //informacion de usuario
            $usuarioModel = model('UsuarioModel');
            $dataUsuario= [
                "email" => $_POST['email'],
                "contraseña" => $_POST['contraseña'],
                "paciente" => $pacienteModel->getInsertID(),
                "created_at" => date('Y-m-d')
            ];
            $usuarioModel->insert($dataUsuario);
    //información personal 
            $infoModel = model('InfoModel');
            $dataInformacion = [
                "id" => $usuarioModel->getInsertID(),
                "nombre" => $_POST['nombre'],
                "apellidoP" => $_POST['apellidoP'],
                "apellidoM" => $_POST['apellidoM'],
                "genero" => $_POST['genero'],
                "celular" => $_POST['celular'],
                "created_at" => date('Y-m-d')
            ];
            $infoModel->insert($dataInformacion);
            
            $direccionModel = model('DireccionModel');
            $dataDireccion = [
                "estado" => $_POST['estado'],
                "municipio" => $_POST['municipio'],
                "colonia" => $_POST['colonia'],
                "calle" => $_POST['calle'],
                "numeroExterior" => $_POST['numeroExterior'],
                "numeroInterior" => $_POST['numeroInterior'],
                "codigoPostal" => $_POST['codigoPostal'],
                "info" => $usuarioModel->getInsertID(),
                "created_at" => date('Y-m-d')
            ];
            $direccionModel->insert($dataDireccion);
    
            return redirect('admin/paciente/mostrar', 'refresh');
        }
    }

  // ELIMINAR PACIENTE---------------------------------------------------------------------------
  public function eliminarPaciente($id)
  { $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
      $direccionModel = model('DireccionModel');
      $direccionModel->delete(['info' => $id]);

      $infoModel = model('InfoModel');
      $infoModel->delete($id);

      $usuarioModel = model('UsuarioModel');
      $usuarioModel->delete($id);

      $pacienteModel = model('PacienteModel');
      $pacienteModel->delete(['paciente' => $id]);

      return redirect('admin/paciente/mostrar', 'refresh');
  }
  //EDITAR PACIENTE --------------------------------------------------------------------------
  public function editarPaciente($id)
  {    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    } 
      $infoModel = model('InfoModel');
      $data['info'] = $infoModel->find($id);
  
      $usuarioModel = model('UsuarioModel');
      $data['usuario'] = $usuarioModel->find($id);
  
      $direccionModel = model('DireccionModel');
      $data['direccion'] = $direccionModel->findAll($id);
  
      $idP = $usuarioModel->select('paciente')->find($id)->paciente;
      $pacienteModel = model('PacienteModel');
      $data['paciente'] = $pacienteModel->find($idP);
  
      $validation = \Config\Services::validation();
  
      $data['validation'] = $validation;
  
      return view('common/head') .
          '<div class="container-fluid">
              <div class="row">
                  <div class="col-md-2">' . view('admin/menuA') . '</div>
                  <div class="col-md-10">' . view('admin/paciente/editar', $data) . '</div>
              </div>
          </div>' .
          view('common/footer');
  }
  public function pacienteUpdate()
  {
    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
      $validation = \Config\Services::validation();
      $rules = [
          'nombre' => 'required|max_length[15]|min_length[3]|string',
          'apellidoP' => 'required|max_length[15]|string',
          'apellidoM' => 'required|max_length[15]|string',
          'genero' => 'required|max_length[10]|alpha_numeric_punct',
          'celular' => 'required|max_length[15]|min_length[10]',
          'sangre'=>'required|max_length[3]|min_length[1]',
          'numeroAsociacion' => 'required|max_length[10]|min_length[5]',
          'numeroTarjeta' => 'required|max_length[10]|min_length[5]',
          'estado' => 'required|max_length[50]|min_length[2]|string',
          'municipio' => 'required|max_length[50]|min_length[2]|string',
          'colonia' => 'required|max_length[50]|min_length[2]|string',
          'calle' => 'required|max_length[50]|min_length[2]|string',
          'numeroExterior' => 'required|max_length[11]|integer',
          'numeroInterior' => 'max_length[11]|',
          'codigoPostal' => 'required|max_length[5]|integer',  
      ];


      //Redireccionar en caso de que se cumplan las reglas de validación
      if (!$this->validate($rules)) {
          $direccionModel = model('DireccionModel');

          $data = [
              
              "nombre" => $_POST['nombre'],
              "apellidoP" => $_POST['apellidoP'],
              "apellidoM" => $_POST['apellidoM'],
              
              
              "genero" => $_POST['genero'],
              "celular" => $_POST['celular'],
              "especialidad" => $_POST['especialidad'],
              "turno"=> $_POST['turno'],
              "departamento"=>$_POST['departamento'],
              "id" => $_POST['id'],
              "direccion" => $direccionModel->where('info', $_POST['id'])->findAll(),

              'validation' => $validation
          ];
          return 
          view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/doctor/editar', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
      

      } else {

          $pacienteModel = model('PacienteModel');
          $usuarioModel = model('UsuarioModel');
          $infoModel = model('InfoModel');
          $direccionModel = model('DireccionModel');

          $dataPaciente = [
            "sangre" => $_POST['sangre'],
            "numeroAsociacion" => $_POST['numeroAsociacion'],
            "numeroTarjeta" => $_POST['numeroTarjeta'],
                  "created_at" => date('Y-m-d')
          ];
          $pacienteModel->update(($usuarioModel->select('paciente')->find($_POST['id'])->paciente), $dataPaciente);

         

          $dataUserInfo = [
              "nombre" => $_POST['nombre'],
              "apellidoP" => $_POST['apellidoP'],
              "apellidoM" => $_POST['apellidoM'],
              "genero" => $_POST['genero'],
              "celular" => $_POST['celular'],
              
              "created_at" => date('Y-m-d')
          ];
          $infoModel->update($_POST['id'], $dataUserInfo);

          $dataDireccion = [
              "estado" => $_POST['estado'],
              "municipio" => $_POST['municipio'],
              "colonia" => $_POST['colonia'],
              "calle" => $_POST['calle'],
              "numeroExterior" => $_POST['numeroExterior'],
              "numeroInterior" => $_POST['numeroInterior'],
              "codigoPostal" => $_POST['codigoPostal'],
              "created_at" => date('Y-m-d')
          ];
          $direccionModel->update($_POST['direccionID'], $dataDireccion);

          return redirect('admin/paciente/mostrar', 'refresh');
      
  }
  }

//FUNCIONES CPON  MEDICAMENTO--------------------------------------------------------------------------------------------------------

//MOSTRAR-----------------------------------------------------------------------
public function mostrarMedicamento()
{ $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }

    $medicamentoModel = model('MedicamentoModel');
    $data['medicamentos'] = $medicamentoModel->findAll();

    return 
    view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/medicamento/mostrar', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
   
}

//AGREGAR MEDICAMENTO
public function agregarMedicamento()
{ $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    if (strtolower($this->request->getMethod()) === 'get') {
        return 
        
        view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/medicamento/agregar') . '
                </div>
            </div>
        </div>' .
        view('common/footer');
      
    }
}
public function insertMedicamento()
{
    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    $validation = \Config\Services::validation();
    $medicamentoModel = model('MedicamentoModel');

    $data = [
        "nombre" => $_POST['nombre'],
        "ingredientes" => $_POST['ingredientes'],
        "tipo" => $_POST['tipo'],
        "dosis" => $_POST['dosis'],
        "fechaCaducidad" => $_POST['fechaCaducidad'],
        "lote" => $_POST['lote'],
        "created_at" => time()
    ];

    $rules = [
        'nombre' => 'required|max_length[50]|string',
        'ingredientes' => 'required|max_length[80]|string',
        'tipo' => 'required|max_length[20]|string',
        'dosis' => 'required|max_length[11]|integer',
        'fechaCaducidad' => 'required|valid_date',
        'lote' => 'required|max_length[10]|string'
    ];
    if (!$this->validate($rules)) {
        $data['validation'] = $validation;

        return 
        view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/medicamento/agregarMedicamento', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');

    } else {
        $medicamentoModel->insert($data, false);

        return redirect('admin/medicamento/mostrar', 'refresh');
    }
}
    //EDITGAR MEDICAMENTO----------------------------------------------------------------------
    public function editarMedicamento($id)
    { $session = session();
        if ($session->get('logged_in') != TRUE) {
            return redirect('/', 'refresh');
        }
        if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
            return redirect('usuarios/login', 'refresh');
        }
        $medicamentoModel = model('MedicamentoModel');
        $data['medicamento'] = $medicamentoModel->find($id);

        if (strtolower($this->request->getMethod()) === 'get') {

            return 
            view('common/head') .
       
            '<div class="container-fluid">
                 <div class="row">
                     <div class="col-md-2">
                         ' . view('admin/menuA') . '
                     </div>
                     <div class="col-md-10">
                         ' . view('admin/medicamento/editar', $data) . '
                     </div>
                 </div>
             </div>' .
            view('common/footer');
          
        }
 
 
   }

   public function updateMedicamento()
   {
    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
       $validation = \Config\Services::validation();
       $medicamentoModel = model('MedicamentoModel');

      
   $data = [
       "nombre" => $_POST['nombre'],
       "ingredientes" => $_POST['ingredientes'],
       "tipo" => $_POST['tipo'],
       "dosis" => $_POST['dosis'],
       "fechaCaducidad" => $_POST['fechaCaducidad'],
       "lote" => $_POST['lote'],
       "created_at" => time()
   ];

   $rules = [
       'nombre' => 'required|max_length[50]|string',
       'ingredientes' => 'required|max_length[80]|string',
       'tipo' => 'required|max_length[20]|string',
       'dosis' => 'required|max_length[11]|integer',
       'fechaCaducidad' => 'required|valid_date',
       'lote' => 'required|max_length[10]|string'
   ];


       //Se redirecciona en caso de que se validen los datos del formulario
       if (!$this->validate($rules)) {
           $data['validation'] = $validation;

           $data['medicamento'] = $medicamentoModel->find($_POST['id']);

           return view('common/head') .
               view('admin/menuA') .
               view('admin/medicamento/editar', $data) .
               view('common/footer');

       } else {
           $medicamentoModel->update($_POST['id'], $data);

           return redirect('admin/medicamento/mostrar', 'refresh');
       }

   }



//ELIMINAR MEDICAMENTO---------------------------------------------------------------------------------


public function eliminarMedicamento($id)
{ $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    $medicamentoModel = model('MedicamentoModel');
    $medicamentoModel->delete($id);

    return redirect('admin/medicamento/mostrar', 'refresh');
}




//FUNCIONES CON APOYO--------------------------------------------------------------------------
//MOSTRAR APOYO
public function mostrarApoyo(){
    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    $apoyoModel = model('ApoyoModel');
    $data['helps'] = $apoyoModel->findAll();

    return 
    view('common/head') .
       
    '<div class="container-fluid">
         <div class="row">
             <div class="col-md-2">
                 ' . view('admin/menuA') . '
             </div>
             <div class="col-md-10">
                 ' . view('admin/apoyo/mostrar', $data) . '
             </div>
         </div>
     </div>' .
    view('common/footer');

}
//AGREGAR APOYO----------------------------------------------------------------------------
public function agregarApoyo()
{ $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    if (strtolower($this->request->getMethod()) === 'get') {
        return

        view('common/head') .
       
        '<div class="container-fluid">
             <div class="row">
                 <div class="col-md-2">
                     ' . view('admin/menuA') . '
                 </div>
                 <div class="col-md-10">
                     ' . view('admin/apoyo/agregar') . '
                 </div>
             </div>
         </div>' .
        view('common/footer');
    }
}
public function insertApoyo()
{    
    
    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    $validation = \Config\Services::validation();
    $apoyoModel = model('apoyoModel');

    $data = [
        "nombre" => $_POST['nombre'],
        "descripcion" => $_POST['descripcion'],
        "fechaLimite" => $_POST['fechaLimite'],
        "created_at" => time()
    ];

    $rules = [
        'nombre' => 'required|max_length[50]|string',
        'descripcion' => 'required|max_length[255]|string',
        'fechaLimite' => 'required|valid_date'
    ];
    if (!$this->validate($rules)) {
        $data['validation'] = $validation;

        return
        view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/apoyo/agregar', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');

    } else {
        $apoyoModel->insert($data, false);

        return redirect('admin/apoyo/mostrar', 'refresh');
    }


}
//EDITAR APOYO-------------------------------------------------------------------
public function editarApoyo($id){
       
    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    $apoyoModel = model('ApoyoModel');
    $data['apoyo'] = $apoyoModel->find($id);

    if (strtolower($this->request->getMethod()) === 'get') {

        return 
        view('common/head') .
       
        '<div class="container-fluid">
             <div class="row">
                 <div class="col-md-2">
                     ' . view('admin/menuA') . '
                 </div>
                 <div class="col-md-10">
                     ' . view('admin/apoyo/editar', $data) . '
                 </div>
             </div>
         </div>' .
         view('common/footer');
       
    }      

}
public function updateApoyo(){
    $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
    $validation = \Config\Services::validation();
    $apoyoModel = model('ApoyoModel');
 
    $data = [
     "nombre" => $_POST['nombre'],
     "descripcion" => $_POST['descripcion'],
     "fechaLimite" => $_POST['fechaLimite'],
     "created_at" => time()
  ];
  
  $rules = [
     'nombre' => 'required|max_length[50]|string',
     'descripcion' => 'required|max_length[255]|string',
     'fechaLimite' => 'required|valid_date'
  ];
 
    if (!$this->validate($rules)) {
        $data['validation'] = $validation;
 
        $data['apoyo'] = $apoyoModel->find($_POST['id']);
 
        return
        view('common/head') .
       
       '<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    ' . view('admin/menuA') . '
                </div>
                <div class="col-md-10">
                    ' . view('admin/apoyo/editar', $data) . '
                </div>
            </div>
        </div>' .
       view('common/footer');
 
    } else {
        $apoyoModel->update($_POST['id'], $data);
 
        return redirect('admin/apoyo/mostrar', 'refresh');
    }
 }

 //ELIMINAR APOYO----------------------------------------------------------------------------
 public function eliminarApoyo($id)
 { $session = session();
    if ($session->get('logged_in') != TRUE) {
        return redirect('/', 'refresh');
    }
    if ($session->get('idDoctor') == 1 || $session->get('idPaciente') == 1) {
        return redirect('usuarios/login', 'refresh');
    }
     //Proteger la ruta para que no accedan personas sin iniciar sesión
 
 
     $apoyoModel = model('ApoyoModel');
     $apoyoModel->delete($id);
 
     return redirect('admin/apoyo/mostrar', 'refresh');
 }
}
