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
                <label> Seleccione la semana * </label>
                <div class="input-group date datepicker">
                  <input type="text" class="form-control" name="week" readonly placeholder="Seleccione la semana" />
                  <div class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </div>
                </div>
              </div>
                
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Fechas * </label>
                <input type="text" name="rango" class="form-control" placeholder="Rango de la semana" required readonly />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Costo Total del Menú </label>
                <input type="number" name="costo" class="form-control" placeholder="Costo por el Menú" required min="0" step="0.01" readonly />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Cliente *</label>
                <select name="cliente" class="form-control" required >
                  <option value="" selected>Seleccione un Cliente</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Unidad *</label>
                <select name="unidad" class="form-control" required >
                  <option value="" selected>Seleccione una unidad</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Subunidad *</label>
                <select name="subunidad" class="form-control" required >
                  <option value="" selected>Seleccione una Subunidad</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> No. de Tiempos *</label>
                <input type="number" name="tiempos" class="form-control" placeholder="Ingrese el numero de tiempos que tendra el menú" required min="1" max="15" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Grupo del Menú*</label>
                <select name="grupo" class="form-control" required >
                  <option value="" selected>Seleccione un grupo</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Elaboro * </label>
                <input type="text" name="elaboro" class="form-control" placeholder="Ingrese el nombre del responsable" required maxlength="150" />
              </div>
            </div>
          
          </div>

          <div class="row">
            <div class="col-xs-12">
              <p>Dias del Menú *</p>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="1">Lunes</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="2">Martes</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="3">Miercoles</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="4">Jueves</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="5">Viernes</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="6">Sabado</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="7">Domingo</label>
            </div>
          </div>

          <div class="row mt-1">
            
            <div class="col-xs-12 text-center">
              <button type="submit" class="btn btn-primary"> Crear Cuerpo del Menú </button>
            </div>

          </div>
        
        </form>

        <hr />


        <div class="row">
          
          <div class="col-xs-12">
            


          </div>

        </div>    
        
      </div>
    
    </div>
  

  </div>


</div>

<script src="menus/js/controlSelects.js"></script>
<script>
  
(function(){


  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.formBase;


  var insertMenu = function(ev){
    if(ev) ev.preventDefault();

    if( this.week.value === '' ){
      Swal.fire('Las Semana es requerida', '', 'info');
      return;
    }

    if( this.cliente.value === '' ){
      Swal.fire("Error", 'El Cliente es requerido', 'warning');
      return;
    }

    if( this.unidad.value === '' ){
      Swal.fire("Error", 'La unidad es requerida', 'warning');
      return;
    }

    if( this.subunidad.value === '' ){
      Swal.fire("Error", 'La subunidad es requerida', 'warning');
      return;
    }

    let tiempos = this.tiempos.valueAsNumber;
    console.log(tiempos);
    if( tiempos < 1 || tiempos > 15 ){
      Swal.fire("Error", 'El tiempo es requerido y debe estar entre 1 y 15', 'warning');
      return;
    }

    if( this.grupo.value === '' ){
      Swal.fire("Error", 'El grupo es requerido', 'warning');
      return;
    }

    //seleccionar por lo menos un check box de dias
    if( this.querySelector('[name="dias[]"]:checked') === null ){
      Swal.fire("Error", 'Debe seleccionar al menos un dia para crear el menu', 'warning');
      return;
    }

    Swal.fire('Todo correcto')

  }

  form.addEventListener('submit', insertMenu);


})();



</script>