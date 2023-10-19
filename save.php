<?php

include('db.php');

if (isset($_POST['save_task'])) {

  $FechaVuelo = $_POST['FechaVuelo'];
  $HoraSalida = $_POST['HoraSalida'];
  $HoraLlegada = $_POST['HoraLlegada'];
  $DuracionTrayecto = $_POST['DuracionTrayecto'];
  $TipoTrayecto = $_POST['TipoTrayecto'];
  $CostoVuelo = $_POST['CostoVuelo'];

  $query = "INSERT INTO vuelos(FechaVuelo, HoraSalida, HoraLlegada, DuracionTrayecto, TipoTrayecto, CostoVuelo) VALUES ('$FechaVuelo', '$HoraSalida','$HoraLlegada','$DuracionTrayecto','$TipoTrayecto','$CostoVuelo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("La transacción fallo.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
