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
            Consultar menu
            </div>
            <div class="panel-body" style="padding: 10px; padding-bottom: 4px;">
                    
                    <div class="row" style="margin-bottom: 5px;"> 
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Fecha:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" style="height: 24px" id="fecha" autocomplete="off" readonly />
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
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                    </div>
                    
                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Año:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="" id="ano" style="height: 24px;" disabled>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Unidad:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="unidad" style="height: 28px;" >
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
                    <label style="color: #337ab7;">*Semana:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input class="form-control" placeholder="" id="semana" style="height: 24px;" disabled>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*SubUnidad:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="subunidad" style="height: 28px;" >
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*Grupo:</labelp>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="grupo" style="height: 28px;">
                    <option disabled selected></option>
                    </select>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                    </div>


                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*ID menu:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <input list="idmenu" class="form-control" id="idm" autocomplete="off" readonly placeholder=" -- Seleccione menu --" autocomplete="off" style="height: 28px;">
                    <datalist id="idmenu">
                    </datalist>
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
                    <button style="float: left;height:29px;" class="btn btn-primary" id="exportar">Exportar menu</button>
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

</div>
<!-- /.col-lg-12 -->
</div>


<script>

temp=0;

id="";
idMenu="";
semana="";
numTiempos="";
lapso="";
elaboro="";
descripcion="";
cliente="";
unidad="";
subunidad="";
costo="";

ano="";
semana="";

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
url : 'menu/php/agregarmenu1.php',
data : {},
type : 'POST',
dataType: 'json',
async:false,
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
grupo="";
grupo+="<option disabled selected> -- Selecione grupo -- </option>";
$.each(res,function(key,value){
grupo+="<option value="+value.idGrupo+">"+value.descripcion+"</option>";
});
$('#grupo').html(grupo);
},
});

$.ajax({
url : 'menu/php/agregarmenu2.php',
data : {},
type : 'POST',
dataType: 'json',
async:false,
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

$.ajax({
url : 'menu/php/agregarmenu3.php',
data : {nombre:$('#cliente').val()},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
unidad="";
$.each(res,function(key,value){
unidad+="<option value="+value.idunidad+">"+value.unidad+"</option>";
});
$('#unidad').html(unidad);

$.ajax({
url : 'menu/php/agregarmenu4.php',
data : {nombre:$('#unidad').val()},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
unidad="";
$.each(res,function(key,value){
unidad+="<option value="+value.idsubunidad+">"+value.subunidad+"</option>";
});
$('#subunidad').html(unidad);
$('#agregar').click();
if((ano!=null)&&(semana!=null)&&($('#cliente').val()!=null)&&($('#unidad').val()!=null)&&($('#subunidad').val()!=null)&&($('#grupo').val()!=null)){
id=ano+"_"+semana+"_"+$('#cliente').val()+"_"+$('#unidad').val()+"_"+$('#subunidad').val()+"_"+$('#grupo').val();
$("#idm").removeAttr("readonly");
buscar();
}
},
});

},
});
});

$('#unidad').on('change',function(){
$.ajax({
url : 'menu/php/agregarmenu4.php',
data : {nombre:$('#unidad').val()},
type : 'POST',
dataType: 'json',
async:false,
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
unidad="";
$.each(res,function(key,value){
unidad+="<option value="+value.idsubunidad+">"+value.subunidad+"</option>";
});
$('#subunidad').html(unidad);
$('#agregar').click();
if((ano!=null)&&(semana!=null)&&($('#cliente').val()!=null)&&($('#unidad').val()!=null)&&($('#subunidad').val()!=null)&&($('#grupo').val()!=null)){
id=ano+"_"+semana+"_"+$('#cliente').val()+"_"+$('#unidad').val()+"_"+$('#subunidad').val()+"_"+$('#grupo').val();
$("#idm").removeAttr("readonly");
$('#idm').val(id);
buscar();
}
},
});
});

$('#subunidad').on('change',function(){
$('#agregar').click();
if((ano!=null)&&(semana!=null)&&($('#cliente').val()!=null)&&($('#unidad').val()!=null)&&($('#subunidad').val()!=null)&&($('#grupo').val()!=null)){
id=ano+"_"+semana+"_"+$('#cliente').val()+"_"+$('#unidad').val()+"_"+$('#subunidad').val()+"_"+$('#grupo').val();
$("#idm").removeAttr("readonly");
$('#idm').val(id);
buscar();
}
});

