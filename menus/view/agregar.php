<div class="row mt-20-px">
    
  <div class="col-xs-12">
      
    <div class="panel panel-default">

      <div class="panel-heading bg-coral text-white text-center">
        <h3 class="panel-title"> <i class="fa fa-cutlery"></i> Agregar Menu </h3>
      </div>
      
      <div class="panel-body">
      
        <!-- un formulario para añadir nuevas bases -->
        <form action="POST" name="formBase" id="formBase">
          
          <div class="row">

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Seleccione la semana </label>
                <div class="input-group datepicker">
                  <input type="text" class="form-control" name="week" readonly placeholder="Seleccione la semana" />
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
              </div>
                
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label for="nombre"> Nombre del Grupo </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del grupo" required maxlength="150" />
              </div>
            </div>
          
          </div>

          <div class="row">
            
            <div class="col-sm-4 text-center">
              <button type="submit" class="btn btn-primary"> Guardar Grupo </button>
            </div>

          </div>
        
        </form>

        <hr />
        
        <h4 class="text-muted">Lista de Grupos</h4>


        <div class="table-responsive">
            
          <table class="table table-condensed table-bordered" id="tabla_base">
            <thead>
              <tr>
                <th>Nombre</th>
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

<script>
  
(function(){


  $('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    language: 'es',
    autoclose: true,
    // endDate: '0d',
  });

  // form_fechas.addEventListener('submit', function(ev){
  //   if( this.start.value === '' || this.end.value === '' ){
  //     ev.preventDefault();
  //     Swal.fire('Las Fechas son requeridas', '', 'info');
  //   }
  // });

  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.formBase;

  var insertBase = function(ev){
    if(ev) ev.preventDefault();

    let value = this.nombre.value.trim();

    if( value.length === 0 ){
      Swal.fire("Error", 'El nombre para el grupo es requerido', 'warning');
      return;
    }

    Swal.fire({
      title: 'Agregar Grupo',
      text: '¿Desea agregar el grupo ' + value + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, agregar'
    }).then((result) => {

      if (result.value) {
        let data = $(this).serializeArray();
        data.push({name: 'method', value: 'addBase'});

        $.ajax({
          url: 'grupos/php/Grupos.php',
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

  form.addEventListener('submit', insertBase);


  var oTable = $("#tabla_base").DataTable({
    order: [ [0, 'asc'] ],
    ajax: {
      url: "grupos/php/Grupos.php",
      type: 'POST',
      data: d=>{
        d.method = 'getBases';
      },
      dataSrc: ''
    },
    columns: [
      {data: 'descripcion', defaultContent: ''},
      {data: 'fecha', defaultContent: ''},
      {data: null, defaultContent: `
        <button type="button" class="btn btn-info btn-xs edit" title="Modificar"> <i class="fa fa-edit"></i> </button>
        <button type="button" class="btn btn-danger btn-xs del" title="eliminar"> <i class="fa fa-times"></i> </button>
      `},
    ]

  });


  $("#tabla_base").on('click', 'button', function(ev){

    let data = oTable.row( $(this).parents('tr').eq(0) ).data();
    console.log(data);

    if( this.classList.contains('edit') ){

      Swal.fire({
        title: 'Modificar Grupo',
        text: 'ingrese el nombre del grupo',
        input: 'text',
        inputValue: data.descripcion,
        showCancelButton: true,
        inputAttributes: {
          maxlength: 150,
        },
        inputPlaceholder: 'Nuevo nombre del grupo',
        inputValidator: (value) => {
          if (!value) {
            return 'El nombre no puede estar vacio'
          }
        }
      }).then( r=>{

        if(r.value){

          $.ajax({
            url: 'grupos/php/Grupos.php',
            type: 'POST',
            dataType: 'json',
            data: {
              method: 'editBase',
              nombre: r.value,
              id: data.idGrupo
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

      } );


    }
    else if( this.classList.contains('del') ){

      Swal.fire({
        title: 'Eliminar el grupo',
        text: '¿Desea eliminar el grupo ' + data.descripcion + '?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {

        if (result.value) {

          $.ajax({
            url: 'grupos/php/Grupos.php',
            type: 'POST',
            dataType: 'json',
            data: {method: 'delBase', id: data.idGrupo},
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