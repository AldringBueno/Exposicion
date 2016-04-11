<?php
$id = $_POST['id'];
$DeMes = $_POST['DeMes'];
$DeAno = $_POST['DeAno'];
$AlMes = $_POST['AlMes'];
$AlAno = $_POST['AlAno'];


//Incluimos la libreria fpdf
require('fpdf/fpdf.php');

//Incluimos el archivo de conexion a la base de datos
class PDF extends FPDF
{

function Header(){
            $this->Image('images/constancia/header.png',8,6,190);
}


function folioCliente(){
    global $id;
    global $DeMes;
    global $DeAno;
    global $AlMes;
    global $AlAno;

    $this->SetFont('Arial','B',12); 
    // Colores de los bordes, fondo y texto
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    // Ancho del borde (1 mm)
    $this->SetLineWidth(0.1);
    $this->AddPage();

    $enlace = mysqli_connect("localhost", "root", "root", "act_extra");
    $listado = mysqli_query($enlace, "SELECT * FROM alumnos WHERE id=$id");


    if(mysqli_num_rows($listado)>0){

        date_default_timezone_set('America/Mexico_City');
        $year = date('Y');
        $mes = date('m');
        $dia = date('d');

        //SACANDO LOS MESES
        if($mes==1){
            $mes2 = 'enero';
        }else if($mes==2){
            $mes2 = 'febrero';
        }else if($mes==3){
            $mes2 = 'marzo';
        }else if($mes==4){
            $mes2 = 'abril';
        }else if($mes==5){
            $mes2 = 'mayo';
        }else if($mes==6){
            $mes2 = 'junio';
        }else if($mes==7){
            $mes2 = 'julio';
        }else if($mes==8){
            $mes2 = 'agosto';
        }else if($mes==9){
            $mes2 = 'septiembre';
        }else if($mes==10){
            $mes2 = 'octubre';
        }else if($mes==11){
            $mes2 = 'noviembre';
        }else if($mes==12){
            $mes2 = 'diciembre';
        }

        //SACANDO LOS DIAS DEL MES EN LETRAS
        if($dia==1){
            $dia2 = 'al perimer día';
        }else if($dia==2){
            $dia2 = 'a los dos días';
        }else if($dia==3){
            $dia2 = 'a los tres días';
        }else if($dia==4){
            $dia2 = 'a los cuatro días';
        }else if($dia==5){
            $dia2 = 'a los cinco días';
        }else if($dia==6){
            $dia2 = 'a los seis días';
        }else if($dia==6){
            $dia2 = 'a los siete días';
        }else if($dia==7){
            $dia2 = 'a los ocho días';
        }else if($dia==8){
            $dia2 = 'a los nueve días';
        }else if($dia==10){
            $dia2 = 'a los diez días';
        }else if($dia==11){
            $dia2 = 'a los once días';
        }else if($dia==12){
            $dia2 = 'a los doce días';
        }else if($dia==13){
            $dia2 = 'a los trece días';
        }else if($dia==14){
            $dia2 = 'a los catorce días';
        }else if($dia==15){
            $dia2 = 'a los quince días';
        }else if($dia==16){
            $dia2 = 'a los dieciséis días';
        }else if($dia==17){
            $dia2 = 'a los diecisiete días';
        }else if($dia==18){
            $dia2 = 'a los dieciocho días';
        }else if($dia==19){
            $dia2 = 'a los diecinueve días';
        }else if($dia==20){
            $dia2 = 'a los veinte días';
        }else if($dia==21){
            $dia2 = 'a los veintiún días';
        }else if($dia==22){
            $dia2 = 'a los veintidos días';
        }else if($dia==23){
            $dia2 = 'a los veintitres días';
        }else if($dia==24){
            $dia2 = 'a los veinticuatro días';
        }else if($dia==25){
            $dia2 = 'a los veinticinco días';
        }else if($dia==26){
            $dia2 = 'a los veintiseis días';
        }else if($dia==27){
            $dia2 = 'a los veintisiete días';
        }else if($dia==28){
            $dia2 = 'a los veintiocho días';
        }else if($dia==29){
            $dia2 = 'a los veintinueve días';
        }else if($dia==30){
            $dia2 = 'a los treinta días';
        }else if($dia==31){
            $dia2 = 'a los treinta y un días';
        }

        //SACANDO LaS CARRERAS EN NOMBRE LARGO
        $fila = mysqli_fetch_array($listado);
        if($fila['carrera']=='ISC'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='ISC'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Ingeniería en Sistemas Computacionales';
        }else if($fila['carrera']=='IND'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='IND'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Ingeniería Industrial';
        }else if($fila['carrera']=='IGE'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='IGE'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Ingeniería en Gestión Empresarial';
        }else if($fila['carrera']=='MINAS'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='MINAS'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Técnico Superior en Minería';
        }else if($fila['carrera']=='INF'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='INF'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Licenciatura en Informática';
        }else if($fila['carrera']=='ADMON'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='ADMON'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Licenciatura en Administración';
        }
        else if($fila['carrera']=='IGEED'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='IGEED'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Ingeniería en Gestión Empresarial Educación a Distancia';
        }
        else if($fila['carrera']=='IGEEDS'){
            //Busco el jefe de carrera en la tabla usuarios
            $rs = mysqli_query($enlace, "SELECT nombre, puesto FROM usuarios WHERE carrera='IGEEDS'");
            $row = mysqli_fetch_row($rs);
            $jefe = $row[0];
            $puesto = $row[1];
            $car_comp = 'Ingeniería en Gestión Empresarial Educación a Distancia sede Sain Alto';
        }

        $this->Image('images/constancia/body_back.png',30,70,140);
        $this->SetY(30);
        $this->SetX(10);
        $this->MultiCell(190,7,'Anexo 1',0,'C',false);
        $this->MultiCell(190,7,utf8_decode('CONSTANCIA DE ACREDITACIÓN DE ACTIVIDAD COMPLEMENTARIA'),0,'C',false);
        $this->Ln();

        $this->SetX(23);
        $this->MultiCell(150,7,utf8_decode('Ing. María Cruz Álvarez Salazar'),0,'L',false);
        $this->SetX(23);
        $this->SetFont('Arial','',12);
        $this->MultiCell(150,7,utf8_decode('Jefa del Departamento Servicios Escolares'),0,'L',false);
        $this->SetX(23);
        $this->SetFont('Arial','B',12);
        $this->MultiCell(150,7,utf8_decode('PRESENTE'),0,'L',false);
        $this->Ln();
        $this->SetX(23);
        $this->SetFont('Arial','',12);
        $this->MultiCell(164,7,utf8_decode('
            El que suscribe L.A. Karen González Pizaña, por este medio se permite hacer de su conocimiento que el estudiante '.mb_strtoupper($fila['ap_paterno'].' '.$fila['ap_materno'].' '.$fila['nombre']).' con número de control '.$fila['num_cont'].' de la Carrera de '.mb_strtoupper($car_comp).' ha ACREDITADO la actividad complementaria ACTIVIDADES EXTRAESCOLARES durante período escolar '.$DeMes.' '.$DeAno.' a '.$AlMes.' '.$AlAno.' con un valor curricular de 1 crédito.'),0,'J',false);
        $this->SetX(23);
        $this->MultiCell(164,7,utf8_decode('
            Se extiende la presente en la ciudad de Sombrerete, Zac., '.$dia2.' del mes de '.$mes2.' del '.$year.'.'),0,'J',false);
        $this->Ln();
        $this->Ln();
        $this->SetX(10);
        $this->SetFont('Arial','B',12);
        $this->MultiCell(190,7,'ATENTAMENTE',0,'C',false);
        $this->SetFont('Arial','',12);
        $this->MultiCell(190,7,utf8_decode('"Por una educación en movimiento"'),0,'C',false);

        //FIRMA KAREN
        $this->SetY(215);
        $this->SetX(23);
        $this->SetFont('Arial','B',12);
        $this->MultiCell(70,7,utf8_decode('L.A. Karen González Pizaña'),0,'L',false);
        $this->SetX(23);
        $this->SetFont('Arial','',12);
        $this->MultiCell(70,7,utf8_decode('Coordinadora de Promoción Deportiva y Cultural'),0,'L',false);

        //FIRMA JEFE DE CARRERA
        $this->SetY(215);
        $this->SetX(125);
        $this->SetFont('Arial','B',12);
        $this->MultiCell(70,7,utf8_decode($jefe),0,'L',false);
        $this->SetX(125);
        $this->SetFont('Arial','',12);
        $this->MultiCell(70,7,utf8_decode($puesto),0,'L',false);




    }
    mysqli_close($enlace);
    
}

function footer(){
            
            $this->Image('images/constancia/footer.png',8,270,195);

            // Colores de los bordes, fondo y texto
            // Ancho del borde (1 mm)
            $this->SetLineWidth(1);
            // Título
}

}
$enlace = mysqli_connect("localhost", "root", "root", "act_extra");
$listado = mysqli_query($enlace, "SELECT * FROM alumnos WHERE id=$id");
$fila = mysqli_fetch_array($listado);

$pdf = new PDF();
$pdf->SetTitle(utf8_decode(mb_strtoupper('CONSTANCIA '.$fila['ap_paterno'].' '.$fila['ap_materno'].' '.$fila['nombre'].' '.$fila['semestre'].' '.$fila['carrera'])));
$pdf->folioCliente();
$pdf->footer();
$pdf->Output(utf8_decode(mb_strtoupper('CONSTANCIA '.$fila['ap_paterno'].' '.$fila['ap_materno'].' '.$fila['nombre'].' '.$fila['semestre'].' '.$fila['carrera'])),'I');
?>