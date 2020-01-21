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
                <label> Año * </label>
                <input type="text" name="anio" class="form-control input-sm" placeholder="Año" required readonly />
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
                <label> Grupo del Menú*</label>
                <select name="grupo" class="form-control input-sm" required >
                  <option value="" selected>Seleccione un grupo</option>
                </select>
              </div>
            </div>
          
          </div>

          <hr>

          <div class="row mt-1">
            <div class="col-xs-12">
              <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Nota</strong> Llena los campos para filtar los datos hasta el menú deseado
              </div>
            </div>
          </div> 

          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Menús *</label>
                <select name="menu" class="form-control input-sm" required >
                  <option value="" selected>Selecciona un menú</option>
                </select>
              </div>
            </div>
            
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> No. de Tiempos *</label>
                <input type="number" name="tiempos" class="form-control input-sm" placeholder="Número de tiempos del menú" required min="1" max="15" readonly />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Elaboro * </label>
                <input type="text" name="elaboro" class="form-control input-sm" placeholder="Ingrese el nombre del responsable" required maxlength="150" readonly />
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label> Costo Total del Menú </label>
                <input type="number" name="costo" class="form-control input-sm" placeholder="Costo por el Menú" required min="0" step="0.01" readonly />
              </div>
            </div>

          </div>



          <div class="row">
            <div class="col-xs-12">
              <p>
                Dias del Menú *
              </p>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="1" />Lunes</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="2" />Martes</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="3" />Miercoles</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="4" />Jueves</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="5" />Viernes</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="6" />Sabado</label>
              <label class="checkbox-inline"><input type="checkbox" name="dias[]" value="7" />Domingo</label>
            </div>
          </div>

          <div class="row mt-1">
            
            <!-- <div class="col-xs-12 text-center"> -->
              <!-- <button type="submit" class="btn btn-primary"> Crear Cuerpo del Menú </button> -->
            <!-- </div> -->

          </div>


        </fieldset>

        </form>

        <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-success" id="box-message">
              
              Ninguna subunidad establecida   

            </div>
          </div>
        </div>

        <hr />
  
        <!-- 
          debo tener una tipo tabla con maximo 8 columnas y maximo 15 filas
          las columnas van dadas por el numero de dias que se seleccionen 
          y las filas por el numero de tiempos elegido en el formulario
         -->
        
        <form name="form_menu" id="form_menu" class="hide">
        <fieldset disabled>
          
          <div id="wrapper"> </div>
          
          <div class="row mt-1">
            <div class="col-xs-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar Menu</button>
            </div>
          </div>

        </fieldset>  
        </form>
        <!-- end Wraper -->   
        
      </div>
    
    </div>
  

  </div>


</div>

<script src="menus/js/formConsulta.js"></script>
<!-- <script src="menus/js/controlsBodyMenu.js"></script> -->
<script>
  
