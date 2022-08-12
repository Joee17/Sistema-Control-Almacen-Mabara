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
              $listar=$obj->listar($_GET['id']);
              $i=0;
              if(!isset($_GET["e"])){

              }else{
              if($_GET["e"]==1){
                echo'<script>jQuery(function(){swal("¡Bien!", "Asistencia registrada", "success");});</script>';
           }
          if($_GET["e"]==2){
                echo'<script>jQuery(function(){swal("¡Error!", "Asistencia Quitada", "warning");});</script>';
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
            <h1 class="m-0 text-dark">Detalle Asistencia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Sistema Mabara</li>
              <li class="breadcrumb-item "><a href="asistencia.php">Asistencia</a></li>
              <li class="breadcrumb-item active">Detalle</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
      <div class="card-body">

  
      <div class="col-md-2">
                        <label>Fecha:</label>
              <input class="form-control" id="txtnombre" style="text-align: center;" name="txtnombre" type="text" value="<?=date("d/m/Y", strtotime($_GET["fech"]))?>"  readonly >
                      
       
                        </div>

                        <hr style="background-color:#437cc5;height: 3px;width: 100%;border-radius:5in;">
                </div>
                
                <div class="card-body" style="    padding: 7px;">
              
                <table style="width:100%" id="example" class="table table-bordered display responsive no-wrap" >
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th >Persona</th>
                      <th>Estado</th>
                      <th style="width:10px"></th>
            
        
                      
                    </tr>
                  </thead>
                  <tbody style="background-color: #E5ECFA;">
                  <?php

          while($fila=$listar->fetch()){
            $i++;
          ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$fila[1]?></td>
                      

                      <?php
                        switch ($fila[2]){
                          case '0':
                            echo '<td><span class="badge bg-danger">Falta</span></td>';
                            echo ' <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  onClick="asis('."'".$fila[0]."','".$_GET['fech']."','".$_GET['id']."'".')">
                            <i class="fas fa-check"></i></button></td>';
                          break;
                          case '1':
                            echo '<td><span class="badge bg-success">Asistio</span></td>';
                            echo ' <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  onClick="falta('."'".$fila[0]."','".$_GET['fech']."','".$_GET['id']."'".')">
                            <i class="fas fa-times"></i></button></td>';
                          break;
   

                        }
                        ?>
                     
                  
            
             
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
    

 



  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
  <script >
    function asis(id,fech,id1) { 
        
        var operacion = 'asis';
var url='crud/asistencia.php';
$.ajax({
type:'POST',
url:url,
data:'id='+id+'&txtoperacion='+operacion,
success:function(msg){
  window.location.href="detalle_asistencia.php?id="+id1+"&fech="+fech;


      }
});
}
function falta(id,fech,id1) { 
        
        var operacion = 'falta';
var url='crud/asistencia.php';
$.ajax({
type:'POST',
url:url,
data:'id='+id+'&txtoperacion='+operacion,
success:function(msg){
  window.location.href="detalle_asistencia.php?id="+id1+"&fech="+fech;


      }
});
}
 
  
 
  </script>
  <?php
  require_once("footer_detalle_asistencia.php")
  ?>