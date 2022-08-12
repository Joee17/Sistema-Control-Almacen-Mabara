<?php 
session_start();
if(!isset($_SESSION["usuario"])||$_SESSION['idtipo']==3||$_SESSION['idtipo']==5||$_SESSION['idtipo']==7||$_SESSION['idtipo']==8) {
	header('Location: index.php');
}


?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!DOCTYPE >

<HTML>
   <HEAD>
      <TITLE>Mabara</TITLE>
   </HEAD>
<body style="background:#F5F8FC">
    <div class="container" >    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Almacenes</div>

                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form action="inicio_sesion.php" class="form-horizontal" method="POST">
                        <?php
              include('cado/clase_almacen.php');
       
              $obj=new Almacen();
              $listar=$obj->listar();?>     
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <select id="login-username" type="text" class="form-control" name="txtidalmacen" value="" required>     
                                        <option value="">Seleccione Almacén...</option>
                                        <?php
          while($fila=$listar->fetch()){
            $i++;
          ?>
                                        <option value="<?=$fila[0] ?>"><?=$fila[1] ?></option>
                                       
                                       <?php }?>
                                        </select>                                   
                                    </div>
                                

                                
        


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls" style="text-align: center;">
                                      <button type="submit"  id="btn-login" class="btn btn-success">Comenzar </button>
                  

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 2px solid#3F3F3F; padding-top:15px; font-size:85%" >
                                          
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                        ¿Desea ingresar uno nuevo?
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Registrar Almacén</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Volver</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form action="crud/almacen.php" class="form-horizontal" role="form" method="POST">
                                

                                  
                            
                            <input type="text" class="form-control" name="txtoperacion" value="registrar" style="display:none;">
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txtnombre" placeholder="Dígite nombre">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit"  class="btn btn-info">Registrar</button>
                  
                                    </div>
                                </div>
                             
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
  
    </div>
    </body>
    </HTML>