(function(){


  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.formBase;

  var formMenu = _.form_menu;


  //en esta variable guardare la informacion que se coloque en el formulario de crear cuerpo del menu en memoria
  // var infoPrimerFormulario = null;
  // 
  
  const changeMenu = function(ev){

    menu = this.value;

    let info = this.options[this.selectedIndex].dataset.info;

    // info = JSON.parse(info);
    // console.log(info);
    $.post('menus/php/Menu.php', {method: 'getMenu', menu}, (data, textStatus, xhr)=> {
      
      if( data.status === 0 ){
        Swal.fire('Error', data.msg, 'error');
        return;
      }

      infoPrimerFormulario.setData( data.result );

      form.tiempos.value = data.result.numTiempos;
      form.elaboro.value = data.result.elaboro;
      form.costo.value = data.result.costoTot;

      //checkear los dias
      let listDias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
      
      form['dias[]'].forEach( function(checkbox, index){
        checkbox.checked = false;
        if( data.result[ listDias[index] ] === '1' ){
          checkbox.checked = true;
        }
      });

      //con esta linea recupero los checkbox de los dias que estan seleccionados y reupero su valor
      let dias = Array.from( form.querySelectorAll('[name="dias[]"]:checked') ).map( item=> Number( item.value ) );//recuperamos los values de los dias checkeados
      //recordar que los valores de los check corresponde a su numero del dia en la semana, comenzado con lunes = 1, martes 2, miercoles 3 etc...    

      let maquetado = '';
      for( let i = 0; i < data.result.numTiempos; i++ )
        maquetado += crearTiempo( dias );

      formMenu.querySelector('#wrapper').innerHTML = maquetado;

      formMenu.classList.remove('hide');//muestra el formulario del cuerpo del menu

      // this.getElementsByTagName('fieldset')[0].disabled = true;//bloquea el primer form

      getTiempos();//se coloca hasta aqui por que aqui ya existen los input tiempo[] en el dom y obtiene los tiempos

      //recuperar cuerpo del backend
      $.ajax({
        url: "menus/php/Menu.php",
        type: 'POST',
        dataType: 'json', 
        data: {
          method: 'getBodyMenu',
          menu: menu,
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
        if( response.status === 1 ){
          setTiempos( response.results );
          Swal.close();
        }
        else{
          Swal.fire('Error', response.msg, 'error');
        }
      })
      .fail(()=> {
        Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
      });
      

    }, 'json');//final del metodo POST



  }

  form.menu.addEventListener('change', changeMenu);


  var setTiempos = function( data ){

    let estructurar = {};
    for( let item of data ){
      if( ! ( item.tiempo in estructurar ) ){
        estructurar[item.tiempo] = [];
      }
      estructurar[item.tiempo].push( item );
    }

    console.log(estructurar);

    //tengo un objeto con las llaves de cada tiempo que exista, cada tiempo tiene un array de las recetas con sus posiciones  

    // let recetasByTiempo = Object.values( estructurar );

    let index = 0;
    for( let prop in estructurar ){

      //aqui prop sera el id del tiempo y por cada tiempo coloco recetas en sus respectivos dias
      // console.log(prop, index);
      //colocar el value en tiempo
      let selectTiempo = formMenu.querySelectorAll('[name="tiempo[]"]')[index];
      console.log(selectTiempo);
      selectTiempo.value = prop;

      // $(selectTiempo).trigger('change');//disparar un change en cada tiempo para cargar las recetas
      
      let row = selectTiempo.closest('.row');
      
      $(row).find('.personas, .costo').val('');//los input de perosnas y costo siempre se limpian cuando cambie tiempo
      $(row).find('.personas').removeAttr('required');//quita los attr si tubieran

      if( prop === '' ){
        //debeira limpiar tambien las recetas , y tambien por si las moscas deberia quitar los atribtos required de los campos personas de ese row
        $(row).find('.recetas').html('<option value="" selected > Seleccione una Receta </option>');
        // $(row).find('.personas').removeAttr('required');//quita los attr si tubieran
        return;
      }

      //primero obtengo su fila, para obtener de esa fila los select de recetas y llenarlos con la info
      $.ajax({
        url: "menus/php/Menu.php",
        type: 'POST',
        dataType: 'json', 
        data: {
          method: 'getRecetasTiempoSubUnidad',
          subunidad: infoPrimerFormulario.getProperty('subUnidad'),
          tiempo: prop//prop es tiempo
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
        // console.log(response);
        let doc = '<option value="" selected >Seleccione una receta</option>';
        for( let item of response ){
          doc += `<option value="${item.idReceta}" data-costo="${item.costo}">${item.nombre}</option>`;
        }
        $(row).find('.recetas').html(doc);

        //una vez que tengo carga las recetas
        //iteramos sobre ese tiempo las recetas que queriamos poner
        let j = 0;
        for( let item of estructurar[prop] ){

          console.log(item);
          //en item tengo, precio, personas y nombre de la receta, pos y tiempo, tiempo ya esta e idReceta
          //comenzamos por lo facil colocamos costo y personas
          
          //este me intriga ya que si la receta no esta que hago, se me ocurre crear un select con la opcion y al cabo que tengo la receta y el costo y hasta el id
          
          let existe = row.querySelectorAll('.recetas')[j].querySelector('option[value="'+item.idReceta+'"]');

          if( existe === null ){//no existe entonces lo agregamos y lo selected
            $(row).append('<option value="'+item.idReceta+'" selected> '+item.receta+' </option>')  
          }

          row.querySelectorAll('.recetas')[j].value = item.idReceta;

          row.querySelectorAll('.costo')[j].value = item.precio;
          row.querySelectorAll('.personas')[j].value = item.personas;
          
          j++;
        }



        Swal.close();
      })
      .fail(()=> {
        Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
      });


      index++;
      //ahora colocamos las recetas, esto quiere decir que la receta debe existir en la lista de opciones y si no lo que me queda es agregar un select con selected del elemento que esta
      // ahora
      // 
      // ahora en mi objeto que estoy recorriendo el valor de la propiedad es un array
      // y en el se deberia colocar la receta con sus valores como estan en el DOM
      

    }

    //ordernar los item de los array por dia
    // estructurar.sort( (a, b)=> {
    //   let it1 = Number(a.pos);
    //   let it2 = Number(b.pos);

    //   if (it1 > it2){
    //     return 1;
    //   }
    //   if (it1 < it2) {
    //     return -1;
    //   }
    //   // a must be equal to b
    //   return 0;
    // });  



  }

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

    // infoPrimerFormulario = $(this).serializeArray();//establece la info en una variable global
    infoPrimerFormulario.setData( $(this).serializeArray() );//establece la info en una variable global
    
    //lo importante del encabezado para empezar a contruir es tiempos y dias
    //
    //con esta linea recupero los checkbox de los dias que estan seleccionados y reupero su valor
    let dias = Array.from( this.querySelectorAll('[name="dias[]"]:checked') ).map( item=> Number( item.value ) );//recuperamos los values de los dias checkeados
    //recordar que los valores de los check corresponde a su numero del dia en la semana, comenzado con lunes = 1, martes 2, miercoles 3 etc...    

    //inserta el html de las filas y clumnas
    let maquetado = '';
    for( let i = 0; i < tiempos; i++ )
      maquetado += crearTiempo( dias );

    formMenu.querySelector('#wrapper').innerHTML = maquetado;

    formMenu.classList.remove('hide');//muestra el formulario del cuerpo del menu

    // this.getElementsByTagName('fieldset')[0].disabled = true;//bloquea el primer form

    getTiempos();//se coloca hasta aqui por que aqui ya existen los input tiempo[] en el dom y obtiene los tiempos

    // $('.recetas').select2();

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

  //esta funcion crea un grupo de 3 input con  un label que corresponde a un dia de la semana
  const crearInputDay = (dia)=>{

    let dias = ['', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

    let diaLower = dias[dia].toLowerCase();

    return (`
      
      <div class="col-md-3 col-sm-4">
        <div class="form-group">
          <label> ${dias[dia]} </label>
          <select name="${diaLower}[receta][]" class="form-control input-sm recetas" >
            <option value="" selected>Seleccione una Receta</option>
          </select>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              <label> Costo </label>
              <input type="number" name="${diaLower}[costo][]" class="form-control input-sm costo" placeholder="Costo total" disabled />
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label> # Personas</label>
              <input type="number" name="${diaLower}[personas][]" class="form-control input-sm personas" placeholder="Personas" step="1" min="1" />
            </div>
          </div>
        </div>
      </div>
    `);
  }


  const insertaMenu = function(ev){

    if(ev) ev.preventDefault();

    let info2 = $(this).serializeArray();

    //validar que por cada tiempo (cada fila) exista minimo una receta 
    console.log(info2);
    
    let flag = true;//comenzamos diciendo que todos los select estan vacios

    let flag2 = [];//este flag es para verificar que los tiempos no se repitan

    //recuperamos los select de tiempo
    let selectTiempos = this.querySelectorAll('select[name="tiempo[]"]');

    for( let item of selectTiempos ){

      flag = true;
      flag2.push( item.value );//metemos los values de cada tiempo
      //tambien verificamos que los tiempos no esten repetidos

      //cada select esta en una fila,
      //recuperamos los select con clase receta dentro de esa fila  
      let inputRecetas = item.closest('.row').querySelectorAll('select.recetas');
      for( let selectReceta of inputRecetas ){
        //si algun select tiene un valor cambiamos el flag a false
        if( selectReceta.value !== '' ){
          flag = false;
          break;//como ya se que un input tiene un valor finalizamos el bucle ya que cumple con tener un select con valor la fila
        }

      }

      if( flag ){//si flag es true todos estan vacios y debemos solicitar minimo un valor
        console.log('entro ya que todos los input del row estan vacios', item, flag);
        break;//finalizamos el codigo
      }

    }

    if( flag ){
      Swal.fire("Incompleto", 'Cada tiempo debe tener minimo una receta', 'warning');
      return;
    }

    //verificamos si hay tiempos repetidos avisamos
    if( selectTiempos.length !== [...new Set(flag2)].length ){
      Swal.fire("Error", 'Los tiempos no pueden estar repetidos', 'warning');
      return;
    }

    let data = infoPrimerFormulario.getData().concat( info2 );

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
      if( response.status === 1 ){
        Swal.fire('Exito', response.msg, 'success')
        .then(r=>{
          $('#contenedor').load('menus/view/agregar.php');
        } );
      }
      else{
        Swal.fire('Error', response.msg, 'error');
      }


      // Swal.close();
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





  //manipula el cambio de tiempos en cada fila
  //si el tiempo es vacio elimina todas las recetas de esa fila
  //si existe el tiempo realiza una peticion y busca las recetas
  $(formMenu).on('change', 'select[name="tiempo[]"]', function(ev){
    
    // console.log( "cambio tiempo");

    let row = this.closest('.row');

    let tiempo = this.value;
    
    $(row).find('.personas, .costo').val('');//los input de perosnas y costo siempre se limpian cuando cambie tiempo
    $(row).find('.personas').removeAttr('required');//quita los attr si tubieran

    if( tiempo === '' ){ 
      //debeira limpiar tambien las recetas , y tambien por si las moscas deberia quitar los atribtos required de los campos personas de ese row
      $(row).find('.recetas').html('<option value="" selected > Seleccione una Receta </option>');
      // $(row).find('.personas').removeAttr('required');//quita los attr si tubieran
      return;
    }

    //primero obtengo su fila, para obtener de esa fila los select de recetas y llenarlos con la info
    $.ajax({
      url: "menus/php/Menu.php",
      type: 'POST',
      dataType: 'json', 
      data: {
        method: 'getRecetasTiempoSubUnidad',
        subunidad: infoPrimerFormulario.getProperty('subUnidad'),
        tiempo: tiempo
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
      // console.log(response);
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


  //objeto que controla la informacion a quien se le guardara el menu y la muestra
  const infoPrimerFormulario = {
    //este objeto lo que hara es que si cambia una de sus propiedades esto se refleje en el elemento box message del DOM
    info: null,
    boxMessage: $$('#box-message'),
    setData: function(data){
      //establecemos la info del formulario en el momento del envio, pero ademas rescatamos las propiedades text de los select, en este caso hay 4
      this.info = data;
      this.changeBoxMessage();
    },
    getData: function(){
      return this.info;
    },
    changeBoxMessage: function(){
      if( ! this.info ){
        this.boxMessage.innerHTML = 'Ninguna subunidad establecida';
        return;
      }
      this.boxMessage.innerHTML = `Menú de la subunidad ${ this.getProperty('subunidadName') }, unidad ${ this.getProperty('unidadName') }, ${ this.getProperty('clienteName') }, para la Semana ${ this.getProperty('semana') } (${this.getProperty('lapso')}), grupo alimenticio del día ${ this.getProperty('grupoName') }. Elaborado por ${this.getProperty('elaboro')}`;
    },
    //regresa false si la propiedad no existe
    getProperty: function( name ){
      return name in this.info ? this.info[name] : false
    },

    setProperty: function( name, value ){
      this.info[name] = value;
      this.changeBoxMessage();
    }

  }


})();



</script>