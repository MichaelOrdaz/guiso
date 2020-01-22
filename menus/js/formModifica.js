  
(function(){


  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.formBase;

  //config calendar
  $('#formBase .datepicker').datepicker({
    format: "yyyy-mm-dd",
    language: 'es',
    autoclose: true,
    // endDate: '0d',
    clearBtn: true
  }).on('hide', function(ev){

    let date = moment(ev.date);
    let week = date.format('w'),
      year = date.startOf('week').format('YYYY');

    form.semana.value = week;
    form.anio.value = year;

    if( week ){
      getMenus();
    }

  });
   //obtener los clientes del sistema
  
  const getClientes = ()=>{

    form.cliente.querySelectorAll('option:not(:first-child)').forEach(item=>{
        item.parentNode.removeChild(item);
    });

    $.ajax({
      url: "clientes/php/Clientes.php",
      type: 'POST',
      dataType: 'json', 
      data: {
        method: 'getClientes'
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
      const doc = _.createDocumentFragment();
      for( let item of response ){
        let option = _.createElement('option');
        option.value = item.idCliente;
        option.textContent = item.nombre;
        doc.appendChild(option);
      }
      form.cliente.appendChild(doc);
      Swal.close();
    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }

  getClientes();


  //obtener las unidades de los clientes
  const getUnidadesCliente = function(ev){

    let cliente = this.value;

    form.unidad.querySelectorAll('option:not(:first-child)').forEach(item=>{
        item.parentNode.removeChild(item);
    });

    form.subunidad.querySelectorAll('option:not(:first-child)').forEach(item=>{
        item.parentNode.removeChild(item);
    });

    getMenus();//buscamos menus

    if( cliente === '' ) return;

    $.ajax({
      url: "clientes/php/Clientes.php",
      type: 'POST',
      dataType: 'json', 
      data: {
        method: 'getUnidades',
        cliente: cliente
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
      const doc = _.createDocumentFragment();
      for( let item of response ){
        let option = _.createElement('option');
        option.value = item.idUnidad;
        option.textContent = item.unidad;
        doc.appendChild(option);
      }
      form.unidad.appendChild(doc);
      Swal.close();

      // getMenus();//buscamos menus

    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }

  form.cliente.addEventListener('change', getUnidadesCliente);


  //obtener las subunidades
  const getSubUnidadesUnidadCliente = function(ev){

    let unidad = this.value;

    form.subunidad.querySelectorAll('option:not(:first-child)').forEach(item=>{
        item.parentNode.removeChild(item);
    });

    getMenus();//buscamos menus

    if( unidad === '' ) return;

    $.ajax({
      url: "clientes/php/Clientes.php",
      type: 'POST',
      dataType: 'json', 
      data: {
        method: 'getSubunits',
        unidad: unidad
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
      const doc = _.createDocumentFragment();
      for( let item of response ){
        let option = _.createElement('option');
        option.value = item.idSUnidad;
        option.textContent = item.subUnidad;
        doc.appendChild(option);
      }
      form.subunidad.appendChild(doc);
      Swal.close();

      // getMenus();//buscamos menus

    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }

  form.unidad.addEventListener('change', getSubUnidadesUnidadCliente);


  //obtener los grupos
  const getGrupos = ()=>{

    form.grupo.querySelectorAll('option:not(:first-child)').forEach(item=>{
        item.parentNode.removeChild(item);
    });

    $.ajax({
      url: "grupos/php/Grupos.php",
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
      const doc = _.createDocumentFragment();
      for( let item of response ){
        let option = _.createElement('option');
        option.value = item.idGrupo;
        option.textContent = item.descripcion;
        doc.appendChild(option);
      }
      form.grupo.appendChild(doc);
      Swal.close();

      // getMenus();//buscamos menus
    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }

  getGrupos();

  //cuando cambie subunidad
  form.subunidad.addEventListener('change', ()=> getMenus() );

  //cuando cambie grupo
  form.grupo.addEventListener('change', ()=> getMenus() );
  
  //cuando cambie fecha
  // form.semana.addEventListener('change', ()=> getMenus() );


  //funcionalidad de los input radio
  //
  
  // const changeRadio = function(ev){
  //   if( this.value === 'T' ){
  //     this.form.querySelectorAll('[name="dias[]"]').forEach(item=> item.checked = true );
  //   }
  //   else if( this.value === 'N' ){
  //     this.form.querySelectorAll('[name="dias[]"]').forEach(item=> item.checked = false );
  //   }
  // }

  // form.optradio.forEach(item=>{
  //   item.addEventListener('change', changeRadio);
  // });



  const getMenus = ()=>{

    let cliente = form.cliente.value;
    let unidad = form.unidad.value;
    let subunidad = form.subunidad.value;
    let semana = form.semana.value;
    let anio = form.anio.value;
    let grupo = form.grupo.value;

    let data = {};
    data.method = 'getMenus';

    if( cliente ) data.cliente = cliente;
    if( unidad ) data.unidad = unidad;
    if( subunidad ) data.subunidad = subunidad;
    if( semana ) data.semana = semana;
    if( anio ) data.anio = anio;
    if( grupo ) data.grupo = grupo;

    $.ajax({
      url: "menus/php/Menu.php",
      type: 'POST',
      dataType: 'json', 
      data,
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

      if( response.status ){
        const doc = _.createDocumentFragment();
        for( let item of response.results ){
          let option = _.createElement('option');
          option.value = item.idMenu;
          option.textContent = item.idMenu;
          option.dataset.info = JSON.stringify( item );
          doc.appendChild(option);
        }

        form.menu.querySelectorAll('option:not(:first-child)').forEach( item=> item.parentNode.removeChild(item) );
        form.menu.appendChild(doc);
        Swal.close();
      }
      else{
        Swal.fire('Error', response.msg, 'error');
      }

    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }

  getMenus();


  //checkbox de solo lectura
  // form['dias[]'].forEach(item=>{
  //   item.onclick = (ev)=>{ev.preventDefault()}
  // });

})();