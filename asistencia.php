<?php 
session_start();
if(!isset($_SESSION["usuario"])||$_SESSION['idtipo']==3||$_SESSION['idtipo']==5||$_SESSION['idtipo']==7||$_SESSION['idtipo']==8) {
	header('Location: index.php');
}


?>
<!DOCTYPE html>
<html lang="ES-es">
<head>
<?php
  require_once("head.php")
  ?>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
</head>
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    color:#444;
    line-height: 16px;
}
</style>
<?php
  require_once("menu.php")
  ?>
<?php
              include('cado/clase_asistencia.php');
              $obj=new Asistencia();
              $listar=$obj->listar_crea();
              $i=0;
              if(!isset($_GET["e"])){

              }else{
              if($_GET["e"]==1){
                echo'<script>jQuery(function(){swal("¡Bien!", "Registro exitoso", "success");});</script>';
           }
          if($_GET["e"]==2){
                echo'<script>jQuery(function(){swal("¡Error!", "Esta registrado en otra tabla", "warning");});</script>';
           }
           if($_GET["e"]==3){
                echo'<script>jQuery(function(){swal("¡Bien!", "Modificado exitosamente", "success");});</script>';
           }
           if($_GET["e"]==4){
                echo'<script>jQuery(function(){swal("¡Bien!", "Eliminado exitosamente", "success");});</script>';
           }}
              ?>
              <style>
html {
  scroll-behavior: smooth;
}
</style>
  <div class="content-wrapper" id="person">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Asistencia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Mabara</a></li>
              <li class="breadcrumb-item active">Asistencia</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
      <div class="card-body">

      <form name="formcliente" action="crud/asistencia.php" method=post >
      <input class="form-control" type="text"  id="txtoperacion" name="txtoperacion" value="generar" style="display:none;">
              <div class="col-md-6">
                        <button  type="submit" style="  border: 1px solid " class="btn btn-outline-primary" id="guardar"><i class="fas fa-sync-alt"></i> Generar Asistencia</button>
                      
       
                        </div>

                        <hr style="background-color:#437cc5;height: 3px;width: 100%;border-radius:5in;">
                        </form>
                </div>
                
                <div class="card-body" style="    padding: 7px;">
              
                <table style="width:100%" id="example" class="table table-bordered display responsive no-wrap" >
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Día/Mes/Año/</th>
                      <th>Fecha</th>
                      <th style="width:10px"></th>
                      <th style="width:10px"></th>
        
                      
                    </tr>
                  </thead>
                  <tbody style="background-color: #E5ECFA;">
                  <?php
                                                      function fechaCastellano1 ($fecha) {
                                                        $fecha = substr($fecha, 0, 10);
                                                        $numeroDia = date('d', strtotime($fecha));
                                                        $dia = date('l', strtotime($fecha));
                                                        $mes = date('F', strtotime($fecha));
                                                        $anio = date('Y', strtotime($fecha));
                                                        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
                                                        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                                                        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
                                                      $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                                        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                                        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
                                                        return $nombredia." ".$numeroDia." ".$nombreMes." ".$anio;
                                                      }
          while($fila=$listar->fetch()){
            $i++;
          ?>
                    <tr>
                      <td><?=$i?></td>
                      
                      <td><?=fechaCastellano1($fila[1])?></td>
                      <td><?=date("d/m/Y", strtotime($fila[1]))?></td>
                      <td><button type="button" id="btnelimina" name="btneliminar" data-toggle="modal" data-target="#eliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  onClick="eliminar('<?=$fila[0] ?>')">
                      <i class='fa fa-trash'></i></button></td>
                      <td><a href="detalle_asistencia.php?id=<?=$fila[0]?>&fech=<?=date("d/m/Y", strtotime($fila[1]))?>" type="button" id="btnsig" name="btnsig" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  >
                      <i class="fa fa-chevron-circle-right"></i></a></td>
                  
            
             
                    </tr>
                    <?php	
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
              </section>
            </div>
            <!-- /.card -->
    

  <div class="modal fade" id="eliminar" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <form id=frmEliminar action="crud/asistencia.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">

          <h3><center>¿Desea eliminar registro de asistencia?</center></h3>
          
          <input class="form-control" type="text" id="txtid" name="txtid"  style="display:none;">
        </div>
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-primary" id="btnGrabar2" name="btnGrabar2">Eliminar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
			</form>
      </div>
      
    </div>
  </div>
 



  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
  <script >
  
    function eliminar(id2) {
         $("#txtid").val(id2);
         $("#txtoperacion").val("eliminar");					
       }
      
  </script>
  <?php
  require_once("footer_asistencia.php")
  ?>