
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse" >
<div class="wrapper">
 
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php
              include('cado/clase_almacen.php');
       
              $obj=new Almacen();
              $listar=$obj->Buscar($_SESSION["idalmacen"]);
              
              ?>  
      <li class="nav-item d-none d-sm-inline-block">
      <?php while($fila=$listar->fetch()){?>
        <a href="" class="nav-link"> Almacén: <?=$fila[1] ?></a>
        <?php }?>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio.php" class="nav-link"><i class="fas fa-exchange-alt"></i> Cambiar</a>
      </li>
      </li>
      
    </ul>
   
    <ul class="navbar-nav ml-auto">
        
      
      <li class="nav-item dropdown">
  
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       
          <span class="dropdown-item dropdown-header">Alertas</span>
          
   
          <div class="dropdown-divider"></div>
          <a href="detalle_pdf.php?id="  class="dropdown-item" target="_blank" style="cursor:pointer;">
          <i class="fas fa-exclamation"></i>
            
          </a>
          <div class="dropdown-divider"></div>
      
        <?php


        ?>
         
        </div>
      </li><?php
      
        ?>
      <li class="nav-item ">
      <a class="nav-link"  href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="logo.png" alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8">
           <span class="brand-text font-weight-light">MABARA</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
       
      
        
      
      <?php
        
      switch ($_SESSION['idtipo']){
    
        case '1': ?>  
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="personal.php" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Personal
              </p>
            </a>
          </li>
        <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-warehouse"></i>
              <p>
               Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="equipos.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            
              <p>
                Equipos y Materiales
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ingreso.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Detalle Ingreso
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="equipoPersonal.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                EPP-IPPER-MAQUINARIA
                
              </p>
            </a>
          </li>
            </ul>
          </li>
               <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-business-time"></i>
              <p>
                Tareo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="megados.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Megados
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="asistencia.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Asistencia
                
              </p>
            </a>
          </li>
        
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Cuadrilla
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="cuadrilla.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Aperturar
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="materialcuadrilla.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Materiales
                
              </p>
            </a>
          </li>
          
        
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-lightbulb"></i>
              
              <p>
                Medidores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="medidores.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Registrar
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="asignacion.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>
              
                Asiganción
                
              </p>
            </a>
          </li>
          
        
            </ul>
          </li>
          
          
       
        
         
        </ul>
      </nav>
   <?php break;
      }
       ?>  
 

  

     
    
    </div>

  </aside>

  