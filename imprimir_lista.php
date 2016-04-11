<?php
$actividad = $_POST['actividad'];
$instructor = $_POST['instructor'];

//Incluimos la libreria fpdf
require("fpdf/fpdf.php");
//Incluimos el archivo de conexion a la base de datos
class PDF extends FPDF
{

function Header(){
            global $actividad;

            $this->Image('images/deportes.jpg',40,8,28);
            // Tipo de letra (Arial, Negrita, Tamaño 20) 
            $this->SetFont('Arial','B',20);
            $this->SetY(20);
            $this->SetX(150);
            $this->Cell(10,6,utf8_decode(mb_strtoupper('LISTA DE '.$actividad)),0,0,'C');

            //celda para meses
            $this->SetY(34);
            $this->SetX(185.5);
            $this->Cell(99,6,'',1,1,'C');
            // Colores de los bordes, fondo y texto
            // Ancho del borde (1 mm)
            $this->SetLineWidth(1);
            // Título
}


function folioCliente(){
    global $actividad;

    $this->SetFont('Arial','B',10); 
    // Colores de los bordes, fondo y texto
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    // Ancho del borde (1 mm)
    $this->SetLineWidth(0.1);


    $this->AddPage();
    $this->SetY(40);
    $this->SetX(10);
    $this->Cell(10,7,'No.',1,0,'C');
    $this->Cell(27,7,'No. CONTROL',1,0,'C');
    $this->Cell(106.5,7,utf8_decode('NOMBRE'),1,0,'C');
    $this->Cell(32,7,'SEM / CARRERA',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Cell(5.5,7,'',1,0,'C');
    $this->Ln();


    $enlace = mysqli_connect("localhost", "root", "root", "act_extra");
    $listado = mysqli_query($enlace, "SELECT * FROM alumnos WHERE actividad='$actividad'");


    if(mysqli_num_rows($listado)>0){
        $aux = 1;
        while($fila = mysqli_fetch_array($listado)){
            $this->Cell(10,6,$aux,1,0,'C');
            $this->Cell(27,6,$fila['num_cont'],1,0,'C');
            $this->Cell(106.5,6,utf8_decode(mb_strtoupper($fila['ap_paterno'].' '.$fila['ap_materno'].' '.$fila['nombre'])),1,0,'L');
            $this->Cell(32,6,$fila['semestre'].' '.$fila['carrera'],1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Cell(5.5,6,'',1,0,'C');
            $this->Ln();
            $aux += 1; 
        }
    }
    mysqli_close($enlace);
    
}

function footer(){
            global $actividad;
            global $instructor;

            $this->SetY(170);
            $this->SetX(20);
            $this->Cell(190,7,utf8_decode('          _______________________________________                                                                                          _______________________________________'),0,'C',false);
            $this->SetY(175);
            $this->SetX(10);
            $this->Cell(175,7,utf8_decode(mb_strtoupper('                              L.A. KAREN GONZALES PIZAÑA                                                                                                                     '.$instructor.'')),0,'C',false);
            $this->Ln();
            $this->Cell(175,7,utf8_decode(mb_strtoupper('                                 JEFE DE EXTRA ESCOLARES                                                                                                                                  INSTRUCTOR')),0,'C',false);


            $this->Image('images/escudo.jpg',138,170,28);
            $this->SetY(20);
            $this->SetX(150);

            // Colores de los bordes, fondo y texto
            // Ancho del borde (1 mm)
            $this->SetLineWidth(1);
            // Título
}

}



$pdf = new PDF('L','mm','A4');
$pdf->SetTitle(utf8_decode('Lista_'.$actividad));
$pdf->folioCliente();
$pdf->footer();
$pdf->Output(utf8_decode('Lista_'.$actividad),'I');
?>