<?php
include("db.php");

$FechaVuelo      = '';
$HoraSalida      = '';
$HoraLlegada     = '';
$DuracionTrayecto= '';
$TipoTrayecto    = '';
$CostoVuelo      = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM vuelos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $FechaVuelo       = $row['FechaVuelo'];
    $HoraSalida       = $row['HoraSalida'];
    $HoraLlegada      = $row['HoraLlegada'];
    $DuracionTrayecto = $row['DuracionTrayecto'];
    $TipoTrayecto     = $row['TipoTrayecto'];
    $CostoVuelo       = $row['CostoVuelo'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $FechaVuelo = $_POST['FechaVuelo'];
  $HoraSalida = $_POST['HoraSalida'];
  $HoraLlegada = $_POST['HoraLlegada'];
  $DuracionTrayecto = $_POST['DuracionTrayecto'];
  $TipoTrayecto = $_POST['TipoTrayecto'];
  $CostoVuelo = $_POST['CostoVuelo'];

  $query = "UPDATE vuelos set FechaVuelo = '$FechaVuelo', HoraSalida = '$HoraSalida', HoraLlegada = '$HoraLlegada', DuracionTrayecto = '$DuracionTrayecto', TipoTrayecto = '$TipoTrayecto', CostoVuelo = '$CostoVuelo'  WHERE id = $id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'La fecha se a actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
            <p>Fecha del vuelo</p>
            <input type="date" name="FechaVuelo" class="form-control" placeholder="Fecha del vuelo" autofocus value="<?php echo $FechaVuelo;?>">
          </div>
          <div class="form-group">
            <p>Hora de salida del vuelo</p>
            <input name="HoraSalida" type="date" class="form-control" placeholder="Hora de salida del vuelo" value="<?php echo $HoraSalida;?>">
          </div>
          <div class="form-group">
            <p>Hora de llegada del vuelo</p>
            <input name="HoraLlegada" type="date" class="form-control" placeholder="Hora de llegada del vuelo" value="<?php echo $HoraLlegada;?>">
          </div>
          <div class="form-group">
            <p>Duracion del vuelo</p>
            <input name="DuracionTrayecto" type="time" class="form-control" placeholder="Duracion del vuelo" value="<?php echo $DuracionTrayecto;?>">
          </div>
          <div class="form-group">
            <input name="TipoTrayecto" type="text" class="form-control" placeholder="Tipo de trayecto" value="<?php echo $TipoTrayecto;?>">
          </div>
          <div class="form-group">
            <input name="CostoVuelo" va type="decimal" class="form-control" placeholder="Costo del vuelo" value="<?php echo $CostoVuelo;?>">
          </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
