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
  
</head>
<?php
  require_once("menu.php")
  ?>
<?php
              include('cado/clase_ingreso.php');
       
              $obj=new Ingreso();
              $listar=$obj->listar($_SESSION["idalmacen"]);
             
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
            <h1 class="m-0 text-dark">Kardex Ingreso</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Mabara</a></li>
              <li class="breadcrumb-item active">Detalle</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
  
                <div class="card-body">
              
                <table id="example" style="width: 100%;"class="table table-bordered display responsive no-wrap" >
                  <thead>                  
                    <tr>
                      <th style="width: 10px;">#</th>
                      <th>Nombre</th>
                      <th style="width: 10px;">Tipo</th>
                      <th style="width: 10px;">Cantidad</th>
                      <th style="width: 50px;">P. Unitario</th>
                      <th style="width: 10px;">Subtotal</th>
                      <th style="width: 10px;">Día-Mes-Año</th>
                      <th style="width: 10px;">Fecha</th>
                      
                      <th style="width: 10px;"></th>
                      
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
                      <td><?=$fila[1]?></td>
                      <td><?=$fila[6]?></td>
                      <td><?=$fila[2]?></td>
                      <td>s/<?=$fila[3]?></td>
                      <td>s/<?=$fila[3]*$fila[2]?></td>
                      <td><?=fechaCastellano1($fila[4])?></td>
                      <td><?=date("d/m/Y", strtotime($fila[4]));?></td>


                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila[0]?>','<?=$fila[2]?>','<?=$fila[5]?>')"> 
                      <i class='fa fa-trash'></i></button> </td>        
                     
             
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
         <form id=frmEliminar action="crud/ingreso.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">
          <h3><center>¿Desea Anular Ingreso?</center></h3>
          
          <input class="form-control" type="text" id="txtid2" name="txtiddetalle"  style="display:none;">
          <input class="form-control" type="text" id="txtidequipo" name="txtidequipo"  style="display:none;">
          <input class="form-control" type="text" id="txtcantidad" name="txtcantidad"  style="display:none;">
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
 
  <script >
    
   function editar(id,nombre,tipo,medida) {
            $("#txtoperacion").val("modificar");      
            $("#txtid").val(id);
            $("#txtnombre").val(nombre);
            $("#txttipo").val(tipo);
            $("#txtmedida").val(medida);
            document.getElementById('txtnombre').style.backgroundColor = "#EFFBFC ";
            document.getElementById('txttipo').style.backgroundColor = "#EFFBFC";
            document.getElementById('txtmedida').style.backgroundColor = "#EFFBFC ";
            document.getElementById('guardar').disabled = true;
            document.getElementById('modificar').disabled = false;
            window.location.assign("#person");
        }  
        function limpiar() {
            $("#txtoperacion").val("registrar");  
            document.getElementById('txtnombre').style.backgroundColor = "#fff ";
            document.getElementById('txttipo').style.backgroundColor = "#fff";
            document.getElementById('txtmedida').style.backgroundColor = "#fff ";
            document.getElementById('guardar').disabled = false;
            document.getElementById('modificar').disabled = true;
        }   
        function nuevo_usuario(id3) {
           $("#titulo3").html("Usuario Nuevo"); 
           $("#txtoperacion5").val("registrar_nuevo_personal"); 
            $("#txtid3").val(id3);  
            $("#txtusuario").val("");
            $("#txtpassword").val("");  
           
          document.getElementById('txtpassword').style.backgroundColor = "#fff ";
        document.getElementById('txtusuario').style.backgroundColor = "#fff";

        }    
        function editar_usuario(id4,usuario,password,tipo) {
           $("#titulo3").html("Editar Usuario"); 
           $("#txtoperacion5").val("modificarp"); 
            $("#txtid3").val(id4);
            $("#txtusuario").val(usuario);
            $("#txtpassword").val(password);  
            $("#txttipo").val(tipo);
          document.getElementById('txtpassword').style.backgroundColor = "#EFFBFC  ";
        document.getElementById('txtusuario').style.backgroundColor = "#EFFBFC";
        document.getElementById('passss').style.display = "none";

        }  
        function editar_pass(id4) {
           $("#titulo3").html("Cambiar Clave"); 
           $("#txtoperacion5").val("modificarpass"); 
            $("#txtid3").val(id4);

          document.getElementById('txtpassword').style.backgroundColor = "#EFFBFC  ";
        document.getElementById('txtusuario').style.backgroundColor = "#EFFBFC";
        document.getElementById('passss1').style.display = "none";
        document.getElementById('passss2').style.display = "none";
        }         
    function eliminar(id2,cantidad,idequipo) {
         $("#txtid2").val(id2);
         $("#txtidequipo").val(idequipo);
         $("#txtcantidad").val(cantidad);
         $("#txtoperacion2").val("eliminar");					
       }
       function deshabilitar(id7) {
      $("#txtid7").val(id7);  				
       }
       function habilitar(id6) {
      $("#txtid6").val(id6);				
       }
	function cerrar(id) {
         window.location.href="index.php";			
      }
function enviar(){
   document.formcliente.submit();
}

$("#myModal").on("shown.bs.modal", function(){
    $("#txtnombres").focus();
});
 
  </script>
  <?php
  require_once("footer_ingreso.php")
  ?>