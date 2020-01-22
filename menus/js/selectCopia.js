  
(function(){


  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.form_menu;

  //config calendar
  $('#form_menu .datepicker').datepicker({
    format: "yyyy-mm-dd",
    language: 'es',
    autoclose: true,
    // endDate: '0d',
  }).on('hide', function(ev){

    let date = moment(ev.date);
    let week = date.format('w'),
      start = date.startOf('week').format('YYYY-MM-DD'),
      end = date.endOf('week').format('YYYY-MM-DD');

    form.semana.value = week;
    form.rango.value = `${start} - ${end}`;

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
    })
    .fail(()=> {
      Swal.fire('', 'La Red no esta disponible, intente más tarde', 'error');
    });

  }

  getGrupos();


})();