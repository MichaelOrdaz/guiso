<div class="row mt-20-px">
    
    <div class="col-xs-12">
        
        <div class="panel panel-default">
            <div class="panel-heading bg-coral text-white text-center">
              <h3 class="panel-title"> <i class="fa fa-glass"></i> Administración de Articulos</h3>
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
                        
                        <h4>Listado de Articulos</h4>

                      </div>

                    </div>

                    <div class="row">
                      <div class="col-xs-12">
                        
                        <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#legend">  Nomenclaturas <span class="caret"></span> </button>

                        <div class="collapse fade text-right mt-1" id="legend">
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
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>linea</th>
                                <th>Unidad</th>
                                <th><abbr title="Presentación"> Present. </abbr> </th>
                                <th><abbr title="Unidades en la Presentación"> U en P</abbr></th>
                                <th><abbr title="Minimo">Min</abbr></th>
                                <th><abbr title="Miximo">Max</abbr></th>
                                <th>Costo</th>
                                <th><abbr title="Fecha Modificado">F. de M.</abbr></th>
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
                        <h4>Registrar nuevo Articulo</h4>
                      </div>
                    </div>


                    <form action="#" method="POST" name="form_cliente" id="form_cliente">
                    
                      <div class="row">
                        
                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Nombre del artículo *</label>
                            <input class="form-control" name="nombre" type="text" required maxlength="300" placeholder="Ingrese el nombre del artículo" pattern="^[\wÁÉÍÓÚáéíóúÑñ\s\.\/]+$" title="No se aceptan caracteres especiales" />
                          </div>

                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Linea *</label>
                            <select name="linea" class="form-control" required >
                              <option value="" selected>Seleccione una linea</option>
                            </select>
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label>Unidad de Medida *</label>
                            <select class="form-control" name="unidad" required >
                              <option selected value=''>Seleccione una unidad</option>
                              <option value="KILOGRAMOS">KILOGRAMOS</option>
                              <option value="LITROS">LITROS</option>
                              <option value="PIEZAS">PIEZAS</option>
                              <option value="METROS">METROS</option>
                              <option value="BULTOS">BULTOS</option>
                              <option value="PAQUETES">PAQUETES</option>
                              <option value="CAJA">CAJA</option>
                              <option value="OTROS">OTROS</option>
                            </select>
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Presentación del artículo</label>
                            <select class="form-control" name="presentacion" >
                              <option selected value=''>Seleccione una presentación</option>
                              <option value="KILOGRAMOS">KILOGRAMOS</option>
                              <option value="LITROS">LITROS</option>
                              <option value="PIEZAS">PIEZAS</option>
                              <option value="METROS">METROS</option>
                              <option value="BULTOS">BULTOS</option>
                              <option value="PAQUETES">PAQUETES</option>
                              <option value="CAJA">CAJA</option>
                              <option value="OTROS">OTROS</option>
                            </select>
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Cantidad de unidades en la presentación</label>
                            <input class="form-control" name="factor" value="" min="0.001" step="any" type="number" placeholder="Cantidad de unidades en la presentación" readonly required />
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Cantidad minima</label>
                            <input class="form-control" name="minimo" value="" type="number" title="Ingrese minimo" min="0" step="any" placeholder="cantidad minima" >
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                            <label>Cantidad maxima</label>
                            <input class="form-control" name="maximo" value="" type="number" min="0" step="any" title="Ingrese minimo" placeholder="cantidad minima" >
                          </div>
                          
                        </div>

                        <div class="col-md-4 col-sm-6">
                          
                          <div class="form-group">
                              <label data-texto="">Información adicional</label>
                              <input class="form-control" name="info" value="" type="text" placeholder="Más Info" maxlength="150" pattern="^[\wÁÉÍÓÚáéíóúÑñ\s\.]+$" title="No escribir caracteres especiales">
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


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar Artículo</h4>
      </div>
      <div class="modal-body">
        
        <form action="#" method="POST" name="formUpdate" id="formUpdate">
                    
          <!-- <input type="hidden" name="idArticulo"> -->

          <div class="row">
            
            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Clave del Artículo</label>
                <input class="form-control" name="idArticulo" type="text" readonly maxlength="300" placeholder="Ingrese el nombre del artículo" pattern="^[\w]+$" title="No se aceptan caracteres especiales" />
              </div>

            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Nombre del artículo *</label>
                <input class="form-control" name="nombre" type="text" required maxlength="300" placeholder="Ingrese el nombre del artículo" pattern="^[\wÁÉÍÓÚáéíóúÑñ\s\.\/]+$" title="No se aceptan caracteres especiales" />
              </div>

            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Linea *</label>
                <select name="linea" class="form-control" required >
                  <option value="" selected>Seleccione una linea</option>
                </select>
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Unidad de Medida *</label>
                <select class="form-control" name="unidad" required >
                  <option selected value=''>Seleccione una unidad</option>
                  <option value="KILOGRAMOS">KILOGRAMOS</option>
                  <option value="LITROS">LITROS</option>
                  <option value="PIEZAS">PIEZAS</option>
                  <option value="METROS">METROS</option>
                  <option value="BULTOS">BULTOS</option>
                  <option value="PAQUETES">PAQUETES</option>
                  <option value="CAJA">CAJA</option>
                  <option value="OTROS">OTROS</option>
                </select>
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Presentación del artículo</label>
                <select class="form-control" name="presentacion" >
                  <option selected value=''>Seleccione una presentación</option>
                  <option value="KILOGRAMOS">KILOGRAMOS</option>
                  <option value="LITROS">LITROS</option>
                  <option value="PIEZAS">PIEZAS</option>
                  <option value="METROS">METROS</option>
                  <option value="BULTOS">BULTOS</option>
                  <option value="PAQUETES">PAQUETES</option>
                  <option value="CAJA">CAJA</option>
                  <option value="OTROS">OTROS</option>
                </select>
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Cantidad de unidades en la presentación</label>
                <input class="form-control" name="factor" value="" min="0.001" step="any" type="number" placeholder="Cantidad de unidades en la presentación" readonly required />
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Cantidad minima</label>
                <input class="form-control" name="minimo" value="" type="number" title="Ingrese minimo" min="0" step="any" placeholder="cantidad minima" >
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                <label>Cantidad maxima</label>
                <input class="form-control" name="maximo" value="" type="number" min="0" step="any" title="Ingrese minimo" placeholder="cantidad minima" >
              </div>
              
            </div>

            <div class="col-md-4 col-sm-6">
              
              <div class="form-group">
                  <label data-texto="">Información adicional</label>
                  <input class="form-control" name="info" value="" type="text" placeholder="Más Info" maxlength="150" pattern="^[\wÁÉÍÓÚáéíóúÑñ\s\.]+$" title="No escribir caracteres especiales">
              </div>
              
            </div>

          </div>

          <div class="row">
            
            <div class="col-xs-12 text-center">
              <button class="btn btn-primary" type="submit"> Modificar </button>
            </div>

          </div>

        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
  
