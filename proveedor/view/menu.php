<div class="row mt-20-px">
    
  <div class="col-xs-12">
      
    <div class="panel panel-default">

      <div class="panel-heading bg-coral text-white text-center">
        <h3 class="panel-title"> <i class="fa fa-truck"></i> Administración de Proveedores </h3>
      </div>
      
      <div class="panel-body">
      
        <div class="row mb-1">

          <div class="col-xs-12">
            <button class="btn btn-info" data-toggle="collapse" data-target="#formBase"> <span class="caret"></span> Añadir Proveedor</button>
          </div>
        
        </div>

        <!-- un formulario para añadir nuevas bases -->
        <form action="POST" name="formBase" id="formBase" class="collapse">
          
          <div class="row">
              
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * Nombre o razón
                  </label>
                  <input id="nombre" class="form-control" name="nombre" value="" type="text" required maxlength="100" title="Ingrese el nombre de la empresa" placeholder="La Empresa INVENTADA S.A de CV">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * Tipo de proveedor
                  </label>
                  <select class="form-control" name="tipo" required >
                      <option selected value="">Seleccione un tipo</option>
                      <option>Mayoreo</option>
                      <option>Menudeo</option>
                      <option>Otro</option>
                  </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * RFC
                  </label>
                  <input class="form-control" name="rfc" value="" type="text" required maxlength="13" minlength="12" placeholder="Ejemplo: ABC123456A7C" title="Ingrese el R.F.C del proveedor">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * Tipo de pago
                  </label>
                  <select class="form-control" name="pago" required>
                      <option selected value="">Seleccione un tipo de pago</option>
                      <option>Contado con cheque</option>
                      <option>Crédito</option>
                      <option>Efectivo</option>
                      <option>Operación</option>
                      <option>Unidades</option>
                  </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Dirección
                  </label>
                  <input class="form-control" name="direccion" value="" type="text" maxlength="150" title="Calle num., colonia" placeholder="Ejemplo: Calle nombre de la calle #777, col. nombre de la colonia">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Teléfono
                  </label>
                  <input class="form-control" name="telefono" value="" type="tel" maxlength="14" title="Ingrese el número de teléfono del proveedor" placeholder="Formato: (xxx) xxx-xxxx" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 46 || event.keyCode === 13 || event.keyCode === 173 || event.keyCode === 57 || event.keyCode === 48  ? true : !isNaN(Number(event.key))">
              </div>
            </div>
        
        
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Nombre del contacto
                  </label>
                  <input class="form-control" name="contacto" value="" type="text" maxlength="150" placeholder="Ejemplo: Juan Paco Pedro De La Mar">
              </div>
            </div>
            
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Correo electrónico
                  </label>
                  <input class="form-control" name="correo" value="" type="email" maxlength="80" title="Usted puede ingresar números, letras y guión bajo" placeholder="Ejemplo: ejemplo@mail.com" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Estado
                  </label>
                  <input class="form-control" name="estado" value="" type="text" maxlength="50" placeholder="Ejemplo: Nombre de Estado" >
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Ciudad
                  </label>
                  <input class="form-control" name="ciudad" value="" type="text" maxlength="50" placeholder="Ejemplo: Nombre de Ciudad" title="Ingrese únicamente letras" >
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Código postal
                  </label>
                  <input class="form-control" name="cp" value="" type="text" maxlength="5" title="Ingrese únicamente cinco digitos" placeholder="Ejemplo: 12345" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 13 ? true : !isNaN(Number(event.key))">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Información adicional
                  </label>
                  <input class="form-control" name="info" value="" type="text" maxlength="150" >
              </div>
            </div>

          </div>

          <!--  -->
          <!--  -->
          <!--  -->
          <!--  -->
          
          <div class="row">

            <div class="col-xs-12 text-center">
              <button type="submit" class="btn btn-primary"> Guardar Proveedor </button>
            </div>
          
          </div>
        
        </form>

        <hr />
        
        <h4 class="text-muted">Lista de Proveedores</h4>


        <div class="table-responsive">
            
          <table class="table table-condensed table-bordered" id="tabla_base">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>RFC</th>
                <th>Pago</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Creado</th>
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
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Proveedor</h4>
      </div>
      <div class="modal-body">
        
        <form action="POST" name="formUpdate" id="formUpdate">

          <input type="hidden" name="idProveedor" value="">
          
          <div class="row">
              
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * Nombre o razón
                  </label>
                  <input class="form-control" name="nombre" value="" type="text" required maxlength="100" title="Ingrese el nombre de la empresa" placeholder="La Empresa INVENTADA S.A de CV">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * Tipo de proveedor
                  </label>
                  <select class="form-control" name="tipo" required >
                      <option selected value="">Seleccione un tipo</option>
                      <option>Mayoreo</option>
                      <option>Menudeo</option>
                      <option>Otro</option>
                  </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * RFC
                  </label>
                  <input class="form-control" name="rfc" value="" type="text" required maxlength="13" minlength="12" placeholder="Ejemplo: ABC123456A7C" title="Ingrese el R.F.C del proveedor">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    * Tipo de pago
                  </label>
                  <select class="form-control" name="pago" required>
                      <option selected value="">Seleccione un tipo de pago</option>
                      <option>Contado con cheque</option>
                      <option>Crédito</option>
                      <option>Efectivo</option>
                      <option>Operación</option>
                      <option>Unidades</option>
                  </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Dirección
                  </label>
                  <input class="form-control" name="direccion" value="" type="text" maxlength="150" title="Calle num., colonia" placeholder="Ejemplo: Calle nombre de la calle #777, col. nombre de la colonia">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Teléfono
                  </label>
                  <input class="form-control" name="telefono" value="" type="tel" maxlength="14" title="Ingrese el número de teléfono del proveedor" placeholder="Formato: (xxx) xxx-xxxx" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 46 || event.keyCode === 13 || event.keyCode === 173 || event.keyCode === 57 || event.keyCode === 48  ? true : !isNaN(Number(event.key))">
              </div>
            </div>
        
        
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Nombre del contacto
                  </label>
                  <input class="form-control" name="contacto" value="" type="text" maxlength="150" placeholder="Ejemplo: Juan Paco Pedro De La Mar">
              </div>
            </div>
            
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Correo electrónico
                  </label>
                  <input class="form-control" name="correo" value="" type="email" maxlength="80" title="Usted puede ingresar números, letras y guión bajo" placeholder="Ejemplo: ejemplo@mail.com" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Estado
                  </label>
                  <input class="form-control" name="estado" value="" type="text" maxlength="50" placeholder="Ejemplo: Nombre de Estado" >
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Ciudad
                  </label>
                  <input class="form-control" name="ciudad" value="" type="text" maxlength="50" placeholder="Ejemplo: Nombre de Ciudad" title="Ingrese únicamente letras" >
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Código postal
                  </label>
                  <input class="form-control" name="cp" value="" type="text" maxlength="5" title="Ingrese únicamente cinco digitos" placeholder="Ejemplo: 12345" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 13 ? true : !isNaN(Number(event.key))">
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                  <label data-texto="">
                    Información adicional
                  </label>
                  <input class="form-control" name="info" value="" type="text" maxlength="150" >
              </div>
            </div>

          </div>

          <!--  -->
          <!--  -->
          <!--  -->
          <!--  -->
          
          <div class="row">

            <div class="col-xs-12 text-center">
              <button type="submit" class="btn btn-primary"> Modificar Proveedor </button>
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

  var form = _.formBase;

  var insertProveedor = function(ev){
    if(ev) ev.preventDefault();

    let nombre = this.nombre.value.trim();
    let tipo = this.tipo.value.trim();
    let rfc = this.rfc.value.trim();
    let pago = this.pago.value.trim();

    if( nombre.length === 0 ){
      Swal.fire("Error", 'El nombre para el proveedor es requerido', 'warning');
      return;
    }

    if( tipo.length === 0 ){
      Swal.fire("Error", 'El tipo para el proveedor es requerido', 'warning');
      return;
    }

    if( rfc.length === 0 ){
      Swal.fire("Error", 'El rfc para el proveedor es requerido', 'warning');
      return;
    }

    if( pago.length === 0 ){
      Swal.fire("Error", 'El pago para el proveedor es requerido', 'warning');
      return;
    }

    Swal.fire({
      title: 'Agregar Proveedor',
      text: '¿Desea agregar el proveedor ' + nombre + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, agregar'
    }).then((result) => {

      if (result.value) {
        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'addProveedor'});

        $.ajax({
          url: 'proveedor/php/Proveedor.php',
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
            oTable.ajax.reload();//recargamos la tabla
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

  form.addEventListener('submit', insertProveedor);


  var oTable = $("#tabla_base").DataTable({
    order: [ [0, 'asc'] ],
    ajax: {
      url: "proveedor/php/Proveedor.php",
      type: 'POST',
      data: d=>{
        d.method = 'getProveedores';
      },
      dataSrc: ''
    },
    columns: [
      {data: 'nombre', defaultContent: ''},
      {data: 'tipo', defaultContent: ''},
      {data: 'rfc', defaultContent: ''},
      {data: 'pago', defaultContent: ''},
      {data: 'ciudad', defaultContent: ''},
      {data: 'estado', defaultContent: ''},
      {data: 'fecha', defaultContent: ''},
      {data: null, defaultContent: `
        <button type="button" class="btn btn-info btn-xs edit" title="Modificar"> <i class="fa fa-edit"></i> </button>
        <button type="button" class="btn btn-danger btn-xs del" title="eliminar"> <i class="fa fa-times"></i> </button>
      `},
    ]

  });


  var formUpdate = _.formUpdate;



  var updateProv = function(ev){
    if(ev) ev.preventDefault();

    let nombre = this.nombre.value.trim();
    let tipo = this.tipo.value.trim();
    let rfc = this.rfc.value.trim();
    let pago = this.pago.value.trim();

    if( nombre.length === 0 ){
      Swal.fire("Error", 'El nombre para el proveedor es requerido', 'warning');
      return;
    }

    if( tipo.length === 0 ){
      Swal.fire("Error", 'El tipo para el proveedor es requerido', 'warning');
      return;
    }

    if( rfc.length === 0 ){
      Swal.fire("Error", 'El rfc para el proveedor es requerido', 'warning');
      return;
    }

    if( pago.length === 0 ){
      Swal.fire("Error", 'El pago para el proveedor es requerido', 'warning');
      return;
    }

    Swal.fire({
      title: 'Modificar Proveedor',
      text: '¿Desea modificar los datos del proveedor ' + nombre + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, modificar'
    }).then((result) => {

      if (result.value) {
        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'editProveedor'});

        $.ajax({
          url: 'proveedor/php/Proveedor.php',
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
            $('#myModal').modal('hide');
            oTable.ajax.reload();//recargamos la tabla
            this.reset();//limpiamos el formukario
            Swal.fire('Exito', response.msg, 'success');
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

  formUpdate.addEventListener('submit', updateProv);


  $("#tabla_base").on('click', 'button', function(ev){

    let data = oTable.row( $(this).parents('tr').eq(0) ).data();

    console.log(data);

    if( this.classList.contains('edit') ){

      // "{"idProveedor":"4","nombre":"BIMBO","pago":"Contado con cheque","tipo":"Mayoreo","direccion":"","telefono":"","rfc":"AAAAAAAAAAAAA","correo":"","contacto":"","ciudad":"","estado":"","info":"","cp":"","fecha":"2020-01-09 20:20:41","activo":"1"}"
      
      formUpdate.reset();

      formUpdate.idProveedor.value = data.idProveedor;
      formUpdate.nombre.value = data.nombre;
      formUpdate.pago.value = data.pago;
      formUpdate.tipo.value = data.tipo;
      formUpdate.direccion.value = data.direccion;
      formUpdate.telefono.value = data.telefono;
      formUpdate.rfc.value = data.rfc;
      formUpdate.correo.value = data.correo;
      formUpdate.contacto.value = data.contacto;
      formUpdate.ciudad.value = data.ciudad;
      formUpdate.estado.value = data.estado;
      formUpdate.info.value = data.info;
      formUpdate.cp.value = data.cp;

      $('#myModal').modal();

    }
    else if( this.classList.contains('del') ){

      Swal.fire({
        title: 'Eliminar el Proveedor',
        text: '¿Desea eliminar el proveedor ' + data.nombre + '?. Si lo elimina los precios del proveedor tambien seran eliminados, asegurese que el proveedor no sea mas utilizado en el sistema',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {

        if (result.value) {

          $.ajax({
            url: 'proveedor/php/Proveedor.php',
            type: 'POST',
            dataType: 'json',
            data: {method: 'delProveedor', id: data.idProveedor},
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