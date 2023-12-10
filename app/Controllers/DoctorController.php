<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DoctorModel;
use App\Models\PacienteModel;
use App\Models\RecetaModel;
use App\Models\ApoyoModel;
use App\Models\RecetasAModel;

class DoctorController extends BaseController
{
    private $validation;
    private $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        // Página de inicio del doctor
    }

    // INICIO DE SESIÓN
    public function inicio()
    {
        $doctorModel = model(DoctorModel::class);
        $data['doctors'] = $doctorModel->findAll();

        return view('common/head') .
               view('doctor/inicio', $data) .
               view('common/footer');
    }

    // CREACIÓN DE RECETAS
    public function recetas()
    {
        $pacienteModel = model(PacienteModel::class);
        $recetasModel = model(RecetaModel::class);
$infoModel=model('InfoModel');
$data['info']=$infoModel-find($id);

        $data['pacients'] = $pacienteModel->findAll();
        $data['recetas'] = $recetasModel->findAll();
        $data['title'] = "Agregar Receta";

        if ($this->request->getMethod() === 'get') {
            return $this->showView('doctor/recetas', $data);
        }

        $rules = [
            'paciente' => 'required',
            'descripcion' => 'required',
            'altura' => 'required',
            'peso' => 'required',
            'temperatura' => 'required',
            'alergias' => 'required',
            'fecha' => 'required',
        ];

        return $this->processForm($rules, $data, $recetasModel);
    }

    private function processForm($rules, $data, $model)
    {
        if (!$this->validate($rules)) {
            return $this->showView($data['view'], $data, ['validation' => $this->validation]);
        } else {
            if ($this->insert($model)) {
                return redirect()->to('doctor/mostrarR')->refresh();
            }
        }
    }

    private function showView($view, $data, $additionalData = [])
    {
        return view('common/head') .
               view('doctor/menu') .
               view($view, $data, $additionalData) .
               view('common/footer');
    }

    private function insert($model)
    {
        $data = [
            'nombrePaciente' => $this->request->getPost('paciente'),
            'descripcion' => $this->request->getPost('descripcion'),
            'altura' => $this->request->getPost('altura'),
            'peso' => $this->request->getPost('peso'),
            'temperatura' => $this->request->getPost('temperatura'),
            'alergias' => $this->request->getPost('alergias'),
            'fecha' => $this->request->getPost('fecha'),
        ];

        $model->insert($data, false);
        return true;
    }

    // VISUALIZACIÓN 
                                    
// VISUALIZACIÓN EN TABLA DE LAS RECETAS CREADAS
public function mostrarR() {
   
    $recetasModel = model('RecetaModel');
    $db = \Config\Database::connect(); 
    $query = $db->query('SELECT recetas.*, CONCAT(paciente.nombre, " ", paciente.apellidoP, " ", paciente.apellidoM) AS nombrePaciente
                    FROM recetas 
                    JOIN paciente ON recetas.nombrePaciente = paciente.id');

$recetas = $query->getResult();
    $data['recetas'] = $recetas;

    return view('common/head') .
           view('doctor/menu') .
           view('doctor/mostrarR', $data) .
           view('common/footer');
}


// IMPRESIÓN Y GUARDO EN PDF DE LA RECETA

public function descargarPdf($recetaId)
{
    
    $recetaModel = model('RecetaModel');
    $receta = $recetaModel->find($recetaId);

    if (!$receta) {
        return redirect()->to('ruta/de/error');
    }

    $pacienteModel = model('PacienteModel');
    $paciente = $pacienteModel->find($receta->nombrePaciente);

    if (!$paciente) {
        return redirect()->to('ruta/de/error');
    }

    
    $pdf = new \TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Receta Médica', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Nombre del Paciente: ' . $paciente->nombre . ' ' . $paciente->apellidoP . ' ' . $paciente->apellidoM, 0, 1);
    $pdf->Cell(0, 10, 'Número de Asociación: ' . $paciente->numeroAsociacion, 0, 1);
    $pdf->Cell(0, 10, 'Número de Tarjeta: ' . $paciente->numeroTarjeta, 0, 1);
    $pdf->Cell(0, 10, 'Fecha: ' . $receta->fecha, 0, 1);
    $pdf->Cell(0, 10, 'Altura: ' . $receta->altura . ' cm', 0, 1);
    $pdf->Cell(0, 10, 'Peso: ' . $receta->peso . ' kg', 0, 1);
    $pdf->Cell(0, 10, 'Alergias: ' . $receta->alergias, 0, 1);
    $pdf->Cell(0, 10, 'Temperatura: ' . $receta->temperatura . ' °C', 0, 1);

    $pdf->Ln(10);

    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Descripción:', 0, 1);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $receta->descripcion);
    $output = $pdf->Output('receta.pdf', 'S');
    return $this->response->setHeader('Content-Type', 'application/pdf')
        ->setBody($output);
}


// VISUALIZACIÓN EN TABLAS DE RECETAS DE APOYO
public function mostrarA() {
    
    $recetasModel = model('RecetaModel');
    $db = \Config\Database::connect(); 
$query = $db->query('SELECT recetas_apoyo.*, CONCAT(paciente.nombre, " ", paciente.apellidoP, " ", paciente.apellidoM) AS nombrePaciente
                    FROM recetas_apoyo
                    JOIN paciente ON recetas_apoyo.nombrePaciente = paciente.id');

$recetas = $query->getResult();
    $data['recetas'] = $recetas;

    return view('common/head') .
           view('doctor/menu') .
           view('doctor/mostrarA', $data) .
           view('common/footer');
}
//IMPRESIÓN Y GUARDADO EN PDF DE LA RECETA APOYO
public function descargarPdfA($recetaId)
{
    $recetaModel = model('RecetasAModel');
    $receta = $recetaModel->find($recetaId);

    if (!$receta) {
        return redirect()->to('');
    }

    $pacienteModel = model('PacienteModel');
    $paciente = $pacienteModel->find($receta->nombrePaciente);

    if (!$paciente) {
        return redirect()->to('');
    }

  
    $pdf = new \TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Receta Médica', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Nombre del Paciente: ' . $paciente->nombre . ' ' . $paciente->apellidoP . ' ' . $paciente->apellidoM, 0, 1);
    $pdf->Cell(0, 10, 'Número de Asociación: ' . $paciente->numeroAsociacion, 0, 1);
    $pdf->Cell(0, 10, 'Número de Tarjeta: ' . $paciente->numeroTarjeta, 0, 1);
    $pdf->Cell(0, 10, 'Apoyo: ' . $receta->apoyo, 0, 1);
    $pdf->Ln(10);

    $pdf->SetFont('helvetica', 'B', 14);

    $pdf->Cell(0, 10, 'Descripción:', 0, 1);

    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $receta->descripcion);

    $output = $pdf->Output('receta.pdf', 'S');

    return $this->response->setHeader('Content-Type', 'application/pdf')
        ->setBody($output);
}



    // CIERRE DE SESIÓN
    public function cerrar_sesion()
    {
        $this->session->destroy();
        return redirect()->to('usuarios/login');
    }
}