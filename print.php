<?php #Esta página muestra el feed del usuario
include("variablesGlobales.php");
include("conexion.php");
session_start();

if(isset($_SESSION["CurrentUserIDSession"])){ #Checa si ya inició sesión
        $CurrentUserID = $_SESSION["CurrentUserIDSession"]; #Recoge el id del usuario
        $CurrentUserAdministrator = $_SESSION["CurrentUserAdministratorSession"]; #Recoge sobre si el usuario es administrador o no
        if($CurrentUserAdministrator == '0'){ #Es 0 en caso de ser un usuario normal
            echo "<script> window. location='/DeltaTrain/login'</script>"; 
        }
        else{ #Si se usa este es porque el usuario es admin
        }
    }
else{ #Si se usa este es porque aún no se ha iniciado sesión
    echo "<script> window. location='/DeltaTrain/login'</script>"; #Como no iniciaste sesión te manda a hacerlo
}


equire('fpdf/fpdf.php');
class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        $this->Ln(0);
        $this->SetFont('Helvetica','B',10);
        $this->Cell(200,0,utf8_decode("- DeltaTrain -"),0,1,'C');
        $this->Ln(5);
        $this->SetFont('Helvetica','B',20);
    }
    
}

require('fpdf.php');

// Crear objeto PDF
$pdf = new FPDF();
$pdf->AddPage();

// Configurar encabezado de la tabla
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,'ID',1,0,'C');
$pdf->Cell(40,10,'Usuario',1,0,'C');
$pdf->Cell(50,10,'Tabla',1,0,'C');
$pdf->Cell(40,10,'Fecha y hora',1,0,'C');
$pdf->Cell(80,10,'Descripción',1,1,'C');

$query = "SELECT * from Changes ORDER BY Time_Changes DESC";

$result = mysqli_query($conexion, $query);

// Agregar datos al PDF
$pdf->SetFont('Arial','',10);
while($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(30,10,$row['ID_Changes'],1,0,'C');
    $pdf->Cell(40,10,$row['User_Changes'],1,0,'C');
    $pdf->Cell(50,10,$row['Table_Changes'],1,0,'C');
    $pdf->Cell(40,10,$row['Time_Changes'],1,0,'C');
    $pdf->Cell(80,10,$row['Description_Changes'],1,1,'C');
}

// Salida del PDF
$pdf->Output();

// Salida del PDF
$pdf->Output();