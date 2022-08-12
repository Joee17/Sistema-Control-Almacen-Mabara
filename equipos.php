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
              include('cado/clase_equipos.php');
       
              $obj=new Equipo();
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
            <h1 class="m-0 text-dark">Gestionar Equipos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Mabara</a></li>
              <li class="breadcrumb-item active">Equipos</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/equipo.php" method=post >
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
                        <label>Nombre:</label><br>
                        <input class="form-control" id="txtnombre" name="txtnombre" type="text" placeholder="Por favor digite nombredel equipo"   autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="col-md-6">
                        <label>Tipo:</label><br>
                        <select class="form-control" id="txttipo" name="txttipo" >
                        <option value="MATERIAL" selected>MATERIAL</option>
                          <option value="MAQUINARIA">MAQUINARIA</option>
                          <option value="EPP" >EPP</option>
                          <option value="IPER">IPER</option>
                          <option value="ENSA">MATERIAL ENSA</option>
                        </select>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="apellidos">Medida:</label>
                        <input type="text" name="txtmedida" id="txtmedida" placeholder="Ingrese la medidad(UND,KG,MTS,..)" class="form-control" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                  
                </div>
               

                </form>
                </div>
                </br><hr style="margin-left: 16px;background-color:#437cc5;height: 3px;width: 98%;border-radius:5in;">
                <div class="card-body">
              
                <table id="example" style="width: 100%;" class="table table-bordered display responsive no-wrap" >
                  <thead>                  
                    <tr>
                      <th style="width: 10px;">#</th>
                      <th >Nombre</th>
                      <th style="width: 20px;">Tipo</th>
                      <th style="width: 10px;">Medida</th>
                      <th style="width: 10px;">Stock</th>
                      <th style="width: 10px;"></th>
                      <th style="width: 10px;"></th>
                      <th style="width: 10px;"></th>
                      
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
                      <td><?=$fila[2]?></td>
                      <td><?=$fila[3]?></td>
                      <td><?=$fila[4]?></td>
                      <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  onClick="editar('<?=$fila[0] ?>','<?=$fila[1]?>','<?=$fila[2]?>','<?=$fila[3]?>')">
                      <i class='fa fa-edit'></i></button></td>
                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila[0]?>')"> 
                      <i class='fa fa-trash'></i></button> </td>    
                      <?php 
                      if($fila[2]=="IPER"){
                      ?>    
                      <td><button type="button" id="btnIngreso" name="btnIngreso" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  data-toggle="modal" data-target="#modal_ipper" onClick="ingreso2('<?=$fila[0]?>')"> 
                      <i class='fa fa-plus'></i></button> </td>   
             <?php
                      }else{?>
                      <td><button type="button" id="btnIngreso" name="btnIngreso" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  data-toggle="modal" data-target="#modal_ingreso"  onClick="ingreso('<?=$fila[0]?>')"> 
                      <i class='fa fa-plus'></i></button> </td>  
                        <?php
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
    

  <div class="modal fade" id="eliminar" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <form id=frmEliminar action="crud/equipo.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">
          <h3><center>¿Desea eliminar este equipo?</center></h3>
          
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
  <div class="modal fade" id="modal_ingreso" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="titulo3">Ingreso Material</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form id="frm" action="crud/ingreso.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion3" name="txtoperacion"  style="display:none;">
          
          
          <input class="form-control" type="text" id="txtid3" name="txtidequipo"  style="display:none;">
          <div class="form-group" id="passss1" >
        <label>Cantidad:</label><br>
        <input class="form-control" type="number" id="txtcantidad" name="txtcantidad" autocomplete="off" min="0" required>
         <div id="result-username"></div>
        </div> 
        <div class="form-group" id="passss" >
        <label>Precio:</label><br>
        <input class="form-control" type="number" id="txtprecio" name="txtprecio" autocomplete="off" min="0.00" max="10000.00" step="0.01" required>
         <div id="result-username"></div>
        </div>
       
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-primary" id="btnGrabar2" name="btnGrabar2">Grabar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
      </form>
      </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="modal_ipper" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="titulo3">Ingreso IPPER</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form id="frm" action="crud/ingreso.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion3" name="txtoperacion" value="ipper" style="display:none;">
          
          
          <input class="form-control" type="text" id="txtid10" name="txtidequipo"  style="display:none;">
          <div class="form-group" id="passss1" >
        <label>Codigo:</label><br>
        <input class="form-control" type="number" id="txtcodigo" name="txtcodigo" autocomplete="off" min="0" required>
         <div id="result-username"></div>
        </div> 
        <div class="form-group" >
        <label>Descripción:</label><br>
        <input class="form-control" type="text" id="txtdescripcion" name="txtdescripcion" autocomplete="off" required>
         <div id="result-username"></div>
        </div> 
       
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-primary" id="btnGrabar2" name="btnGrabar2">Grabar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
      </form>
      </div>
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
    function eliminar(id2) {
         $("#txtid2").val(id2);
         $("#txtoperacion2").val("eliminar");					
       }
       function ingreso(id3) {
         $("#txtid3").val(id3);
         $("#txtoperacion3").val("registrar");					
       }
       function ingreso2(id10) {
         $("#txtid10").val(id10);					
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
  require_once("footer_equipos.php")
  ?>