<style type="text/css">

div#contenedor label, div#contenedor li, div#contenedor h5, div#contenedor p, div#contenedor td, div#contenedor th {
color: black;
}

.grid-container {
display: grid;
grid-template-columns: 44% 44%;
grid-gap: 5px;
}

.item1 {
grid-area: 1 / span 2 ;
}

.item8 {
padding-top: 5px;
}

.item9 {
grid-column: 1 / 2;
}

</style>

<div class="row" style="margin-top: 31px;">
    <div class="col-lg-12">
        <div class="panel panel-default" style="margin-bottom: 8px;">
            <div class="panel-heading" style="text-align: center; background-color: #EE7561; color: white;">
            Eliminacion de menus
            </div>
            <div class="panel-body" style="padding: 10px; padding-bottom: 4px;">
                    
                    <div class="row" style="margin-bottom: 5px;"> 
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Semana:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="" id="semana" style="height: 24px;" disabled>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Cliente:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="cliente" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">Costo/Total:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="0" id="costo" style="height: 24px;" disabled>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                    </div>
                    
                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Año:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="" id="lapso" style="height: 24px;" disabled>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Unidad:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="unidad" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">Elaboro:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="" id="elaboro" style="height: 24px;" disabled>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                    </div>


                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*ID menu:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input list="idmenu" class="form-control" id="idm" autocomplete="off" placeholder=" -- Seleccione menu --" style="height: 28px;">
                    <datalist id="idmenu">
                    </datalist>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*SubUnidad:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input type="" class="form-control"p id="subunidad" disabled>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Grupo:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="grupo" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                    </div>

                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;"># Tiempo:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="tiem" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-8 col-sm-12" style='color:#337ab7;'>
                    <label style="color: #337ab7;margin-right: 8px;">*dias:</label>
                    lunes
                    <input type="checkbox" name=""  id="checkbox1" disabled>
                    martes
                    <input type="checkbox" name=""  id="checkbox2" disabled>
                    miercoles
                    <input type="checkbox" name=""  id="checkbox3" disabled>
                    jueves
                    <input type="checkbox" name=""  id="checkbox4" disabled>
                    viernes
                    <input type="checkbox" name=""  id="checkbox5" disabled>
                    sabando
                    <input type="checkbox" name=""  id="checkbox6" disabled>
                    domingo
                    <input type="checkbox" name=""  id="checkbox7" disabled>
                    </div>
                    </div>

                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body" style="padding-bottom: 2px;">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th style='color:#337ab7'>Lunes</th>
                            <th style='color:#337ab7'>Martes</th>
                            <th style='color:#337ab7'>Miercoles</th>
                            <th style='color:#337ab7'>Jueves</th>
                            <th style='color:#337ab7'>Viernes</th>
                            <th style='color:#337ab7'>Sabado</th>
                            <th style='color:#337ab7'>Domingo</th>
                        </tr>
                    </thead>
                    <tbody id="tabla">
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>

<BUTTON style="float: right;margin-bottom: 20px; background-color:#337ab7;" class="btn btn-primary" id="borrar"> Eliminar menu </BUTTON>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>

<script>

temp=0;

$.ajax({
url : 'menu/php/imprimirmenu.php',
data : {},
type : 'POST',
dataType: 'json',
beforeSend:function(){
Swal.fire({
title: 'Cargando', 
onOpen: ()=>{
Swal.showLoading();
},
allowOutsideClick: false,
allowEscapeKey: false
});
},
success:function(respuesta){
Swal.close();
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
tabla="";
$.each(res,function(key,value){
tabla+="<option>"+value.idMenu+"</option>";
});
$('#idmenu').html(tabla);
},
});


