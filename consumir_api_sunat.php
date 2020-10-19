<?php
include 'header.php';
//OCULTA ERRORES DE PHP
error_reporting(0);
//REPCIONAMOS LA VARIABLE POR METODO GET
$ruc_cliente = $_GET["ruc_cliente"];
//LINK DEL APIA, DONDE REPECIONA EL PARAMETRO
$data = json_decode(file_get_contents("https://api.sunat.cloud/ruc/$ruc_cliente"),true);


?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4">Consumir API de SUNAT</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                El API que se usara para el ejemplo es el siguiente:
                                <a target="_blank" href="https://api.sunat.cloud/ruc">https://api.sunat.cloud/ruc</a>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>">
                    <tr>
                        <td>Ingresar RUC:</td>
                        <td><input type="number" name="ruc_cliente"  placeholder="RUC..." autofocus required></td>
                    </tr>
                    <tr>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Procesar Consulta!</button>
                    </tr>
                </form>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-code mr-1"></i>
                                Recuerda que puedes agregar todos los campos retornados por el API
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">RUC</label>
      <input type="text" class="form-control" value="<?php echo $data["ruc"]; ?>" name="RUC" placeholder="RUC...">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Razon Social:</label>
      <input type="text" class="form-control" value="<?php echo $data["razon_social"]; ?>" name="RAZON_SOCIAL" placeholder="Razon Social...">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Dirección:</label>
    <input type="text" class="form-control" value="<?php echo $data["domicilio_fiscal"]; ?>" name="DIRECCION" placeholder="Dirección..">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Inicio Actividades</label>
      <input type="date" class="form-control"  value="<?php echo $data["fecha_actividad"]; ?>" name="INICIO_ACTIVIDADES" placeholder="Inicio...">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nombre Comercial:</label>
      <input type="text" class="form-control" value="<?php echo $data["nombre_comercial"]; ?>" name="RAZON_SOCIAL" placeholder="Razon Social...">
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Condicion Contribuyente</label>
      <input type="text" class="form-control" value="<?php echo $data["contribuyente_condicion"]; ?>" id="inputCity" placeholder="Condicion...">
    </div>
    <div class="form-group col-md-4">
    
      <label for="inputCity">Estado Contribuyente</label>
      <input type="text" class="form-control" value="<?php echo $data["contribuyente_estado"]; ?>" id="inputCity" placeholder="Estado...">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Emision Electrónica</label>
      <input type="date" class="form-control" value="<?php echo $data["emision_electronica"]; ?>" id="inputZip">
    </div>
  </div>
  <button type="button" class="btn btn-primary">Guardar</button>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php
               include 'footer.php';
               ?>