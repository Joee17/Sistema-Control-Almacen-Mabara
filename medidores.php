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
              include('cado/clase_medidor.php');
       
              $obj=new Medidor();
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
            <h1 class="m-0 text-dark">Gestionar Medidores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Mabara</a></li>
              <li class="breadcrumb-item active">Medidores</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/medidor.php" method=post >
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
                    <div class="col-md-2">
                        <label>Codigo:</label><br>
                        <input class="form-control" id="txtcodigo" name="txtcodigo" type="text" placeholder="Por favor digite el codigo"   autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="col-md-2">
                        <label>Inicia:</label><br>
                        <input class="form-control" id="txtinicia" name="txtinicia" type="text" placeholder="Digíte numero incial"   autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="col-md-2">
                        <label>Termina:</label><br>
                        <input class="form-control" id="txtfin" name="txtfin" type="text" placeholder="Digíte numero final"   autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="col-md-6">
                        <label>Tipo:</label><br>
                       <select  class="form-control" name="txttipo" id="txttipo" required>
                       <option value="">Seleccione tipo...</option>
                       <option value="MEDIDOR 3 FASES 3 HILOS HEXING">MEDIDOR 3 FASES 3 HILOS HEXING</option>
                       <option value="MEDIDOR ELECTRONICO MONOFASICO 2 HILOS">MEDIDOR ELECTRONICO MONOFASICO 2 HILOS</option>
                       <option value="MEDIDOR ELECTRONICO MONOFASICO 2 HILOS TEMPORALES">MEDIDOR ELECTRONICO MONOFASICO 2 HILOS TEMPORALES</option>
                       <option value="MEDIDOR ELECTRONICO MONOFASICO 3HILOS">MEDIDOR ELECTRONICO MONOFASICO 3HILOS</option>
                       <option value="	MEDIDOR ELECTRONICO MONOFASICO 3HILOS TEMPORALES">MEDIDOR ELECTRONICO MONOFASICO 3HILOS TEMPORALES</option>
                       </select>  
                    </div>
                </div>
             
               

                </form>
                </div>
                </br><hr style="margin-left: 16px;background-color:#437cc5;height: 3px;width: 98%;border-radius:5in;">
                <div class="card-body">
              
                <table id="example"style="width:100%" class="table table-bordered display responsive no-wrap" >
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Codigo</th>
                      <th>Tipo</th>
                      <th>Estado</th>
                      <th></th>
                      <th></th>
                
                      
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
                      <?php
                        switch ($fila[3]){
                          case '1':
                            echo '<td><span class="badge bg-primary">en Espera</span></td>';
                          break;
                          case '2':
                            echo '<td><span class="badge bg-warning">Entregado</span></td>';
                          break;
                          case '3':
                            echo '<td><span class="badge bg-success">Terminado</span></td>';
                          break;

                        }
                        ?>
                      <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  onClick="editar('<?=$fila[0] ?>','<?=$fila[1]?>','<?=$fila[2]?>')">
                      <i class='fa fa-edit'></i></button></td>
                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-primary"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila[0]?>')"> 
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
         <form id=frmEliminar action="crud/medidor.php" method="POST" >
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
 
 
  <script >
    
   function editar(id,nombre,tipo) {
            $("#txtoperacion").val("modificar");      
            $("#txtid").val(id);
            $("#txtcodigo").val(nombre);
            $("#txtinicia").val('0');
            $("#txtfin").val('0');
            $("#txttipo").val(tipo);

            document.getElementById('txtcodigo').style.backgroundColor = "#EFFBFC ";
            document.getElementById('txttipo').style.backgroundColor = "#EFFBFC";
            document.getElementById('guardar').disabled = true;
            document.getElementById('modificar').disabled = false;
            window.location.assign("#person");
        }  
        function limpiar() {
            $("#txtoperacion").val("registrar");  
            document.getElementById('txtcodigo').style.backgroundColor = "#fff ";
            document.getElementById('txttipo').style.backgroundColor = "#fff";
            document.getElementById('guardar').disabled = false;
            document.getElementById('modificar').disabled = true;
        }   
            
    function eliminar(id2) {
         $("#txtid2").val(id2);
         $("#txtoperacion2").val("eliminar");					
       }
       function ingreso(id3) {
         $("#txtid3").val(id3);
         $("#txtoperacion3").val("registrar");					
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
  require_once("footer_medidor.php")
  ?>