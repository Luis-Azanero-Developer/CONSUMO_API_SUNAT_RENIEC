<?php
include 'header.php';
//OCULTA ERRORES DE PHP
error_reporting(0);
//REPCIONAMOS LA VARIABLE POR METODO GET
$dni_cliente = $_GET["DNI"];
//LINK DEL APIA, DONDE REPECIONA EL PARAMETRO
$data = json_decode(file_get_contents("https://dni.optimizeperu.com/api/persons/$dni_cliente"),true);


?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4">Consumir API externa de RENIEC</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                El API que se usara para el ejemplo es el siguiente:
                                <a target="_blank" href="https://dni.optimizeperu.com/api">https://dni.optimizeperu.com/api</a>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>">
                    <tr>
                        <td>Ingresar DNI:</td>
                        <td><input type="number" name="DNI"  placeholder="DNI..." autofocus required></td>
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
                                Consumo de API externa de RENIEC
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">DNI</label>
      <input type="text" class="form-control" value="<?php echo $data["dni"]; ?>" placeholder="DNI...">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nombres:</label>
      <input type="text" class="form-control" value="<?php echo $data["name"]; ?>"  placeholder="Nombres...">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">APELLIDO MATERNO</label>
      <input type="text" class="form-control" value="<?php echo $data["first_name"]; ?>"  placeholder="APELLIDO PATERNO...">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">APELLIDO PATERNO:</label>
      <input type="text" class="form-control" value="<?php echo $data["last_name"]; ?>" placeholder="APELLIDO MATERNO...">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Nombres y Apellidos Completos:</label>
    <input type="text" class="form-control" value="<?php echo $data["name"]." ".$data["first_name"]." ".$data["last_name"]; ?>"  placeholder="Nombres completos.">
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