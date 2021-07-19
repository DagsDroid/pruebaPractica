<?php 
session_start();
require_once "../controler/AsociadoControler.php";


if (isset($_SESSION['user']) && isset($_SESSION['nombre'])) {
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/dashboard.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../plugins/dataTable/dataTable.min.css">

    <title>ASOCIADOS</title>
</head>

<body>
    
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="mdlNuevo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Asociado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="frmAgregarAsociado">
            <div class="form-group">
              <div class="row">
                <div class="col-md-2">
                  <label for="">ID:</label>
                  <input type="text" class="form-control" id="txtId" name="txtId" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">NOMBRE:</label>
                  <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                </div>
                <div class="col-md-6">
                  <label for="">APELLIDO:</label>
                  <input type="text" class="form-control" id="txtApellido" name="txtApellido">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">DUI:</label>
                  <input type="text" class="form-control" id="txtDui" name="txtDui">
                </div>
                <div class="col-md-6">
                  <label for="">NIT:</label>
                  <input type="text" class="form-control" id="txtNit" name="txtNit">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">ESTADO CIVIL:</label>
                  <select class="form-control" name="slcEstadoCivil" id="slcEstadoCivil">
                    <option value="0">Seleccione una opcion</option>
                    <?php 
                      $objAsociado = new Asociado();

                      $data = $objAsociado->dataEstadoCivil();

                      if ($data!=false) {
                        foreach ($data as $value) {
                    ?>
                      <option value="<?php echo $value['idEstadoCivil']; ?>"><?php echo $value['nombreEstadoCivil']; ?></option>
                    <?php
                        }
                      }

                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="">DIRECCION:</label>
                  <textarea class="form-control" name="txtDireccion" id="txtDireccion" cols="20" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">DEPARTAMENTO</label>
                  <select class="form-control" name="slcDepartamento" id="slcDepartamento">
                    <option value="0">Seleccione un departamento</option>
                    <?php 
                      $objAsociado = new Asociado();

                      $data = $objAsociado->dataDepartamento();

                      if ($data!=false) {
                        foreach ($data as $value) {
                    ?>
                      <option value="<?php echo $value['idDepartamento']; ?>"><?php echo $value['nombreDepartamento']; ?></option>
                    <?php
                        }
                      }

                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">MUNICIPIO</label>
                  <select class="form-control" name="slcMunicipio" id="slcMunicipio">
                    <option value="0">Esperando</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="msj"></div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" id="btnGuardar" name="btnGuardar">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="mdlMostrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mostrar Asociado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead class="thead-dark">
                <th>CAMPO</th>
                <th>DESCRIPCION</th>
              </thead>
              <tbody>
                <tr>
                  <td>ID</td>
                  <td id="mIdAsociado"></td>
                </tr>
                <tr>
                  <td>NOMBRE ASOCIADO</td>
                  <td id="mNombreAsociado"></td>
                </tr>
                <tr>
                  <td>DUI</td>
                  <td id="mDui"></td>
                </tr>
                <tr>
                  <td>NIT</td>
                  <td id="mNit"></td>
                </tr>
                <tr>
                  <td>ESTADO CIVIL</td>
                  <td id="mEstadoCivil"></td>
                </tr>
                <tr>
                  <td>DIRECCION</td>
                  <td id="mDireccion"></td>
                </tr>
                <tr>
                  <td>DEPARTAMENTO</td>
                  <td id="mDepartamento"></td>
                </tr>
                <tr>
                  <td>MUNICIPIO</td>
                  <td id="mMunicipio"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <div class="msj"></div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="mdlModificar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar Asociado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="frmModificarAsociado">
            <div class="form-group">
              <div class="row">
                <div class="col-md-2">
                  <label for="">ID:</label>
                  <input type="text" class="form-control" id="txtIdMod" name="txtIdMod" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">NOMBRE:</label>
                  <input type="text" class="form-control" id="txtNombreMod" name="txtNombreMod">
                </div>
                <div class="col-md-6">
                  <label for="">APELLIDO:</label>
                  <input type="text" class="form-control" id="txtApellidoMod" name="txtApellidoMod">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">DUI:</label>
                  <input type="text" class="form-control" id="txtDuiMod" name="txtDuiMod">
                </div>
                <div class="col-md-6">
                  <label for="">NIT:</label>
                  <input type="text" class="form-control" id="txtNitMod" name="txtNitMod">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">ESTADO CIVIL:</label>
                  <select class="form-control" name="slcEstadoCivilMod" id="slcEstadoCivilMod">
                    <option value="0">Seleccione una opcion</option>
                    <?php 
                      $objAsociado = new Asociado();

                      $data = $objAsociado->dataEstadoCivil();

                      if ($data!=false) {
                        foreach ($data as $value) {
                    ?>
                      <option value="<?php echo $value['idEstadoCivil']; ?>"><?php echo $value['nombreEstadoCivil']; ?></option>
                    <?php
                        }
                      }

                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="">DIRECCION:</label>
                  <textarea class="form-control" name="txtDireccionMod" id="txtDireccionMod" cols="20" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">DEPARTAMENTO</label>
                  <select class="form-control" name="slcDepartamentoMod" id="slcDepartamentoMod">
                    <option value="0">Seleccione un departamento</option>
                    <?php 
                      $objAsociado = new Asociado();

                      $data = $objAsociado->dataDepartamento();

                      if ($data!=false) {
                        foreach ($data as $value) {
                    ?>
                      <option value="<?php echo $value['idDepartamento']; ?>"><?php echo $value['nombreDepartamento']; ?></option>
                    <?php
                        }
                      }

                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">MUNICIPIO</label>
                  <select class="form-control" name="slcMunicipioMod" id="slcMunicipioMod">
                    <option value="0">Esperando</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="msj"></div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-warning" id="btnModificar" name="btnModificar">Modificar</button>
          </div>
        </div>
      </div>
    </div>



    <!-- /MODALES -->
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">DASHBOARD</h4>
            </div>
            <div class="menu">
                <a href="../view/dashboard.php" class="d-block text-light p-3 border-0 active"><i class="icon ion-md-apps lead mr-2"></i>
                    Tablero</a>
                <a href="#" class="d-block text-light p-3 border-0 active"><b style="font-weight: bold;"><i class="icon ion-ios-people lead mr-2"></i>
                    Asociados</b></a>

                
                
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="../media/user-1.png" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    <?php echo $_SESSION['nombre']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../php/cerrarSesion.php">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">
              <section>
                  <div class="p-4">
                      
                      <div class="row">
                          <div class="col-lg-12 my-3">
                              <div class="card rounded-0">
                                  <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">REGISTRO DE ASOCIADOS</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="row col-md-3 mb-4">
                                      <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#mdlNuevo"><i class="icon ion-ios-people"></i> Agregar Asociado</button>
                                    </div>
                                             <table id="listadoAsociado" class="display" style="" cellspacing="1" width="100%" >
                                                 
                                                 <thead>
                                                     <th>ACCIONES</th>
                                                     <th>ID</th>
                                                     <th>NOMBRE</th>
                                                     <th>DUI</th>
                                                     <th>NIT</th>
                                                     <th>INGRESO</th>
                                                     <th>ACTIVO</th>
                                                 </thead>
                                                 <tbody>
                                    <?php 
                                                 $objAsociado = new Asociado();
                                                 $data = $objAsociado->dataAsociado();
                                                 if ($data!=false) {
                                                 
                                                 
                                                   foreach ($data as $value) {
                                    ?>
                                                     <tr>
                                                         <td>
                                                           <button data-toggle="modal" data-target="#mdlModificar" class="btn btn-warning btn-sm btnModificar"><i class="bi bi-pencil-square"></i></i></button>
                                                           <button data-toggle="modal" data-target="#mdlMostrar" class="btn btn-dark btn-sm btnModificar"><i class="bi bi-eye"></i></button>
                                               <?php  
                                                      if ($value['active']==0) {
                                                        ?>
                                                           <button class="btn btn-primary btn-sm btnActive" id="<?php echo $value['idAsociado']; ?>"><i class="bi bi-person-check-fill"></i></button>

                                                        <?php
                                                      }else{
                                                        ?>
                                                          <button class="btn btn-danger btn-sm btnBaja" id="<?php echo $value['idAsociado']; ?>"><i class="bi bi-person-dash-fill"></i></button>
                                                        <?php
                                                      }
                                               ?>
                                                         </td>
                                                         <td><?php echo $value['idAsociado']; ?></td>
                                                         <td><?php echo $value['nombreAsociado']." ".$value['ApellidoAsociado']; ?></td>
                                                         <td><?php echo $value['dui']; ?></td>
                                                         <td><?php echo $value['nit']; ?></td>
                                                         <td><?php echo $value['fechaIngreso']; ?></td>
                                                         <td>
                                                           <?php 
                                                              if ($value['active']=="0") {
                                                          ?>
                                                            De Baja
                                                          <?php
                                                              }else{
                                                          ?>
                                                            Activo
                                                          <?php
                                                              }

                                                            ?>
                                                         </td>

                                                     </tr>
                                    <?php
                                                   }
                                                 }
                                    ?>
                                                 </tbody>                                                                                    
                                             </table>
                                  </div>
                              </div>
                          </div>
                          
                      </div>
                  </div>
              </section>

        </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        
    <!-- Plugin de las tablas -->
  <script src="../plugins/dataTable/dataTable.min.js"></script>
  <script src="../js/frmTable.js"></script>
  <script src="../js/asociado.js"></script>
  <script src="../plugins/maskedInput/dist/jquery.mask.min.js"></script>
  <script type="text/javascript" src="https://rawcdn.githack.com/franz1628/validacionKeyCampo/bce0e442ee71a4cf8e5954c27b44bc88ff0a8eeb/validCampoFranz.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php


}else{
	header('Location: ../forms/login.php');
}
 ?>
