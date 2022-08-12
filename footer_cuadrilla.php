
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
    <strong>Copyright &copy; 2021 <a style="color:#437cc5;" href="http://mabara.pe"> MABARA</a>.</strong>
    </div>
  </footer>
</div>
<?php
  require_once("scripts.php")
  ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>   
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>   
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>    
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>    
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="datepicker/bootstrap-datepicker.js"></script>

  <script type="text/javascript">
var idioma=

{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ ",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 ",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copyTitle": 'Informacion copiada',
        "copyKeys": 'Use your keyboard or menu to select the copy command',
        "copySuccess": {
            "_": '%d filas copiadas al portapapeles',
            "1": '1 fila copiada al portapapeles'
        },

        "pageLength": {
        "_": "Mostrar %d filas",
        "-1": "Mostrar Todo"
        },
      
    
    }
};

$(document).ready(function() {


var table = $('#example').DataTable( {
responsive: true,
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": true,
"language": idioma,
"lengthMenu": [8],
"aoColumnDefs": [ 
      { 'bSortable': false, 'aTargets': [ -1,-2 ] } 
     ] ,

dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',

buttons: {
dom: {
container:{
  tag:'div',
  className:'flexcontent'
},
buttonLiner: {
  tag: null
}
},
buttons: [

       
        {
            extend:    'copyHtml5',
            text:      '<i class="fa fa-clipboard"></i>Copiar',
            title:'Cuadrillas Mabara',
            titleAttr: 'Copiar',
            className: 'btn btn-app export barras',
            exportOptions: {
                columns: [0,1,2 ]
            }
        },


        {
            extend:    'excelHtml5',
            text:      '<i class="fa fa-file-excel"></i>Excel',
            title:'Cuadrillas Mabara',
            titleAttr: 'Excel',
            className: 'btn btn-app export excel',
            exportOptions: {
                columns: [0,1,2 ]
            },
        },
       
    
        
        
    ]


}



});


} );
</script>


</body>
</html>

