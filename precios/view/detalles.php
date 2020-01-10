<?php
  
$idCliente = $_POST['idCliente'];
$nombre    = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono  = $_POST['telefono'];
$rfc       = $_POST['rfc'];
$plazo     = $_POST['plazo'];
$credito   = $_POST['credito'];
$correo    = $_POST['correo'];
$contacto  = $_POST['contacto'];
$ciudad    = $_POST['ciudad'];
$estado    = $_POST['estado'];
$info      = $_POST['info'];
$cp        = $_POST['cp'];
$ver       = $_POST['ver'];

?>


<div class="row mt-20-px">
  <div class="col-xs-12 text-right">
    <button class="btn btn-info btn-sm" type="button" onclick="$('#contenedor').load('clientes/view/clientes.php')"> Regresar </button>
  </div>
</div>

<div class="row mt-1">
    
  <div class="col-xs-12">
      
    <div class="panel panel-default">

      <div class="panel-heading bg-coral text-white text-center">
        <h3 class="panel-title"> <i class="fa fa-pie-chart"></i> Detalles del Cliente <?= $nombre ?> </h3>
      </div>
      
      <div class="panel-body">
      
        <div class="row mb-1">
          <div class="col-xs-12">
            <button class="btn btn-info" data-toggle="collapse" data-target="#form_cliente"> <span class="caret"></span> Ver / Editar Cliente</button>
          </div>
        </div>

        <!-- un formulario para añadir nuevas bases -->
        <form action="#" method="POST" name="form_cliente" id="form_cliente" class="collapse fade <?= $ver ?>">
                    
          <div class="row">
            
            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Nombre del cliente *</label>
                <input class="form-control" name="nombre" value="<?= $nombre ?>" type="text" required maxlength="150" title="Ingrese el nombre del cliente" placeholder="Ingrese el nombre del cliente" />
              </div>

            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Dirección</label>
                <input class="form-control" name="direccion" value="<?= $direccion ?>" type="text" maxlength="150" title="Ingrese la dirección del cliente" placeholder="Ejemplo: Calle nombre de la calle #777, col. nombre de la colonia" />
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>R.F.C. del cliente *</label>
                <input class="form-control" name="rfc" type="text" value="<?= $rfc ?>" required minlength="12" maxlength="13" placeholder="Ejemplo: ABC123456ABC" title="Ingrese el R.F.C del cliente" />
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Teléfono</label>
                <input class="form-control" name="telefono" value="<?= $telefono ?>" type="tel" maxlength="20" title="Ingrese el número de teléfono del cliente" placeholder="Telefono" >
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Nombre del contacto</label>
                <input class="form-control" name="contacto" value="<?= $contacto ?>" type="text" maxlength="32" placeholder="nombre del contacto">
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Plazo</label>
                <input class="form-control" name="plazo" value="<?= $plazo ?>" type="number" title="Ingrese como máximo dos digitos" placeholder="Plazo" >
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Crédito</label>
                <input class="form-control" name="credito" value="<?= $credito ?>" type="number" title="Ingrese como máximo dos digitos" placeholder="Credito al cliente">
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Correo</label>
                <input class="form-control" name="correo" value="<?= $correo ?>" type="email" maxlength="60" placeholder="Ejemplo: ejemplo@mail.com">
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label data-texto="">Estado</label>
                <input class="form-control" name="estado" value="<?= $estado ?>" type="text" maxlength="50" placeholder="Ejemplo: Nombre de Estado" />
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label data-texto="">Ciudad</label>
                <input class="form-control" name="ciudad" value="<?= $ciudad ?>" type="text" maxlength="80" placeholder="Ejemplo: Nombre de Ciudad" title="Ingrese únicamente letras" >
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label data-texto="">Código postal</label>
                <input class="form-control" name="cp" value="<?= $cp ?>" type="number" maxlength="5" minlength="5" title="Ingrese únicamente cinco digitos" placeholder="Ejemplo: 12345">
              </div>              

            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                  <label data-texto="">Información adicional</label>
                  <input class="form-control" name="info" value="<?= $info ?>" type="text" placeholder="Más Info" maxlength="150">
              </div>
              
            </div>

          

          </div>

          <div class="row">
            
            <div class="col-xs-12 text-center">
              <button class="btn btn-primary" type="submit"> Modificar </button>
              <button class="btn btn-danger" type="button" id="del"> Eliminar </button>
            </div>

          </div>

        </form>



        <hr />
        
        <h4 class="text-muted">Unidades del cliente <?= $nombre ?></h4>
  
        
        <div class="row mb-1">
          <div class="col-xs-12">
            <button class="btn btn-info" data-toggle="collapse" data-target="#formBase"> <span class="caret"></span> Añadir Unidad</button>
          </div>
        </div>

        <!-- un formulario para añadir nuevas bases -->
        <form action="POST" name="formBase" id="formBase" class="collapse fade in">
          
          <div class="row">

            <div class="col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre de la Unidad * </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre de la unidad" required maxlength="150" />
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="info"> Información adicional </label>
                <input type="text" name="info" class="form-control" placeholder="información de interes" maxlength="150" />
              </div>
            </div>

            <div class="col-xs-12 text-center">
              <button type="submit" class="btn btn-primary"> Guardar Unidad </button>
            </div>
          
          </div>
        
        </form>


        <div class="row my-1">
          <div class="col-xs-12 text-right">
            
            <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#legend"> <i class="caret"></i> Nomenclaturas </button>

            <div class="collapse fade text-right mt-1" id="legend">
              <button type="button" class="btn btn-xs btn-primary"> <i class="fa fa-eye"></i> </button> ver subunidades
              <button type="button" class="btn btn-xs btn-primary"> <i class="fa fa-plus"></i> </button> Agregar subunidad
              <button type="button" class="btn btn-xs btn-info"> <i class="fa fa-edit"></i> </button> Modificar
              <button type="button" class="btn btn-xs btn-danger"> <i class="fa fa-times"></i> </button> Eliminar
            </div>

          </div>
        </div>


        <div class="table-responsive">
            
          <table class="table table-condensed table-bordered" id="tabla_unidades">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Información</th>
                <th>fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        </div>
          
        
      </div>
    
    </div>
  

  </div>


