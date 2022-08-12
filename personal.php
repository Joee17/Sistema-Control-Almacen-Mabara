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
              include('cado/clase_personal.php');
              include('cado/clase_login.php');
              $objlo=new Login();
              $objTrabajador=new Persona();
              $listar=$objTrabajador->listar();
             
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
            <h1 class="m-0 text-dark">Gestionar Personal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Mabara</a></li>
              <li class="breadcrumb-item active">Personal</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/personal.php" method=post >
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
                        <label>DNI:</label><br>
                        <input class="form-control" type="number" placeholder="Por favor digite solo dni"  id="txtdni" name="txtdni" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="col-md-6">
                        <label>Nombres:</label><br>
                        <input class="form-control" type="text" placeholder="Por favor digite solo nombres"  id="txtnombres" name="txtnombres" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="apellidos">Apellido Paterno:</label>
                        <input type="text" name="txtapellidopa" id="txtapellidopa" placeholder="Por favor digite solo apellido paterno" class="form-control" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos">Apellido Materno:</label>
                        <input type="text" name="txtapellidoma" id="txtapellidoma" placeholder="Por favor digite solo apellido materno" class="form-control" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <label for="fechanacimiento">Fecha Nac. :</label>
                        <input type="date" name="txtfechanac" id="txtfechanac" value="1995-01-01" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cargo">Cargo:</label>
                        <input type="text" name="txtcargo" autocomplete="off" id="txtcargo" placeholder="Por favor digite un cargo" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                    
                </div>

                </form>
                </div>
                </br><hr style="margin-left: 16px;background-color:#437cc5;height: 3px;width: 98%;border-radius:5in;">
                <div class="card-body">
              
                <table style="width:100%" id="example" class="table table-bordered display responsive no-wrap" >
                  <thead>                  
                    <tr>
                      <th style="width: 10px;">#</th>
                      <th style="width: 10px;">DNI</th>
                      <th>Ap. Paterno</th>
                      <th>Ap. Materno</th>
                      <th>Nombres</th>
                      <th style="width: 10px;">Fecha Nac.</th>
                      <th style="width: 10px;">Cargo</th>
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
                      <td><?=date("d/m/Y", strtotime($fila[5]));?></td>
                      <td><?=$fila[6]?></td>
 
                      <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  onClick="editar('<?=$fila[0] ?>','<?=$fila[1]?>','<?=$fila[2]?>','<?=$fila[3]?>','<?=$fila[4]?>','<?=$fila[5]?>','<?=$fila[6]?>')">
                      <i class='fa fa-edit'></i></button></td>
                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila[0]?>')"> 
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg> 
            </button> </td>        
            <td>
            <div class="dropdown">
             <button style="  border: 1px solid ;" class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-user-lock"></i> </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">     
            <?php
