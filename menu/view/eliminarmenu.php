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
            Eliminar menu
            </div>
            <div class="panel-body" style="padding: 10px; padding-bottom: 4px;">
                    
                    <div class="row" style="margin-bottom: 5px;"> 
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Año:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" style="height: 24px" id="anio" autocomplete="off" readonly />
                    <span class="input-group-addon" style="padding: 3px 16px;">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Cliente:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="cliente" style="height: 28px;" >
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">Costo/Total:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="0" id="costo" style="height: 24px;" disabled>
                    </div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Semana:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="" id="semana" style="height: 24px;" disabled>
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
                    </div>


                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*ID menu:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input list="idmenu" class="form-control" id="idm" autocomplete="off" readonly style="height: 28px;">
                    <datalist id="idmenu">
                    </datalist>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*SubUnidad:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="subunidad" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Grupo:</labelp>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="grupo" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    </div>

                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*# Tiempos:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="tiem" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-5 col-sm-12" style='color:#337ab7;'>
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
                    <div class="col-md-2 col-sm-12">
                    </div>
                    </div>

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
                            <th style='color:#337ab7'>Tiempo</th>
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
    <!-- /.panel -->

<button style="float: right;height:34px;" class="btn btn-primary" id="eliminar" >Eliminar Menu</button>

</div>
<!-- /.col-lg-12 -->
</div>


<script>

ano="";
semana="";
tiempo="";

(function(){
$('#datetimepicker1').datepicker({
format: "dd-mm-yyyy",
language: 'es',
autoclose: true,
});
})();

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

$.ajax({
url : 'menu/php/agregarmenu2.php',
data : {},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
unidad="";
unidad+="<option disabled selected> -- Selecione Cliente -- </option>";
$.each(res,function(key,value){
unidad+="<option value="+value.idcliente+">"+value.nombre+"</option>";
});
$('#cliente').html(unidad);
},
});

$('#cliente').on('change',function(){
if((ano!="")&&($('#cliente').val()!=null)){
buscar();
}
});

$('#anio').on('change',function(){
fecha=$('#anio').val();
$.ajax({
url : 'menu/php/agregarmenu5.php',
data : {semana:$('#anio').val()},
type : 'POST',
success:function(respuesta){
vector=respuesta.split(",");
$('#semana').val(vector[0]);
$('#anio').val(vector[2]);
semana=vector[0];
ano=vector[2];
if((ano!="")&&($('#cliente').val()!=null)){
buscar();
}
},
});
});

function buscar(){
$.ajax({
url : 'menu/php/imprimirmenu3.php',
data : {
ano:ano,
semana:semana
},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
auxiliar="";
auxiliar+="<option> Selecione </option>";
$.each(res,function(key,value){
auxiliar+="<option>"+value.idMenu+"</option>";
$('#idm').html(auxiliar);
});
$("#idm").attr("placeholder"," Selecione menu ");
$("#idm").attr("readonly", false); 
},
});
}


