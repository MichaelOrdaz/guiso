<div class="row mt-20-px">
    
    <div class="col-xs-12">
        
        <div class="panel panel-default">
            <div class="panel-heading bg-coral text-white text-center">
              <h3 class="panel-title"> <i class="fa fa-users"></i> Administración de Clientes</h3>
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
                        <h4>Registra nuevo cliente</h4>
                      </div>
                    </div>


                    <form action="#" method="POST" name="form_cliente" id="form_cliente">
                    
                      <div class="row">
                        
                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Nombre del cliente *</label>
                            <input class="form-control" name="nombre" type="text" required maxlength="150" title="Ingrese el nombre del cliente" placeholder="Ingrese el nombre del cliente" />
                          </div>

                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Dirección</label>
                            <input class="form-control" name="direccion" type="text" maxlength="150" title="Ingrese la dirección del cliente" placeholder="Ejemplo: Calle nombre de la calle #777, col. nombre de la colonia" />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label>R.F.C. del cliente *</label>
                            <input class="form-control" name="rfc" type="text" required minlength="12" maxlength="13" placeholder="Ejemplo: ABC123456ABC" title="Ingrese el R.F.C del cliente" />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Teléfono</label>
                            <input class="form-control" name="telefono" value="" type="tel" maxlength="20" title="Ingrese el número de teléfono del cliente" placeholder="Telefono" >
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Nombre del contacto</label>
                            <input class="form-control" name="contacto" value="" type="text" maxlength="32" placeholder="nombre del contacto">
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Plazo</label>
                            <input class="form-control" name="plazo" value="" type="number" title="Ingrese como máximo dos digitos" placeholder="Plazo" >
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Crédito</label>
                            <input class="form-control" name="credito" value="" type="number" title="Ingrese como máximo dos digitos" placeholder="Credito al cliente">
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Correo</label>
                            <input class="form-control" name="correo" value="" type="email" maxlength="60" placeholder="Ejemplo: ejemplo@mail.com">
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label data-texto="">Estado</label>
                            <input class="form-control" name="estado" value="" type="text" maxlength="50" placeholder="Ejemplo: Nombre de Estado" />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label data-texto="">Ciudad</label>
                            <input class="form-control" name="ciudad" value="" type="text" maxlength="80" placeholder="Ejemplo: Nombre de Ciudad" title="Ingrese únicamente letras" >
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label data-texto="">Código postal</label>
                            <input class="form-control" name="cp" value="" type="number" maxlength="5" minlength="5" title="Ingrese únicamente cinco digitos" placeholder="Ejemplo: 12345">
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
                          <button class="btn btn-primary" type="submit"> Agregar </button>
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


  var insertClient = function(ev){
    
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
      title: 'Registrar Cliente',
      text: '¿Desea agregar al cliente ' + nombre + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, agregar'
    }).then((result) => {

      if (result.value) {

        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'addCliente'});

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
            
            oTable.ajax.reload();//recargamos la tabla
            Swal.fire('Exito', response.msg, 'success').then( r=>{
              this.reset();//limpiamos el formukario
              $('[href="#viewUsers"]').trigger('click');//simulamos click
            });
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

  form.addEventListener('submit', insertClient);


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


})();
</script>