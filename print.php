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

require('fpdf/fpdf.php');
// Crear objeto PDF
$pdf = new FPDF();
$pdf->AddPage();

// Configurar encabezado de la tabla
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,10,'ID',1,0,'C');
$pdf->Cell(20,10,'Usuario',1,0,'C');
$pdf->Cell(20,10,'Tabla',1,0,'C');
$pdf->Cell(30,10,'Fecha y hora',1,0,'C');
$pdf->Cell(110,10,utf8_decode('Descripción'),1,1,'C');

$query = "SELECT * from Changes ORDER BY ID_Changes DESC";

$result = mysqli_query($conexion, $query);

// Agregar datos al PDF
$pdf->SetFont('Arial','',5);
while($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(10,7,$row['ID_Changes'],1,0,'C');
    $pdf->Cell(20,7,$row['User_Changes'],1,0,'C');
    $pdf->Cell(20,7,$row['Table_Changes'],1,0,'C');
    $pdf->Cell(30,7,$row['Time_Changes'],1,0,'C');
    $pdf->Cell(110,7,utf8_decode($row['Description_Changes']),1,1,'C');
}

// Salida del PDF
$pdf->Output();