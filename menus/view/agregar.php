<div class="row mt-20-px">
    
  <div class="col-xs-12">
      
    <div class="panel panel-default">

      <div class="panel-heading bg-coral text-white text-center">
        <h3 class="panel-title"> <i class="fa fa-cutlery"></i> Agregar Menu </h3>
      </div>
      
      <div class="panel-body">
      
        <!-- un formulario para añadir nuevas bases -->
        <form action="POST" name="formBase" id="formBase">
        <fieldset>

          <div class="row">

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Seleccione la semana * </label>
                <div class="input-group date datepicker">
                  <input type="text" class="form-control input-sm" name="semana" readonly placeholder="Seleccione la semana" />
                  <div class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </div>
                </div>
              </div>
                
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Fechas * </label>
                <input type="text" name="rango" class="form-control input-sm" placeholder="Rango de la semana" required readonly />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Costo Total del Menú </label>
                <input type="number" name="costo" class="form-control input-sm" placeholder="Costo por el Menú" required min="0" step="0.01" readonly />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Cliente *</label>
                <select name="cliente" class="form-control input-sm" required >
                  <option value="" selected>Seleccione un Cliente</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Unidad *</label>
                <select name="unidad" class="form-control input-sm" required >
                  <option value="" selected>Seleccione una unidad</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Subunidad *</label>
                <select name="subunidad" class="form-control input-sm" required >
                  <option value="" selected>Seleccione una Subunidad</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> No. de Tiempos *</label>
                <input type="number" name="tiempos" class="form-control input-sm" placeholder="Ingrese el numero de tiempos que tendra el menú" required min="1" max="15" />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Grupo del Menú*</label>
                <select name="grupo" class="form-control input-sm" required >
                  <option value="" selected>Seleccione un grupo</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Elaboro * </label>
                <input type="text" name="elaboro" class="form-control input-sm" placeholder="Ingrese el nombre del responsable" required maxlength="150" />
              </div>
            </div>
          
          </div>

          <div class="row">
            <div class="col-xs-12">
              <p>
                Dias del Menú *
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="optradio" value="T">Todos</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="N">Ninguno</label>
                
              </p>
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


        </fieldset>
        </form>

        <hr />
  
        <!-- 
          debo tener una tipo tabla con maximo 8 columnas y maximo 15 filas
          las columnas van dadas por el numero de dias que se seleccionen 
          y las filas por el numero de tiempos elegido en el formulario
         -->
        
        <form name="form_menu" id="form_menu" class="hide">
          
          <div id="wrapper"> </div>
          
          <div class="row mt-1">
            <div class="col-xs-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar Menu</button>
            </div>
          </div>

        </form>
        <!-- end Wraper -->   
        
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

  var formMenu = _.form_menu;


  //en esta variable guardare la informacion que se coloque en el formulario de crear cuerpo del menu en memoria
  var infoPrimerFormulario = null;

  var insertMenu = function(ev){
    if(ev) ev.preventDefault();

    if( this.semana.value === '' ){
      Swal.fire('Las Semana es requerida', '', 'info');
      return;
    }

    if( this.cliente.value === '' ){
      Swal.fire("", 'El Cliente es requerido', 'warning');
      return;
    }

    if( this.unidad.value === '' ){
      Swal.fire("", 'La unidad es requerida', 'warning');
      return;
    }

    if( this.subunidad.value === '' ){
      Swal.fire("", 'La subunidad es requerida', 'warning');
      return;
    }

    let tiempos = this.tiempos.valueAsNumber;
    if( tiempos < 1 || tiempos > 15 ){
      Swal.fire("", 'El tiempo es requerido y debe estar entre 1 y 15', 'warning');
      return;
    }

    if( this.grupo.value === '' ){
      Swal.fire("", 'El grupo es requerido', 'warning');
      return;
    }

    //seleccionar por lo menos un check box de dias
    if( this.querySelector('[name="dias[]"]:checked') === null ){
      Swal.fire("", 'Debe seleccionar al menos un dia para crear el menu', 'warning');
      return;
    }

    infoPrimerFormulario = $(this).serializeArray();//establece la info en una variable global
    
    //lo importante del encabezado para empezar a contruir es tiempos y dias    
    let dias = Array.from( this.querySelectorAll('[name="dias[]"]:checked') ).map( item=> Number( item.value ) );//recuperamos los values de los dias checkeados

    //inserta el html de las filas y clumnas
    let maquetado = '';
    for( let i = 0; i < tiempos; i++ )
      maquetado += crearTiempo( dias );

    formMenu.querySelector('#wrapper').innerHTML = maquetado;

    formMenu.classList.remove('hide');//muestra el formulario del cuerpo del menu

    this.getElementsByTagName('fieldset')[0].disabled = true;//bloquea el primer form

    getTiempos();//se coloca hasta aqui por que aqui ya existen los input tiempo[] en el dom y obtiene los tiempos

  }

  form.addEventListener('submit', insertMenu);

  //crear tiempos recibe un array de numeros, que cada numero es un dia osea 1 = lunes, 2 martes 3 miercoles
  const crearTiempo = function( dias ){

    //crear tiempo deberia crear el row maquetado
    //entonces esta funcion deberia crear el input de los dias recibiendo entonces dias
    let htmlDias = '';
    for( let item of dias ){
      htmlDias += crearInputDay(item);
    }

    let maquetado = `
      <div class="row" style="outline: dotted skyblue 1px; padding-top: 1rem; padding-bottom: 1rem;">
            
        <div class="col-md-3 col-sm-4">
          <div class="form-group">
            <label> Tiempo *</label>
            <select name="tiempo[]" class="form-control input-sm" required >
              <option value="" selected>Seleccione un tiempo</option>
            </select>
          </div>
        </div>

        ${htmlDias}

      </div>
    `;

    return maquetado;
  }

  const crearInputDay = (dia)=>{

    let dias = ['', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

    return (`
      <div class="col-md-3 col-sm-4">
        <div class="form-group">
          <label> ${dias[dia]} </label>
          <select name="${dias[dia].toLowerCase()}[receta][]" class="form-control input-sm recetas" >
            <option value="" selected>Seleccione una Receta</option>
          </select>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              <label> Costo </label>
              <input type="number" name="${dias[dia].toLowerCase()}[costo][]" class="form-control input-sm costo" placeholder="Costo total" disabled />
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label> # Personas</label>
              <input type="number" name="${dias[dia].toLowerCase()}[personas][]" class="form-control input-sm personas" placeholder="Personas" step="1" min="1" />
            </div>
          </div>
        </div>
      </div>
    `);
  }


  const insertaMenu = function(ev){

    if(ev) ev.preventDefault();

    let info2 = $(this).serializeArray();

    let data = infoPrimerFormulario.concat( info2 );

    data.push( {name: 'costo', value: form.costo.value} );
    data.push( {name: 'method', value: 'addMenu'} );


    $.ajax({
      url: "menus/php/Menu.php",
      type: 'POST',
      dataType: 'json', 
      data: data,
      beforeSend: ()=>{
        Swal.fire({
          title: 'Cargando',
          onOpen: ()=>{
            Swal.showLoading()
          },
          allowOutsideClick: false,
          allowEscapeKey: false
        });
      }
    })
    .done((response)=>{



      Swal.close();
    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }

  formMenu.addEventListener('submit', insertaMenu);


  //function que consulta y agrega los tiempos
  const getTiempos = ()=>{

    $.ajax({
      url: "tiempo/php/Tiempo.php",
      type: 'POST',
      dataType: 'json', 
      data: {
        method: 'getBases'
      },
      beforeSend: ()=>{
        Swal.fire({
          title: 'Cargando',
          onOpen: ()=>{
            Swal.showLoading()
          },
          allowOutsideClick: false,
          allowEscapeKey: false
        });
      }
    })
    .done((response)=>{
      let doc = '<option value="" selected >Seleccione un Tiempo</option>';
      for( let item of response ){
        doc += `<option value="${item.idTiempo}">${item.descripcion}</option>`;
      }
      $('[name="tiempo[]"]').html(doc);
      Swal.close();
    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }




  //cuando en el formulario un input de tiempo cambie,debo de hacer que se filtren las recetas por el tiempo y por la subunidad selecionada
  
  $(formMenu).on('change', 'select[name="tiempo[]"]', function(ev){
    
    let row = this.closest('.row');

    if( this.value === '' ){ 
      //debeira limpiar tambien las recetas , y tambien por si las moscas deberia quitar los atribtos required de los campos personas de ese row
      $(row).find('.recetas').html('<option value="" selected > Seleccione una Receta </option>');
      $(row).find('.personas').removeAttr('required');//quita los attr si tubieran
      return;
    }
    //primero obtengo su fila, para obtener de esa fila los select de recetas y llenarlos con la info

    $.ajax({
      url: "menus/php/Menu.php",
      type: 'POST',
      dataType: 'json', 
      data: {
        method: 'getRecetasTiempoSubUnidad',
        subunidad: infoPrimerFormulario.find( item=> item.name === 'subunidad' ).value,
        tiempo: this.value
      },
      beforeSend: ()=>{
        Swal.fire({
          title: 'Cargando',
          onOpen: ()=>{
            Swal.showLoading()
          },
          allowOutsideClick: false,
          allowEscapeKey: false
        });
      }
    })
    .done((response)=>{
      console.log(response);
      let doc = '<option value="" selected >Seleccione un Tiempo</option>';
      for( let item of response ){
        doc += `<option value="${item.idReceta}" data-costo="${item.costo}">${item.nombre}</option>`;
      }
      $(row).find('.recetas').html(doc);
      Swal.close();
    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  });


  //cuando cambie el select de recetas, recupero el option y coloco el costo
  //en el input de costo
  //tambien cuando receta cambie colocamos un required al campo personas
  $(formMenu).on('change', '.recetas', function(ev){

    let content = this.closest('.col-md-3.col-sm-4');

    if( this.value ){//si la receta es valida
      let costo = this[this.selectedIndex].dataset.costo;
      content.querySelector('.costo').value = costo;
      content.querySelector('.personas').setAttribute('required', 'required');//lo hacemos required
    }
    else{
      content.querySelector('.costo').value = '';
      content.querySelector('.personas').removeAttribute('required');//lo hacemos opcional  
    }

    sumatoria();

  });

  const sumatoria = ()=>{

    var total = 0;
    _.querySelectorAll('#wrapper .costo').forEach( item =>{
      
      //estando en el nodo costo, subimos al nodo row y bucamos personas
      let personas = item.closest('.row').querySelector('.personas').value;
      let costoReceta = item.value;

      if( costoReceta && personas ){//si ambos existen
        total += ( Number(costoReceta) * Number(personas) );
      }

    });

    form.costo.value = total.toFixed(2);//colocamos el valor

  }

  $(formMenu).on('input', '.personas', sumatoria);

})();



</script>