$('#grupo').on('change',function(){
$('#agregar').click();
if((ano!=null)&&(semana!=null)&&($('#cliente').val()!=null)&&($('#unidad').val()!=null)&&($('#subunidad').val()!=null)&&($('#grupo').val()!=null)){
id=ano+"_"+semana+"_"+$('#cliente').val()+"_"+$('#unidad').val()+"_"+$('#subunidad').val()+"_"+$('#grupo').val();
$("#idm").removeAttr("readonly");
$('#idm').val(id);
buscar();
}
});

$('#fecha').on('change',function(){
fecha=$('#fecha').val();
$.ajax({
url : 'menu/php/agregarmenu5.php',
data : {semana:$('#fecha').val()},
type : 'POST',
success:function(respuesta){
vector=respuesta.split(",");
$('#semana').val(vector[0]);
$('#ano').val(vector[2]);
semana=vector[0];
ano=vector[2];
if((ano!=null)&&(semana!=null)&&($('#cliente').val()!=null)&&($('#unidad').val()!=null)&&($('#subunidad').val()!=null)&&($('#grupo').val()!=null)){
id=ano+"_"+semana+"_"+$('#cliente').val()+"_"+$('#unidad').val()+"_"+$('#subunidad').val()+"_"+$('#grupo').val();
$("#idm").removeAttr("readonly");
$('#idm').val(id);
buscar();
}
},
});
});

$('#idm').on('input',function(){
buscar();
});

function buscar(){

$.ajax({
url : 'menu/php/consultarmenu2.php',
data : {idmenu:$('#idm').val()},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
$.each(res,function(key,value){

$('#elaboro').val(value.elaboro);
$('#costo').val(value.costoTot);
$('#tiem').html("<option>"+value.numTiempos+"</option>");
temp=value.numTiempos;

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

if (reslunes[5]!=undefined){
temporal=reslunes[5];
}
if (resmartes[5]!=undefined){
temporal=resmartes[5];
}
if (resmiercoles[5]!=undefined){
temporal=resmiercoles[5];
}
if (resjueves[5]!=undefined){
temporal=resjueves[5];
}
if (resviernes[5]!=undefined){
temporal=resviernes[5];
}
if (ressabado[5]!=undefined){
temporal=ressabado[5];
}
if (resdomingo[5]!=undefined){
temporal=resdomingo[5];
}

tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div>"+temporal+"</div>"+
"</div>"+
"</td>";

if(reslunes[0]!=""){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
"<div class='grid-container'>"+
"<div class='item7' id='it7'>ID</div>"+
"<div class='item6' id='it6'>"+reslunes[3]+"</div>"+
"<div class='item1' id='it1'>"+reslunes[0]+"</div>"+
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
tabla+="<td style='width:12.5%;'></td>";
}
if(reslunes[0]!=""){
$('#checkbox1').attr('checked', true);
}
if(resmartes[0]!=""){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
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
tabla+="<td style='width:12.5%;'></td>";
}
if(resmartes[0]!=""){
$('#checkbox2').attr('checked', true);
}
if(resmiercoles[0]!=""){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
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
tabla+="<td style='width:12.5%;'></td>";
}
if(resmiercoles[0]!=""){
$('#checkbox3').attr('checked', true);
}
if(resjueves[0]!=""){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
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
tabla+="<td style='width:12.5%;'></td>";
}
if(resjueves[0]!=""){
$('#checkbox4').attr('checked', true);
}
if(resviernes[0]!=""){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
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
tabla+="<td style='width:12.5%;'></td>";
}
if(resviernes[0]!=""){
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
tabla+="<td style='width:12.5%;'></td>";
}
if(ressabado[0]!=""){
$('#checkbox6').attr('checked', true);
}
if(resdomingo[0]!=""){
tabla+="<td style='color:#337ab7;width:12.5%;'>"+
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
"</td>";
}
if(resdomingo[0]==""){
tabla+="<td style='width:12.5%;'></td>";
}
if(resdomingo[0]!=""){
$('#checkbox7').attr('checked', true);
}
tabla+="</tr>";
});
$('#tabla').html(tabla);
},
});

},
});

}

$("#exportar").click(function(){
$.ajax({
data : {},
type : 'GET',
success:function(respuesta){
window.open('menu/php/menuexcel.php?semana='+semana+'&numTiempos='+numTiempos+'&idMenu='+idMenu+'&cliente='+cliente+'&unidad='+unidad+'&subunidad='+subunidad+'&lapso='+lapso+'&elaboro='+elaboro+
                                           '&descripcion='+descripcion+'&costoTot='+costoTot);
},
});
});

</script>