(function(){


  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.form_cliente;
  var formUpdate = _.formUpdate;


  var insertArticle = function(ev){
    
    if(ev) ev.preventDefault();

    let nombre = this.nombre.value.trim();
    let unidad = this.unidad.value.trim();
    let linea = this.linea.value.trim();

    if( nombre.length === 0 ){
      Swal.fire("Error", 'El nombre es requerido', 'warning');
      return;
    }
    if( linea.length === 0 ){
      Swal.fire("Error", 'La linea es requerida', 'warning');
      return;
    }
    if( unidad.length === 0 ){
      Swal.fire("Error", 'La unidad es requerida', 'warning');
      return;
    }

    Swal.fire({
      title: 'Añadir Articulo',
      text: '¿Desea agregar el articulo ' + nombre + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, agregar'
    }).then((result) => {

      if (result.value) {

        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'addArticle'});

        $.ajax({
          url: 'articulos/php/Article.php',
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

  form.addEventListener('submit', insertArticle);


  var updateArticle = function(ev){
    
    if(ev) ev.preventDefault();

    let nombre = this.nombre.value.trim();
    let unidad = this.unidad.value.trim();
    let linea = this.linea.value.trim();

    if( nombre.length === 0 ){
      Swal.fire("Error", 'El nombre es requerido', 'warning');
      return;
    }
    if( linea.length === 0 ){
      Swal.fire("Error", 'La linea es requerida', 'warning');
      return;
    }
    if( unidad.length === 0 ){
      Swal.fire("Error", 'La unidad es requerida', 'warning');
      return;
    }

    Swal.fire({
      title: 'Modificar Articulo',
      text: '¿Desea modificar el articulo ' + nombre + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, agregar'
    }).then((result) => {

      if (result.value) {

        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'updateArticle'});

        $.ajax({
          url: 'articulos/php/Article.php',
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
              oTable.ajax.reload();
              $('#myModal').modal('hide');
              // $('[href="#viewUsers"]').trigger('click');//simulamos click
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

  formUpdate.addEventListener('submit', updateArticle);


  var oTable = $("#tabla_clientes").DataTable({
    order: [ [1, 'asc'] ],
    "processing": true,
    "serverSide": true,
    ajax: {
      url: "articulos/php/Article.php",
      type: 'POST',
      data: d=>{
        d.method = 'getArticulos';
      },
      // dataSrc: ''
    },
    columns: [
      {data: 'idArticulo', defaultContent: ''},
      {data: 'nombre', defaultContent: ''},
      {data: 'descripcion', defaultContent: ''},
      {data: 'unidad', defaultContent: ''},
      {data: 'unidadA', defaultContent: ''},
      {data: 'factor', defaultContent: ''},
      {data: 'minimo', defaultContent: ''},
      {data: 'maximo', defaultContent: ''},
      {
        data: 'costo',
        render: $.fn.dataTable.render.number( ',', '.', 2, '$' ), 
        defaultContent: ''
      },
      {
        data: 'fechaMod', 
        defaultContent: '',
        render: ( data, type, row, meta ) => moment(data).format('DD-MMM-YYYY')
      },
      {
        data: null, 
        defaultContent: `
          <button type="button" class="btn btn-xs btn-primary edit" data-toggle="tooltip" title="Editar"> <i class="fa fa-edit"></i> </button>
          <button type="button" class="btn btn-xs btn-danger del" data-toggle="tooltip" title="Eliminar"> <i class="fa fa-times"></i> </button>
        `,
        orderable: false
      },
    ]

  });


  $('#tabla_clientes').on('click', 'button', function(ev){

    let data = oTable.row( $(this).parents('tr').eq(0) ).data();
    console.log(data);

    if( this.classList.contains('edit') ){

      //editar
      formUpdate.idArticulo.value = data.idArticulo;
      formUpdate.nombre.value = data.nombre;
      formUpdate.linea.value = data.linea;
      formUpdate.unidad.value = data.unidad;
      formUpdate.presentacion.value = data.unidadA;
      formUpdate.factor.value = data.factor;
      formUpdate.minimo.value = data.minimo;
      formUpdate.maximo.value = data.maximo;
      formUpdate.info.value = data.info;
      $('#myModal').modal();

    }
    else if( this.classList.contains('del') ){

      Swal.fire({
        title: 'Eliminar el Articulo',
        text: '¿Desea eliminar al articulo ' + data.nombre + '? Si lo elimina este desaparecera de todas las recetas a las que este presente',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {

        if (result.value) {

          $.ajax({
            url: 'articulos/php/Article.php',
            type: 'POST',
            dataType: 'json',
            data: {method: 'delCliente', id: data.idArticulo},
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


  var getLineas = ()=>{
    //obtener las lineas
    $.post('lineas/php/Lineas.php', {method: 'getBases'}, function(data, textStatus, xhr) {
      // console.log(data);
      var doc = _.createDocumentFragment();

      for( let item of data ){
        let option = _.createElement('option');
        option.value = item.idLinea;
        option.textContent = item.descripcion;
        doc.appendChild(option);
      }
      let doc2 = doc.cloneNode(true);
      form.linea.appendChild(doc);
      formUpdate.linea.appendChild(doc2);
      
    }, 'json');
  }

  getLineas();


  //si cambie el input de presentacion, quiere decir que si hay valor entonces habilitamos el campo de cantidad
  let changePresentacion =  function(ev){

    let value = this.value;
    // console.log(value);
    if( value !== '' ){
      this.form.factor.removeAttribute('readonly');
    }
    else{
      this.form.factor.setAttribute('readonly', 'readonly');
      this.form.factor.value = '';
    }

  }

  form.presentacion.addEventListener('change', changePresentacion);
  formUpdate.presentacion.addEventListener('change', changePresentacion);

})();
</script>