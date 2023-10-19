<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <p>Fecha del vuelo</p>
            <input type="date" name="FechaVuelo" class="form-control" placeholder="Fecha del vuelo" autofocus>
          </div>
          <div class="form-group">
            <p>Hora de salida del vuelo</p>
            <input name="HoraSalida" type="date" class="form-control" placeholder="Hora de salida del vuelo"/>
          </div>
          <div class="form-group">
            <p>Hora de llegada del vuelo</p>
            <input name="HoraLlegada" type="date" class="form-control" placeholder="Hora de llegada del vuelo"/>
          </div>
          <div class="form-group">
            <p>Duracion del vuelo</p>
            <input name="DuracionTrayecto" type="time" class="form-control" placeholder="Duracion del vuelo"/>
          </div>
          <div class="form-group">
            <input name="TipoTrayecto" type="text" class="form-control" placeholder="Tipo de trayecto"/>
          </div>
          <div class="form-group">
            <input name="CostoVuelo" type="decimal" class="form-control" placeholder="Costo del vuelo"/>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>FechaVuelo</th>
            <th>HoraSalida</th>
            <th>HoraLlegada</th>
            <th>DuracionTrayecto</th>
            <th>TipoTrayecto</th>
            <th>CostoVuelo</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM vuelos";
          $result_vuelos = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_vuelos)) { ?>
          <tr>
            <td><?php echo $row['FechaVuelo']; ?></td>
            <td><?php echo $row['HoraSalida']; ?></td>
            <td><?php echo $row['HoraLlegada']; ?></td>
            <td><?php echo $row['DuracionTrayecto']; ?></td>
            <td><?php echo $row['TipoTrayecto']; ?></td>
            <td><?php echo $row['CostoVuelo']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['ID']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['ID']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
