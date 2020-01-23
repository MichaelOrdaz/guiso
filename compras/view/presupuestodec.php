<div class="row mt-20-px">
  
  <div class="col-xs-12">
    
    <div class="panel panel-default">
      <div class="panel-heading bg-coral text-white text-center">
        Creación de Presupuesto de Compras a partir de O.C. Autorizada
      </div>
      
      <div class="panel-body text-blue">

        <div class="table-responsive">
          
          <table class="table table-condensed" id="oTable">
            <thead>
              <tr>
                <th>Orden</th>
                <th>Cliente</th>
                <th>Creación</th>
                <th>Elaboró</th>
                <th>Fechas Consideradas</th>
                <th>Presupuesto</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        </div>

        <div class="row">
            
            <div class="col-xs-12">
              <div class="alert alert-info">
                Este reporte muestra el presupuesto de compras en una hoja de calculo para todas las unidades de un cliente
              </div>
            </div>

        </div>
    

      </div>

    </div>

  </div>

</div>

<script>

    var oTable = $('#oTable').DataTable({
      order: [2, 'desc'],
      ajax: {
        type: 'POST',
        url: 'OCP/php/OCP.php',
        data: d=>{
          d.method = 'getOrdenesAuth';
        },
        beforeSend: ()=>{
          Swal.fire({
            title: 'Cargando', 
            onOpen: ()=>{
              Swal.showLoading();
            },
            allowOutsideClick: false,
            allowEscapeKey: false,
            // showConfirmButton: false,
          });
        },
        complete: ()=>{ Swal.close() },
        dataSrc: ''
      },
      columns: [
        {data: 'idOC', defaultContent: ''},
        {data: 'cliente', defaultContent: ''},
        {data: 'fecha', render: data=> moment(data).format('YYYY-MM-DD') },
        {data: 'usuario', defaultContent: ''},
        {
          data: (row)=>{
            var date1 = moment(row.fechaI);
            var date2 = moment(row.fechaF);
            return date1.format('YYYY-MM-DD') + ' - ' + date2.format('YYYY-MM-DD');
          }
        },
        {
          data: (row)=>{
             return `<a type="button" class="btn btn-success btn-xs" title="Generar Presupuesto de Compras" href="OCP/presupuesto.php?id=${row.idOC}" target="_blank"> <i class="fa fa-file-excel-o"></i> </a> `;
          }
        },
      ]

    });

</script>