</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subunidades</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          
          <div class="col-xs-12">
            
            <div class="table-responsive">
              <table class="table table-condensed table-bordered" id="tabla_sub" style="width: 100%">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Información</th>
                    <th>fecha</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>

          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<script>
  
(function(){

  var _ = document;
  var $$ = _.querySelector.bind(_);


  var unidadGlobal = '';


  //parte de las unidades


  var insertUnit = function(ev){
    if(ev) ev.preventDefault();

    let value = this.nombre.value.trim();

    if( value.length === 0 ){
      Swal.fire("Error", 'El nombre para la unidad es requerido', 'warning');
      return;
    }

    Swal.fire({
      title: 'Agregar unidad',
      text: '¿Desea agregar la unidad ' + value + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, agregar'
    }).then((result) => {

      if (result.value) {
        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'addUnit'});
        data.push({name: 'cliente', value: '<?= $idCliente ?>'});

        $.ajax({
          url: 'clientes/php/Clientes.php',
          type: 'POST',
          dataType: 'json',
          data: data,
          beforeSend: ()=>{
            Swal.fire({
              title: 'Guardando',
              onOpen: ()=>{
                Swal.showLoading()
              },
              allowOutsideClick: false,
              allowEscapeKey: false
            });
          }
        })
        .done((response)=>{
          if( response.status === 1 ){
            Swal.fire('Exito', response.msg, 'success');
            oTableUnits.ajax.reload();//recargamos la tabla
            this.reset();//limpiamos el formukario
          }
          else{
            Swal.fire('Error', response.msg, 'error');
          }
        })
        .fail(()=> {
          Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
        });
        
      }

    });


  }

  _.formBase.addEventListener('submit', insertUnit);


  ///unidades del cliente

  var oTableUnits = $("#tabla_unidades").DataTable({
    order: [ [0, 'asc'] ],
    ajax: {
      url: "clientes/php/Clientes.php",
      type: 'POST',
      data: d=>{
        d.method = 'getUnidades';
        d.cliente = '<?= $idCliente ?>';
      },
      dataSrc: ''
    },
    columns: [
      {data: 'unidad', defaultContent: ''},
      {data: 'info', defaultContent: ''},
      {data: 'fecha', defaultContent: ''},
      {data: null, defaultContent: `
        <button type="button" class="btn btn-xs btn-primary view"> <i class="fa fa-eye"></i> </button>
        <button type="button" class="btn btn-xs btn-primary add"> <i class="fa fa-plus"></i> </button>
        <button type="button" class="btn btn-xs btn-info edit"> <i class="fa fa-edit"></i> </button>
        <button type="button" class="btn btn-xs btn-danger del"> <i class="fa fa-times"></i> </button>
      `},
    ]

  });


  $('#tabla_unidades').on('click', 'button', function(ev){
    if(ev) ev.preventDefault();

    let data = oTableUnits.row( $(this).parents('tr').eq(0) ).data();
    console.log(data);

    if( this.classList.contains('edit') ){

      Swal.fire({
        icon: 'question',
        title: '¿Modificar la unidad?',
        html:
          '<input id="swal-input1" class="swal2-input" value="'+data.unidad+'" maxlength="150" placeholder="Ingresa el nombre de la unidad">' +
          '<input id="swal-input2" class="swal2-input" value="'+data.info+'" maxlength="150" placeholder="informacion adicional">',
        focusConfirm: false,
        showCancelButton: true,
        preConfirm: () => {
          return [
            document.getElementById('swal-input1').value,
            document.getElementById('swal-input2').value
          ]
        }
      }).then( r=>{

        if( r.value ){

          $.ajax({
            url: 'clientes/php/Clientes.php',
            type: 'POST',
            dataType: 'json',
            data: {
              method: 'editUnit',
              id: data.idUnidad,
              nombre: r.value[0],
              info: r.value[1],
            },
            beforeSend: ()=>{
              Swal.fire({
                title: 'Guardando',
                onOpen: ()=>{
                  Swal.showLoading()
                },
                allowOutsideClick: false,
                allowEscapeKey: false
              });
            }
          })
          .done((response)=>{
            if( response.status === 1 ){
              Swal.fire('Exito', response.msg, 'success');
              oTableUnits.ajax.reload();//recargamos la tabla
            }
            else{
              Swal.fire('Error', response.msg, 'error');
            }
          })
          .fail(()=> {
            Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
          });

        }

      } );

    }
    else if( this.classList.contains('del') ){

      Swal.fire({
        title: 'Eliminar la Unitad',
        text: '¿Desea eliminar la unidad ' + data.unidad + '? Si se elimina la información de las subunidades tambien se perderá',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {

        if (result.value) {

          $.ajax({
            url: 'clientes/php/Clientes.php',
            type: 'POST',
            dataType: 'json',
            data: {method: 'delUnit', id: data.idUnidad},
            beforeSend: ()=>{
              Swal.fire({
                title: 'Eliminando',
                onOpen: ()=>{
                  Swal.showLoading()
                },
                allowOutsideClick: false,
                allowEscapeKey: false
              });
            }
          })
          .done((response)=>{
            if( response.status === 1 ){
              Swal.fire('Exito', response.msg, 'success');
              oTableUnits.ajax.reload();//recargamos la tabla
            }
            else{
              Swal.fire('Error', response.msg, 'error');
            }
          })
          .fail(()=> {
            Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
          });
          
        }

      });

    }

    else if( this.classList.contains('add') ){


      Swal.fire({
        icon: 'question',
        title: 'Agregar subunidad a la unidad '+ data.unidad +'?',
        html:
          '<input id="swal-input1" class="swal2-input" maxlength="150" placeholder="Ingresa el nombre de la nueva subunidad">' +
          '<input id="swal-input2" class="swal2-input" maxlength="150" placeholder="informacion adicional">',
        focusConfirm: false,
        showCancelButton: true,
        preConfirm: () => {
          return [
            document.getElementById('swal-input1').value,
            document.getElementById('swal-input2').value
          ]
        }
      }).then( r=>{

        if( r.value ){

          $.ajax({
            url: 'clientes/php/Clientes.php',
            type: 'POST',
            dataType: 'json',
            data: {
              method: 'addSubunit',
              unidad: data.idUnidad,
              cliente: data.cliente,
              nombre: r.value[0],
              info: r.value[1],
            },
            beforeSend: ()=>{
              Swal.fire({
                title: 'Guardando',
                onOpen: ()=>{
                  Swal.showLoading()
                },
                allowOutsideClick: false,
                allowEscapeKey: false
              });
            }
          })
          .done((response)=>{
            if( response.status === 1 ){
              Swal.fire('Exito', response.msg, 'success');
              // oTableUnits.ajax.reload();//recargamos la tabla
            }
            else{
              Swal.fire('Error', response.msg, 'error');
            }
          })
          .fail(()=> {
            Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
          });

        }

      } );


    }
    else if( this.classList.contains('view') ){

      unidadGlobal = data.idUnidad;
      $("#myModal").modal();

    }

  });

  
  var oTableSub = $("#tabla_sub").DataTable({
    order: [ [0, 'asc'] ],
    ajax: {
      url: "clientes/php/Clientes.php",
      type: 'POST',
      data: d=>{
        d.method = 'getSubunits';
        d.unidad = unidadGlobal;
      },
      dataSrc: ''
    },
    columns: [
      {data: 'subUnidad', defaultContent: ''},
      {data: 'info', defaultContent: ''},
      {data: 'fecha', defaultContent: ''},
      {data: null, defaultContent: `
        <button type="button" class="btn btn-xs btn-info edit"> <i class="fa fa-edit"></i> </button>
        <button type="button" class="btn btn-xs btn-danger del"> <i class="fa fa-times"></i> </button>
      `},
    ]

  });

  $('#myModal').on('shown.bs.modal', function(ev){

    oTableSub.ajax.reload();

  });


  //tabla de subunidades

  $('#tabla_sub').on('click', 'button', function(ev){

    let data = oTableSub.row( $(this).parents('tr').eq(0) ).data();
    console.log(data);

    if( this.classList.contains('edit') ){

      Swal.fire({
        icon: 'question',
        title: '¿Modificar la subunidad?',
        html:
          '<input id="swal-input1" class="swal2-input" value="'+data.subUnidad+'" maxlength="150" placeholder="Ingresa el nombre de la subunidad">' +
          '<input id="swal-input2" class="swal2-input" value="'+data.info+'" maxlength="150" placeholder="informacion adicional">',
        focusConfirm: false,
        showCancelButton: true,
        preConfirm: () => {
          return [
            document.getElementById('swal-input1').value,
            document.getElementById('swal-input2').value
          ]
        }
      }).then( r=>{

        if( r.value ){

          $.ajax({
            url: 'clientes/php/Clientes.php',
            type: 'POST',
            dataType: 'json',
            data: {
              method: 'editSubunit',
              id: data.idSUnidad,
              nombre: r.value[0],
              info: r.value[1],
            },
            beforeSend: ()=>{
              Swal.fire({
                title: 'Guardando',
                onOpen: ()=>{
                  Swal.showLoading()
                },
                allowOutsideClick: false,
                allowEscapeKey: false
              });
            }
          })
          .done((response)=>{
            if( response.status === 1 ){
              Swal.fire('Exito', response.msg, 'success');
              oTableSub.ajax.reload();//recargamos la tabla
            }
            else{
              Swal.fire('Error', response.msg, 'error');
            }
          })
          .fail(()=> {
            Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
          });

        }

      } );

    }
    else if( this.classList.contains('del') ){

      Swal.fire({
        title: 'Eliminar la SubUnitad',
        text: '¿Desea eliminar la subunidad ' + data.subUnidad + '?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {

        if (result.value) {

          $.ajax({
            url: 'clientes/php/Clientes.php',
            type: 'POST',
            dataType: 'json',
            data: {method: 'delSubunit', id: data.idSUnidad},
            beforeSend: ()=>{
              Swal.fire({
                title: 'Eliminando',
                onOpen: ()=>{
                  Swal.showLoading()
                },
                allowOutsideClick: false,
                allowEscapeKey: false
              });
            }
          })
          .done((response)=>{
            if( response.status === 1 ){
              Swal.fire('Exito', response.msg, 'success');
              oTableSub.ajax.reload();//recargamos la tabla
            }
            else{
              Swal.fire('Error', response.msg, 'error');
            }
          })
          .fail(()=> {
            Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
          });
          
        }

      });

    }

  });









  //parte principal del modulo, de la vista


  $$('#del').addEventListener('click', function(ev){

    Swal.fire({
      title: 'Eliminar el Cliente',
      text: '¿Desea eliminar al cliente <?= $nombre ?>?, si lo hace la informacion de las unidades y subunidades se perdera',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar'
    }).then((result) => {

      if (result.value) {

        $.ajax({
          url: 'clientes/php/Clientes.php',
          type: 'POST',
          dataType: 'json',
          data: {method: 'delCliente', id: '<?= $idCliente ?>' },
          beforeSend: ()=>{
            Swal.fire({
              title: 'Eliminando',
              onOpen: ()=>{
                Swal.showLoading()
              },
              allowOutsideClick: false,
              allowEscapeKey: false
            });
          }
        })
        .done((response)=>{
          if( response.status === 1 ){
            Swal.fire('Exito', response.msg, 'success').then( r=> { $("#contenedor").load('clientes/view/clientes.php') });
          }
          else{
            Swal.fire('Error', response.msg, 'error');
          }
        })
        .fail(()=> {
          Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
        });
        
      }

    });

  });

  var updateCliente = function(ev){
    
    if(ev) ev.preventDefault();

    let nombre = this.nombre.value.trim();
    let rfc = this.rfc.value.trim();

    if( nombre.length === 0 ){
      Swal.fire("Error", 'El nombre es requerido', 'warning');
      return;
    }
    if( rfc.length === 0 ){
      Swal.fire("Error", 'El RFC es requerido', 'warning');
      return;
    }

    Swal.fire({
      title: 'Modificar Cliente',
      text: '¿Desea modificar la información al cliente ' + nombre + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, modificar'
    }).then((result) => {

      if (result.value) {

        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'updateCliente'});
        data.push({name: 'id', value: '<?= $idCliente ?>'});

        $.ajax({
          url: 'clientes/php/Clientes.php',
          type: 'POST',
          dataType: 'json',
          data: data,
          beforeSend: ()=>{
            Swal.fire({
              title: 'Guardando',
              onOpen: ()=>{
                Swal.showLoading()
              },
              allowOutsideClick: false,
              allowEscapeKey: false
            });
          }
        })
        .done((response)=>{
          if( response.status === 1 ){
            Swal.fire('Exito', response.msg, 'success');
          }
          else{
            Swal.fire('Error', response.msg, 'error').then(r=>{
              $("#contenedor").load('clientes/view/clientes.php');
            });
          }
        })
        .fail(()=> {
          Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
        });
        
      }

    });



  }

  _.form_cliente.addEventListener('submit', updateCliente);


})();

</script>