$('#idm').on('input',function(){
$.ajax({
url : 'menu/php/consultarmenu2.php',
data : {idmenu:$('#idm').val()},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
$.each(res,function(key,value){
$('#semana').val(value.semana);
$('#tiem').html("<option>"+value.numTiempos+"</option>");
temp=value.numTiempos;
$('#lapso').val(value.lapso);
$('#elaboro').val(value.elaboro);
$('#grupo').html("<option>"+value.descripcion+"</option>");
$('#cliente').html("<option>"+value.nombre+"</option>");
$('#unidad').html("<option>"+value.unidad+"</option>");
$('#subunidad').val(value.subUnidad);
$('#costo').val(value.costoTot);
});

$.ajax({
url : 'menu/php/consultarmenu3.php',
data : {
idmenu:$('#idm').val(),
tiem:temp
},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
tabla="";

$('#checkbox1').attr('checked', false);
$('#checkbox2').attr('checked', false);
$('#checkbox3').attr('checked', false);
$('#checkbox4').attr('checked', false);
$('#checkbox5').attr('checked', false);
$('#checkbox6').attr('checked', false);
$('#checkbox7').attr('checked', false);

$.each(res,function(key,value){

reslunes=value.lunes.split(",");
resmartes=value.martes.split(",");
resmiercoles=value.miercoles.split(",");
resjueves=value.jueves.split(",");
resviernes=value.viernes.split(",");
ressabado=value.sabado.split(",");
resdomingo=value.domingo.split(",");

tabla+="<tr>";

if(reslunes[0]!=""){
tabla+="<td style='color:#337ab7;width:14%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+reslunes[0]+"</div>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+reslunes[3]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+reslunes[1]+"</div>"+
"<div class='item5' id='it5'>"+reslunes[2]+"</div>"+
"<div class='item8' id='it8'>Fecha</div>"+
"<div class='item9' id='it9'>"+reslunes[4]+"</div>"+
"</div>"+
"</td>";
}
if(reslunes[0]==""){
tabla+="<td style='width:14%;'></td>";
}
if(value.lunes!=""){
$('#checkbox1').attr('checked', true);
}

if(resmartes[0]!=""){
tabla+="<td style='color:#337ab7;width:14%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resmartes[0]+"</div>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+resmartes[3]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resmartes[1]+"</div>"+
"<div class='item5' id='it5'>"+resmartes[2]+"</div>"+
"<div class='item8' id='it8'>Fecha</div>"+
"<div class='item9' id='it9'>"+resmartes[4]+"</div>"+
"</div>"+
"</td>";
}
if(resmartes[0]==""){
tabla+="<td style='width:14%;'></td>";
}
if(value.martes!=""){
$('#checkbox2').attr('checked', true);
}

if(resmiercoles[0]!=""){
tabla+="<td style='color:#337ab7;width:14%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resmiercoles[0]+"</div>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+resmiercoles[3]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resmiercoles[1]+"</div>"+
"<div class='item5' id='it5'>"+resmiercoles[2]+"</div>"+
"<div class='item8' id='it8'>Fecha</div>"+
"<div class='item9' id='it9'>"+resmiercoles[4]+"</div>"+
"</div>"+
"</td>";
}
if(resmiercoles[0]==""){
tabla+="<td style='width:14%;'></td>";
}
if(value.miercoles!=""){
$('#checkbox3').attr('checked', true);
}

if(resjueves[0]!=""){
tabla+="<td style='color:#337ab7;width:14%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resjueves[0]+"</div>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+resjueves[3]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resjueves[1]+"</div>"+
"<div class='item5' id='it5'>"+resjueves[2]+"</div>"+
"<div class='item8' id='it8'>Fecha</div>"+
"<div class='item9' id='it9'>"+resjueves[4]+"</div>"+
"</div>"+
"</td>";
}
if(resjueves[0]==""){
tabla+="<td style='width:14%;'></td>";
}
if(value.jueves!=""){
$('#checkbox4').attr('checked', true);
}

if(resviernes[0]!=""){
tabla+="<td style='color:#337ab7;width:14%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resviernes[0]+"</div>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+resviernes[3]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resviernes[1]+"</div>"+
"<div class='item5' id='it5'>"+resviernes[2]+"</div>"+
"<div class='item8' id='it8'>Fecha</div>"+
"<div class='item9' id='it9'>"+resviernes[4]+"</div>"+
"</div>"+
"</td>";
}
if(resviernes[0]==""){
tabla+="<td style='width:14%;'></td>";
}
if(value.viernes!=""){
$('#checkbox5').attr('checked', true);
}

if(ressabado[0]!=""){
tabla+="<td style='color:#337ab7;width:14%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+ressabado[0]+"</div>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+ressabado[3]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+ressabado[1]+"</div>"+
"<div class='item5' id='it5'>"+ressabado[2]+"</div>"+
"<div class='item8' id='it8'>Fecha</div>"+
"<div class='item9' id='it9'>"+ressabado[4]+"</div>"+
"</div>"+
"</td>";
}
if(ressabado[0]==""){
tabla+="<td style='width:14%;'></td>";
}
if(value.sabado!=""){
$('#checkbox6').attr('checked', true);
}

if(resdomingo[0]!=""){
tabla+="<td style='color:#337ab7;width:14%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resdomingo[0]+"</div>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+resdomingo[3]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resdomingo[1]+"</div>"+
"<div class='item5' id='it5'>"+resdomingo[2]+"</div>"+
"<div class='item8' id='it8'>Fecha</div>"+
"<div class='item9' id='it9'>"+resdomingo[4]+"</div>"+
"</div>"+
"</td>";
}
if(resdomingo[0]==""){
tabla+="<td style='width:14%;'></td>";
}
if(value.domingo!=""){
$('#checkbox7').attr('checked', true);
}

tabla+="</tr>";
});
$('#tabla').html(tabla);
},
});

},
});
});


$("#borrar").click(function(){
$.ajax({
url : 'menu/php/eliminarmenu.php',
type : 'POST',
data : {idmenu:$('#idm').val()},
success:function(respuesta){
Swal.fire("Exito", 'Menu Eliminado correctamente', 'success');
$("#contenedor").load('menu/view/eliminarmenu.php');
},
});
});

</script>