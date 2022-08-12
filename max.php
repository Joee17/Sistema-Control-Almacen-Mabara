<?php
 include('cado/clase_materialcuadrilla.php');

 $obj=new MaterialCuadrilla();
 $listar=$obj->buscar($_POST['idequipo']);
 while($fila=$listar->fetch()){
  $max=$fila[4];}
?>
<label >Cantidad:</label>
  <input type="number" name="txtcantidad" id="txtcantidad" min="0" max="<?=$max?>"  placeholder="Por favor digite una cantidad" class="form-control" value=""required>
