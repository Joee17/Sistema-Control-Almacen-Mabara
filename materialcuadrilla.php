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
              include('cado/clase_cuadrilla.php');
              include('cado/clase_materialcuadrilla.php');

            
              $objc=new Cuadrilla();
              $objequi=new MaterialCuadrilla();
              $listaper=$objc->listar();
              $listar=$objequi->listar_materiales($_SESSION["idalmacen"]);
              $listarequi=$objequi->listar($_SESSION["idalmacen"]);
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
            <h1 class="m-0 text-dark">Gestionar Material De Caudrilla</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Mabara</a></li>
              <li class="breadcrumb-item active">Megados</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/materialcuadrilla.php" method=post >
                <div class="row">
                    <div class="col-md-6" > 
                        <button  type="submit" style="  border: 1px solid ;" class="btn btn-outline-primary" id="guardar"><span class="fa fa-save"></span> Guardar</button>
                        <button type="submit" style="  border: 1px solid ;"class="btn btn-outline-primary" id="modificar"  disabled="true"><span class="fa fa-pencil-alt"></span> Modificar</button>
                        <button onclick="limpiar()" style="  border: 1px solid ;"type="reset" class="btn btn-outline-primary"  ><span class="fa fa-trash"></span> Limpiar</button>
                      </div>
                </div></br>
                <input class="form-control" type="text"  id="txtoperacion" name="txtoperacion" value="registrar" style="display:none;">
                <input class="form-control" type="text"  id="txtid" name="txtid" style="display:none;">
                <div class="row">
                    <div class="col-md-6">
                        <label>Cuadrilla:</label><br>
                        <select id="txtidcuadrilla" name="txtidcuadrilla" class='mi-selector1 form-control' style="width: 100%;" required>
                <option value="">Seleccione una cuadrilla...</option>
                <?php
                  while($filaAse=$listaper->fetch()){//se recorre cada fila y se convierte en un array
                
                  ?>
                  <option value="<?=$filaAse[0]?>"><?=$filaAse[1]?> | Jefe: <?=$filaAse[2]?> </option>
                  <?php
                  }
                  ?>
                  
                </select>
                      </div>
                      <div class="col-md-6">
                        <label>Materiales:</label><br>
                        <select id="txtidequipo" name="txtidequipo" class='mi-selector form-control' onchange="myFunction()" style="width: 100%;" required>
                <option value="">Seleccione material...</option>
                <?php
                  while($fila2=$listar->fetch()){//se recorre cada fila y se convierte en un array
                
                  ?>
                  <option value="<?=$fila2[0]?>"><?=$fila2[1]?> | Stock: <label id="valor"><?=$fila2[4]?></label> </option>
                  <?php
                  }
                  ?>
                  
                </select>
                      </div>
                   
                </div>
                <div class="row">
                    <div id="canti"class="col-md-6">
                        
                          </div>
                    <div class="col-md-6">
                        <label for="apellidos">Fecha:</label>
                        <input type="date" name="txtfecha" id="txtfecha" placeholder="Por favor digite solo apellido materno" value="<?=date("Y-m-d")?>" class="form-control" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                </div>
          

                </form>
                </div>
                </br><hr style="margin-left: 16px;background-color:#437cc5;height: 3px;width: 98%;border-radius:5in;">
                <div class="card-body">
              
                <table id="example" style="width:100%" class="table table-bordered display responsive no-wrap" >
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Material</th>
                      <th>Cuadrilla</th>
                      <th>Cantidad</th>
                      <th>Mes/Año</th>
                      <th>Fecha</th>
                      <th></th>
                      <th></th>
        
                      
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
                                                        return $nombreMes." ".$anio;
                                                      }
          while($fila1=$listarequi->fetch()){
            $i++;
          ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$fila1[1]?></td>
                      <td><?=$fila1[2]?></td>
                      <td><?=$fila1[3]?></td>
                      <td><?=fechaCastellano1($fila1[4])?></td>
                      <td><?=date("d/m/Y", strtotime($fila1[4]))?></td>
                    
                      
                      <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  onClick="editar('<?=$fila1[0] ?>','<?=$fila1[5]?>','<?=$fila1[6]?>','<?=$fila1[3]?>','<?=$fila1[4]?>')">
                      <i class='fa fa-edit'></i></button></td>
           
                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila1[0]?>','<?=$fila1[5]?>','<?=$fila1[3]?>')"> 
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg> 
            </button> </td>        
            
            
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
         <form id=frmEliminar action="crud/materialcuadrilla.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">
         <input class="form-control" type="text" id="txtidequipo1" name="txtidequipo"  style="display:none;">
         <input class="form-control" type="text" id="txtcantidad1" name="txtcantidad" style="display:none;">
          <h3><center>¿Desea eliminar?</center></h3>
          
          <input class="form-control" type="text" id="txtid2" name="txtid2"  style="display:none;">
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
 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
  <script >
 function myFunction() {
  var x = document.getElementById("txtidequipo").value;
    
  var url='max.php';
    $.ajax({
      type:'POST',
      url:url,
      data:'idequipo='+x,
      success:function(datos){
          $('#canti').html(datos);
        
      }
      
    });
}
   function editar(id,idequipo,idcuadrilla,cantidad,fecha) {
        $("#txtoperacion").val("modificar");  
        $("#txtid").val(id);
        $("#txtidequipo").val(idequipo);
        $("#txtidcuadrilla").val(idcuadrilla);
        $("#txtcantidad").val(cantidad);
        $("#txtfecha").val(fecha);
        document.getElementById('txtidequipo').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtidcuadrilla').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtcantidad').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtfecha').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtcantidad').disabled=true;
        document.getElementById('guardar').disabled = true;
        document.getElementById('modificar').disabled = false;
        window.location.assign("#person");
        }  
        function limpiar() {
            $("#txtoperacion").val("registrar");  
            document.getElementById('txtidequipo').style.backgroundColor = "#FFF";
        document.getElementById('txtidcuadrilla').style.backgroundColor = "#FFF";
        document.getElementById('txtcantidad').style.backgroundColor = "#FFF ";
        document.getElementById('txtfecha').style.backgroundColor = "#FFF ";


        document.getElementById('guardar').disabled = false;
        document.getElementById('modificar').disabled = true;
        }   
        jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
    });
});
jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector1').select2();
    });
});
            
    function eliminar(id2,idequipo,cantidad) {
         $("#txtid2").val(id2);
         $("#txtidequipo1").val(idequipo);
         $("#txtcantidad1").val(cantidad);
         $("#txtoperacion2").val("eliminar");					
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
  require_once("footer_materialcuadrilla.php")
  ?>