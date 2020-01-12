<div class="row mt-20-px">
    
    <div class="col-xs-12">
        
        <div class="panel panel-default">
            <div class="panel-heading bg-coral text-white text-center">
              <h3 class="panel-title"> <i class="fa fa-usd"></i> Administración de Precios</h3>
            </div>
            <div class="panel-body">
                
                <ul class="nav nav-tabs" id="misTabs">

                  <li class="active"><a data-toggle="tab" href="#viewUsers">Consultar</a></li>
                  <li><a data-toggle="tab" href="#addUser">Registrar</a></li>
                
                </ul>


                <div class="tab-content">


                  <div id="viewUsers" class="tab-pane fade in active">
                    
                    <div class="row">
                      
                      <div class="col-xs-12">
                        
                        <h4>Listado de los clientes</h4>

                      </div>

                    </div>

                    <div class="row">
                      <div class="col-xs-12">
                        
                        <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#legend"> <i class="caret"></i> Nomenclaturas </button>

                        <div class="collapse fade text-right mt-1" id="legend">
                          <button type="button" class="btn btn-xs btn-primary"> <i class="fa fa-plus"></i> </button> Más info
                          <button type="button" class="btn btn-xs btn-primary"> <i class="fa fa-building"></i> </button> Agregar Unidad
                          <button type="button" class="btn btn-xs btn-primary"> <i class="fa fa-edit"></i> </button> Modificar
                          <button type="button" class="btn btn-xs btn-danger"> <i class="fa fa-times"></i> </button> Eliminar
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-xs-12">
                        
                        <div class="table-responsive">
                          
                          <table class="table table-bordered table-condensed" id="tabla_clientes">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Tel</th>
                                <th>RFC</th>
                                <th>Ciudad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody> </tbody>

                          </table>

                        </div>

                      </div>


                    </div>


                  </div>

                  <!-- Crear -->
                  <!-- Crear -->
                  <!-- Crear -->
                  <!-- Crear -->

                  <div id="addUser" class="tab-pane fade">

                    <div class="row">
                      <div class="col-xs-12">
                        <h4>Asignar Proveedor con Articulo para establecer precio</h4>
                      </div>
                    </div>


                    <form action="#" method="POST" name="form_cliente" id="form_cliente">
                    
                      <div class="row">
                        
                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Proveedor *</label>
                            <select name="proveedor" class="form-control" required >
                              <option value="">Seleccione un proveedor</option>
                            </select>
                          </div>

                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Articulo *</label>
                            <select name="articulo" class="form-control" required >
                              <option value="">Seleccione un proveedor</option>
                            </select>
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label>Precio *</label>
                            <input class="form-control" name="precio" type="number" required min="0.01" placeholder="Costo del articulo por parte del proveedor" />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Unidad de Medida</label>
                            <input class="form-control" name="unidad" value="" type="text" maxlength="50" placeholder="Unidad de Medida del articulo" readonly />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Presentación</label>
                            <input class="form-control" name="unidadA" value="" type="text" maxlength="50" placeholder="Presentación del articulo" readonly />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Cantidad de unidades en la presentación</label>
                            <input class="form-control" name="factor" value="" type="number" placeholder="Cantidad de unidades en la presentación" readonly />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                              <label data-texto="">Información adicional</label>
                              <input class="form-control" name="info" value="" type="text" placeholder="Más Info" maxlength="150">
                          </div>
                          
                        </div>
          
                      </div>

                      <div class="row">
                        
                        <div class="col-xs-12 text-center">
                          <button class="btn btn-primary" type="submit"> Asignar </button>
                        </div>

                      </div>

                    </form>
                    <!-- final del row -->
                    <!-- final del row -->
                    <!-- final del row -->


                  </div>
                  <!-- fianl del segundo tab -->
                  <!-- fianl del segundo tab -->
                  <!-- fianl del segundo tab -->

                </div>

            </div>
        </div>
    </div>


</div>


<script>
  
