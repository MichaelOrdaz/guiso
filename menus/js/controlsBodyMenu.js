(function(){


  var _ = document;
  var $$ = _.querySelector.bind(_);

  var form = _.formBase;

  var formMenu = _.form_menu;

  /*
  //cuando en el formulario un input de tiempo cambie,debo de hacer que se filtren las recetas por el tiempo y por la subunidad selecionada
  
  $(formMenu).on('change', 'select[name="tiempo[]"]', function(ev){
    
    // console.log( "cambio tiempo");

    let row = this.closest('.row');

    let tiempo = this.value;

    if( tiempo === '' ){ 
      //debeira limpiar tambien las recetas , y tambien por si las moscas deberia quitar los atribtos required de los campos personas de ese row
      // $(row).find('.recetas').html('<option value="" selected > Seleccione una Receta </option>');
      $(row).find('select.recetas').select2('destroy').select2();
      // $(row).find('select.recetas').select2();
      // $(row).find('select.recetas').select2();
      $(row).find('.personas').removeAttr('required');//quita los attr si tubieran
      return;
    }


    // $(row).find('select.recetas').select2('destroy').select2({
    //   placeholder: 'Selecciona una receta',
    //   delay: 1000,
    //   minimumInputLength: 2,
    //   ajax: {
    //     url: 'menus/php/Menu.php',
    //     dataType: "json",
    //     type: "POST",
    //     data: (params)=>{
    //       params.method = 'getRecetasTiempoSubUnidadMatch';
    //       params.sub = form.subunidad.value;
    //       params.tiempo = tiempo;
    //       return params;
    //     }
    //   },
    //   templateSelection: data=>{
    //     if( ! data.id ) return data.text;
    //     data.element.dataset.costo = data.costo;
    //     return data.text;
    //   }
    // });

    // cuando cambie

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

  */


  //cuando cambie el select de recetas, recupero el option y coloco el costo
  //en el input de costo
  //tambien cuando receta cambie colocamos un required al campo personas
  $(formMenu).on('change', '.recetas', function(ev){

    let content = this.closest('td');

    if( this.value ){//si la receta es valida
      let costo = this[this.selectedIndex].dataset.costo;
      content.querySelector('.costo').value = costo;
      content.querySelector('.personas').setAttribute('required', 'required');//lo hacemos required
      content.querySelector('.idReceta').value = this.value;
    }
    else{
      content.querySelector('.costo').value = '';
      content.querySelector('.personas').value = '';
      content.querySelector('.personas').removeAttribute('required');//lo hacemos opcional  
      content.querySelector('.idReceta').value = '';
    }

    sumatoria();

  });

  const sumatoria = ()=>{

    var total = 0;
    _.querySelectorAll('#wrapper .costo').forEach( item =>{
      
      //estando en el nodo costo, subimos al nodo row y bucamos personas
      let personas = item.closest('tr').querySelector('.personas').value;
      let costoReceta = item.value;

      if( costoReceta && personas ){//si ambos existen
        total += ( Number(costoReceta) * Number(personas) );
      }

    });

    form.costo.value = total.toFixed(2);//colocamos el valor

  }

  $(formMenu).on('input', '.personas', sumatoria);


})();