if(isset($fila[7])){
  
  $listausuario1=$objlo->listar_usuario_id($fila[7]);
  while($fil2=$listausuario1->fetch()){
   
?>
<a type="button" id="btnEditar" name="btnEditar" style="  color:#437cc5;" class="dropdown-item "  data-toggle="modal" data-target="#modal_login"  onClick="editar_usuario('<?=$fil2[0] ?>','<?=$fil2[1]?>','<?=$fil2[2]?>','<?=$fil2[3]?>')">
            <i class="fas fa-user-edit"></i> Editar</a>
            <a type="button" id="btnEliminar" name="btnEliminar" style="  color:#437cc5;" class="dropdown-item " data-toggle="modal" data-target="#modal_login"  onClick="editar_pass('<?=$fil2[0]?>')"> 
              <i class="fas fa-key"></i> Cambiar Clave</a> 
            <?php if($fil2[4]==1){ ?>
            
              <a type="button" id="btnEliminar" name="btnEliminar" style="  color:#437cc5;" class="dropdown-item " data-toggle="modal" data-target="#deshabilitar"  onClick="deshabilitar('<?=$fil2[0]?>')"> 
              <i class="fas fa-user-alt-slash"></i> Deshabilitar</a>
              
             <?php }else{ ?>

              <a type="button" id="btnEliminar" name="btnEliminar" style="  color:#437cc5;" class="dropdown-item " data-toggle="modal" data-target="#habilitar"  onClick="habilitar('<?=$fil2[0]?>')"> 
              <i class="fas fa-user-check"></i> Habilitar</a>
             <?php }?>   
            

             

<?php
}
}
else{?>
            <a type="button"  style="  color:#437cc5;" class="dropdown-item "  data-toggle="modal" data-target="#modal_login" onClick="nuevo_usuario('<?=$fila[0] ?>')" > 
            <i class="fas fa-user-shield"></i> Nuevo</a>
          <?php }?>
            
            </div>
            </div>
             </td>
             
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
         <form id=frmEliminar action="crud/personal.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">
          <h3><center>¿Desea eliminar un trabajador?</center></h3>
          
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
  <div class="modal fade" id="deshabilitar" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <form id=frmEliminar action="crud/personal.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="deshabilitar" style="display:none;">
          <h3><center>¿Desea Deshabilitar este Usuario?</center></h3>
          
          <input class="form-control" type="text" id="txtid7" name="txtid7"  style="display:none;">
        </div>
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-primary" id="btnGrabar2" name="btnGrabar2">Deshabilitar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
			</form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="habilitar" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <form id=frmEliminar action="crud/personal.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="habilitar" style="display:none;">
          <h3><center>¿Desea Habilitar este Usuario?</center></h3>
          
          <input class="form-control" type="text" id="txtid6" name="txtid6"  style="display:none;">
        </div>
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-primary" id="btnGrabar2" name="btnGrabar2">habilitar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
			</form>
      </div>
      
    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

   <script type="text/javascript">
$(document).ready(function() {	
    $('#txtusuario').on('blur', function(){
        $('#result-username').html('<img src="loader.gif" />').fadeOut(1000);

        var username = $(this).val();		
        var dataString = 'username='+username;

        $.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
                $('#result-username').fadeIn(1000).html(data);
            }
        });
    });              
});    
</script>
  <div class="modal fade" id="modal_login" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="titulo3">CREAR USUARIO</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form id="frm" action="crud/login.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion5" name="txtoperacion5"  style="display:none;">
          
          
          <input class="form-control" type="text" id="txtid3" name="txtid3"  style="display:none;">
          <div class="form-group" id="passss1" >
        <label>Usuario:</label><br>
        <input class="form-control" type="text" id="txtusuario" name="txtusuario"  required>
         <div id="result-username"></div>
        </div> 
        <div id="passss" class="form-group">
        <label>Password:</label><br>
        <input class="form-control" type="password" id="txtpassword" name="txtpassword" autocomplete="off" required>
        </div>
        <div class="form-group" id="passss2" >
        <label>Tipo:</label><br>
        <select name="txttipo" id="txttipo" class="form-control " style="width: 100%;" >

                    <option selected="true" value="1">Administrador</option>
                  <option selected="true" value="2">Auditor</option>

               
        </select>
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
    
   function editar(id,dni,apellidopa,apellidoma,nombres,fechanac,cargo) {
        $("#txtoperacion").val("modificar");      
        $("#txtid").val(id);
        $("#txtdni").val(dni);
        $("#txtapellidopa").val(apellidopa);
        $("#txtapellidoma").val(apellidoma);
        $("#txtnombres").val(nombres);
        $("#txtfechanac").val(fechanac);
        $("#txtcargo").val(cargo);
      
        document.getElementById('txtdni').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtnombres').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtapellidopa').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtapellidoma').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtfechanac').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtcargo').style.backgroundColor = "#EFFBFC ";
        document.getElementById('guardar').disabled = true;
        document.getElementById('modificar').disabled = false;
        window.location.assign("#person");
        }  
        function limpiar() {
            $("#txtoperacion").val("registrar");  
            document.getElementById('txtdni').style.backgroundColor = "#fff ";
        document.getElementById('txtnombres').style.backgroundColor = "#fff ";
        document.getElementById('txtapellidoma').style.backgroundColor = "#fff";
        document.getElementById('txtapellidopa').style.backgroundColor = "#fff";
        document.getElementById('txtfechanac').style.backgroundColor = "#fff ";
        document.getElementById('txtcargo').style.backgroundColor = "#fff ";

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
  require_once("footer.php")
  ?>