(function(){


  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.form_cliente;


  var insertPrecio = function(ev){
    
    if(ev) ev.preventDefault();

    let proveedor = this.proveedor.value.trim();
    let articulo = this.articulo.value.trim();
    let precio = this.precio.value.trim();

    if( proveedor.length === 0 ){
      Swal.fire("Error", 'El proveedor es requerido', 'warning');
      return;
    }
    if( articulo.length === 0 ){
      Swal.fire("Error", 'El articulo es requerido', 'warning');
      return;
    }
    if( precio.length === 0 ){
      Swal.fire("Error", 'El precio es requerido', 'warning');
      return;
    }

    Swal.fire({
      title: 'Asignar Precio',
      text: '¿Desea agregar el precio $' + precio + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, agregar'
    }).then((result) => {

      if (result.value) {

        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'addPrecio'});

        $.ajax({
          url: 'precios/php/Precios.php',
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
        }).done((response)=>{
          if( response.status === 1 ){
            oTable.ajax.reload();//recargamos la tabla
            Swal.fire('Exito', response.msg, 'success').then( r=>{
              this.reset();/////limpiamos el formulario
              // $('[href="#viewUsers"]').trigger('click');//simulamos click
            });
          }
          else{
            Swal.fire('Error', response.msg, 'error');
          }
        }).fail(()=> {
          Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
        });
        
      }

    });

  }

  form.addEventListener('submit', insertPrecio);


  var oTable = $("#tabla_clientes").DataTable({
    order: [ [0, 'asc'] ],
    ajax: {
      url: "clientes/php/Clientes.php",
      type: 'POST',
      data: d=>{
        d.method = 'getClientes';
      },
      dataSrc: ''
    },
    columns: [
      {data: 'nombre', defaultContent: ''},
      {data: 'direccion', defaultContent: ''},
      {data: 'telefono', defaultContent: ''},
      {data: 'rfc', defaultContent: ''},
      {data: 'ciudad', defaultContent: ''},
      {data: 'estado', defaultContent: ''},
      {data: null, defaultContent: `
        <button type="button" class="btn btn-xs btn-primary more ver"> <i class="fa fa-plus"></i> </button>
        <button type="button" class="btn btn-xs btn-primary more"> <i class="fa fa-building"></i> </button>
        <button type="button" class="btn btn-xs btn-primary more ver"> <i class="fa fa-edit"></i> </button>
        <button type="button" class="btn btn-xs btn-danger del"> <i class="fa fa-times"></i> </button>
      `},
    ]

  });


  $('#tabla_clientes').on('click', 'button', function(ev){

    let data = oTable.row( $(this).parents('tr').eq(0) ).data();
    console.log(data);

    if( this.classList.contains('more') ){


      data.ver = '';  
      if( this.classList.contains('ver') ){
        data.ver = 'in';  
      }

      $.post('clientes/view/detalles.php', data, function(data, textStatus, xhr) {
        $('#contenedor').html(data);
      });

    }
    else if( this.classList.contains('del') ){

      Swal.fire({
        title: 'Eliminar el Cliente',
        text: '¿Desea eliminar al cliente ' + data.nombre + '?, si lo hace la informacion de las unidades y subunidades se perdera',
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
            data: {method: 'delCliente', id: data.idCliente},
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
              oTable.ajax.reload();//recargamos la tabla
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



  let getProveedor = ()=>{

    Swal.fire({
      title: 'Cargando',
      onOpen: ()=>{
        Swal.showLoading()
      },
      allowOutsideClick: false,
      allowEscapeKey: false
    });

    $.ajax({
      url: 'proveedor/php/Proveedor.php',
      type: 'POST',
      dataType: 'json',
      data: {method: 'getProveedores'}
    })
    .done((response)=>{

    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

    $.ajax({
      url: 'proveedor/php/Proveedor.php',
      type: 'POST',
      dataType: 'json',
      data: {method: 'getProveedores'}
    })
    .done((response)=>{
      
    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });
    

  } 


})();
</script>