$('#idm').on('input',function(){

$('#tabla').html('');

$("#cliente").prop("disabled","disabled");
$("#anio").prop("disabled","disabled");

$.ajax({
url : 'menu/php/consultarmenu4.php',
data : {idmenu:$('#idm').val()},
type : 'POST',
async:false,
success:function(respuesta){
vec=respuesta.split(",");
$('#anio').val(vec[7]);
$('#semana').val(vec[0]);
$('#tiem').html('<option>'+vec[1]+'</option>');
tiempo=vec[1];
$('#costo').val(vec[2]);
$('#elaboro').val(vec[3]);
$('#unidad').html("<option>"+vec[4]+"</option>");
$('#subunidad').html("<option>"+vec[5]+"</option>");
$('#grupo').html("<option>"+vec[6]+"</option>");
$('#cliente').html("<option>"+vec[8]+"</option>");
},
});

$.ajax({

url : 'menu/php/consultarmenu3.php',
data : {
idMenu:$('#idm').val(),
tiempo:tiempo
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

auxi="";

if((reslunes[5]!="")&&(reslunes[5]!=undefined)){
auxi=reslunes[5];
}
if((resmartes[5]!="")&&(resmartes[5]!=undefined)){
auxi=resmartes[5];
}
if((resmiercoles[5]!="")&&(resmiercoles[5]!=undefined)){
auxi=resmiercoles[5];
}
if((resjueves[5]!="")&&(resjueves[5]!=undefined)){
auxi=resjueves[5];
}
if((resviernes[5]!="")&&(resviernes[5]!=undefined)){
auxi=resviernes[5];
}
if((ressabado[5]!="")&&(ressabado[5]!=undefined)){
auxi=ressabado[5];
}
if((resdomingo[5]!="")&&(resdomingo[5]!=undefined)){
auxi=resdomingo[5];
}

tabla+="<tr>";

tabla+="<td style='color:#337ab7;width:12.5%;'>"+auxi+"</td>";

if(reslunes[1]!=undefined){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+reslunes[1]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+reslunes[2]+"</div>"+
"<div class='item5' id='it5'>"+reslunes[3]+"</div>"+
//"<div class='item8' id='it8'>Fecha</div>"+
//"<div class='item9' id='it9'>"+reslunes[4]+"</div>"+
"<div class='item8' id='it8'>ID. Receta</div>"+
"<div class='item9' id='it9'>"+reslunes[6]+"</div>"+
"</div>"+
"</td>";
}
if(reslunes[1]==undefined){
tabla+="<td style='width:12.5%;'></td>";
}
if(reslunes[4]!=undefined){
$('#checkbox1').attr('checked', true);
}

if(resmartes[1]!=undefined){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resmartes[1]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resmartes[2]+"</div>"+
"<div class='item5' id='it5'>"+resmartes[3]+"</div>"+
//"<div class='item8' id='it8'>Fecha</div>"+
//"<div class='item9' id='it9'>"+resmartes[4]+"</div>"+
"<div class='item8' id='it8'>ID. Receta</div>"+
"<div class='item9' id='it9'>"+resmartes[6]+"</div>"+
"</div>"+
"</td>";
}
if(resmartes[1]==undefined){
tabla+="<td style='width:12.5%;'></td>";
}
if(resmartes[4]!=undefined){
$('#checkbox2').attr('checked', true);
}

if(resmiercoles[1]!=undefined){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resmiercoles[1]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resmiercoles[2]+"</div>"+
"<div class='item5' id='it5'>"+resmiercoles[3]+"</div>"+
//"<div class='item8' id='it8'>Fecha</div>"+
//"<div class='item9' id='it9'>"+resmiercoles[4]+"</div>"+
"<div class='item8' id='it8'>ID. Receta</div>"+
"<div class='item9' id='it9'>"+resmiercoles[6]+"</div>"+
"</div>"+
"</td>";
}
if(resmiercoles[1]==undefined){
tabla+="<td style='width:12.5%;'></td>";
}
if(resmiercoles[4]!=undefined){
$('#checkbox3').attr('checked', true);
}

if(resjueves[1]!=undefined){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resjueves[1]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resjueves[2]+"</div>"+
"<div class='item5' id='it5'>"+resjueves[3]+"</div>"+
//"<div class='item8' id='it8'>Fecha</div>"+
//"<div class='item9' id='it9'>"+resjueves[4]+"</div>"+
"<div class='item8' id='it8'>ID. Receta</div>"+
"<div class='item9' id='it9'>"+resjueves[6]+"</div>"+
"</div>"+
"</td>";
}
if(resjueves[1]==undefined){
tabla+="<td style='width:12.5%;'></td>";
}
if(resjueves[4]!=undefined){
$('#checkbox4').attr('checked', true);
}

if(resviernes[1]!=undefined){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resviernes[1]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resviernes[2]+"</div>"+
"<div class='item5' id='it5'>"+resviernes[3]+"</div>"+
//"<div class='item8' id='it8'>Fecha</div>"+
//"<div class='item9' id='it9'>"+resviernes[4]+"</div>"+
"<div class='item8' id='it8'>ID. Receta</div>"+
"<div class='item9' id='it9'>"+resviernes[6]+"</div>"+
"</div>"+
"</td>";
}
if(resviernes[1]==undefined){
tabla+="<td style='width:12.5%;'></td>";
}
if(resviernes[4]!=undefined){
$('#checkbox5').attr('checked', true);
}

if(ressabado[1]!=undefined){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+ressabado[1]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+ressabado[2]+"</div>"+
"<div class='item5' id='it5'>"+ressabado[3]+"</div>"+
//"<div class='item8' id='it8'>Fecha</div>"+
//"<div class='item9' id='it9'>"+ressabado[4]+"</div>"+
"<div class='item8' id='it8'>ID. Receta</div>"+
"<div class='item9' id='it9'>"+ressabado[6]+"</div>"+
"</div>"+
"</td>";
}
if(ressabado[1]==undefined){
tabla+="<td style='width:12.5%;'></td>";
}
if(ressabado[4]!=undefined){
$('#checkbox6').attr('checked', true);
}

if(resdomingo[1]!=undefined){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item1' id='it1'>"+resdomingo[1]+"</div>"+
"<div class='item2' id='it2'>Costo</div>"+
"<div class='item3' id='it3'>Personas</div>"+
"<div class='item4' id='it4'>"+resdomingo[2]+"</div>"+
"<div class='item5' id='it5'>"+resdomingo[3]+"</div>"+
//"<div class='item8' id='it8'>Fecha</div>"+
//"<div class='item9' id='it9'>"+resdomingo[4]+"</div>"+
"<div class='item8' id='it8'>ID. Receta</div>"+
"<div class='item9' id='it9'>"+resdomingo[6]+"</div>"+
"</div>"+
"</td>";
}
if(resdomingo[1]==undefined){
tabla+="<td style='width:12.5%;'></td>";
}
if(resdomingo[4]!=undefined){
$('#checkbox7').attr('checked', true);
}

tabla+="</tr>";
});
$('#tabla').html(tabla);
},
});

});

$("#eliminar").click(function(){
$.ajax({
url : 'menu/php/eliminarmenu.php',
type : 'POST',
data :{
idMenu:$('#idm').val()
},
success:function(respuesta){
$("#contenedor").load('menu/view/eliminarmenu.php');
},
});
});

</script>