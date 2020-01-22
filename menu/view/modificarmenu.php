
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
            Modificar menu
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
                    <select class="form-control" id="cliente" style="height: 28px;">
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
                    <input type="text" list="idmenu" class="form-control" id="idm" readonly autocomplete="off" style="height: 28px;">
                    <datalist id="idmenu">
                    </datalist>
                    <input type='text' class="form-control" id="idm1" style="height: 24px"/>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*SubUnidad:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="subunidad" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;" >
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
                    <option disabled selected> -- Seleccione tiempo -- </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    </select>
                    </div>
                    <div class="col-md-5 col-sm-12" style='color:#337ab7;'>
                    <label style="color: #337ab7;margin-right: 8px;">*dias:</label>
                    lunes
                    <input type="checkbox" name=""  id="lunes" >
                    martes
                    <input type="checkbox" name=""  id="martes" >
                    miercoles
                    <input type="checkbox" name=""  id="miercoles" >
                    jueves
                    <input type="checkbox" name=""  id="jueves" >
                    viernes
                    <input type="checkbox" name=""  id="viernes" >
                    sabando
                    <input type="checkbox" name=""  id="sabado" >
                    domingo
                    <input type="checkbox" name=""  id="domingo" >
                    </div>
                    <div class="col-md-2 col-sm-12">
                    <button style="float: left;height:34px;" class="btn btn-primary" id="agregar" >Agregar tiempo</button>       
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

<button style="float: right;height:34px;" class="btn btn-primary" id="copiar" >Modificar menu</button>

</div>
<!-- /.col-lg-12 -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js"></script>
<script>

$("#idm1").hide();

ano="";
semana="";
band=0;

band1=0;
band2=0;
band3=0;
band4=0;
band5=0;
band6=0;
band7=0;

tiempo1="";

lunes="";
martes="";
miercoles="";
jueves="";
viernes="";
sabado="";
domingo="";

$("#lunes").click(function() { 
if ($("#lunes").is( ":checked")){ 
band1=1;
}else{
band1=0;
} 
});
$("#martes").click(function() { 
if ($("#martes").is( ":checked")){ 
band2=1;
}else{
band2=0;
} 
}); 
$("#miercoles").click(function() { 
if ($("#miercoles").is( ":checked")){ 
band3=1;
}else{
band3=0;
} 
}); 
$("#jueves").click(function() { 
if ($("#jueves").is( ":checked")){ 
band4=1;
}else{
band4=0;
} 
}); 
$("#viernes").click(function() { 
if ($("#viernes").is( ":checked")){ 
band5=1;
}else{
band5=0;
} 
}); 
$("#sabado").click(function() { 
if ($("#sabado").is( ":checked")){ 
band6=1;
}else{
band6=0;
} 
}); 
$("#domingo").click(function() { 
if ($("#domingo").is( ":checked")){ 
band7=1;
}else{
band7=0;
} 
});

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
if((ano!="")&&(semana!="")&&($('#cliente').val()!=null)){
if(band==0){
buscar();
}
}
},
});
});

$('#cliente').on('change',function(){
if((ano!="")&&(semana!="")&&($('#cliente').val()!=null)){
if(band==0){
buscar();
}
}
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
$("#cliente").attr("disabled", true); 
$("#anio").attr("disabled", true); 
},
});

$.ajax({
url : 'menu/php/consultarmenu7.php',
data : {idMenu:$('#idm').val()},
type : 'POST',
async:false,
success:function(respuesta){
vec=respuesta.split(",");

if(vec[0]==1){
band1=1;
$('#lunes').prop('checked', true);
}
if(vec[1]==1){
band2=1;
$('#martes').prop('checked', true);
}
if(vec[2]==1){
band3=1;
$('#miercoles').prop('checked', true);
}
if(vec[3]==1){
band4=1;
$('#jueves').prop('checked', true);
}
if(vec[4]==1){
band5=1;
$('#viernes').prop('checked', true);
}
if(vec[5]==1){
band6=1;
$('#sabado').prop('checked', true);
}
if(vec[6]==1){
band7=1;
$('#domingo').prop('checked', true);
}
},
});

}

$('#idm').on('input',function(){
buscar1();
buscar();
$("#tiem").attr("disabled", false); 
});

$('#agregar').on('click',function(){
buscar1();
});

function buscar1(){

$('#tabla').html("");

$("#cliente").prop( "disabled", true );
$("#anio").prop( "disabled", true );

contador=0;
cont=0;

$.ajax({
url : 'menu/php/consultarmenu6.php',
data : {idMenu:$('#idm').val()},
type : 'POST',
async:false,
success:function(respuesta){
vec=respuesta.split(",");

var diasEntreFechas = function(desde, hasta) {
var dia_actual = desde;
var fechas = [];
while (dia_actual.isSameOrBefore(hasta)) {
fechas.push(dia_actual.format('YYYY-MM-DD'));
dia_actual.add(1, 'days');
}
return fechas;
};

var desde = moment("2020-01-06");
var hasta = moment("2020-01-12");
var results = diasEntreFechas(desde, hasta);

lunes=results[0];
martes=results[1];
miercoles=results[2];
jueves=results[3];
viernes=results[4];
sabado=results[5];
domingo=results[6];

},
});

$.ajax({
url : 'menu/php/consultarmenu8.php',
data : {idmenu:$('#idm').val()},
type : 'POST',
async:false,
success:function(respuesta){
vec=respuesta.split(",");
$('#anio').val(vec[7]);
$('#semana').val(vec[0]);
$('#costo').val(vec[2]);
$('#elaboro').val(vec[3]);
if(band==0){
$('#tiem option[value='+vec[1]+']').prop('selected', 'selected').change();
tiempo1=vec[1];
}
if(band==1){
tiempo1=$('#tiem').val();
}
$('#cliente').html("<option>"+vec[8]+"</option>");
$('#unidad').html("<option>"+vec[4]+"</option>");
$('#subunidad').html("<option>"+vec[5]+"</option>");
$('#grupo').html("<option>"+vec[6]+"</option>");

subunidad=vec[9];

},
});

$.ajax({

url : 'menu/php/consultarmenu9.php',
data : {
idMenu:$('#idm').val(),
tiempo:tiempo1
},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);

tabla="";

$.each(res,function(key,value){

reslunes=value.lunes.split(",");
resmartes=value.martes.split(",");
resmiercoles=value.miercoles.split(",");
resjueves=value.jueves.split(",");
resviernes=value.viernes.split(",");
ressabado=value.sabado.split(",");
resdomingo=value.domingo.split(",");

contador=contador+1;

tiempo="";


if((reslunes[5]!="")&&(reslunes[5]!=undefined)){
tiempo=reslunes[5];
}
if((resmartes[5]!="")&&(resmartes[5]!=undefined)){
tiempo=resmartes[5];
}
if((resmiercoles[5]!="")&&(resmiercoles[5]!=undefined)){
tiempo=resmiercoles[5];
}
if((resjueves[5]!="")&&(resjueves[5]!=undefined)){
tiempo=resjueves[5];
}
if((resviernes[5]!="")&&(resviernes[5]!=undefined)){
tiempo=resviernes[5];
}
if((ressabado[5]!="")&&(ressabado[5]!=undefined)){
tiempo=ressabado[5];
}
if((resdomingo[5]!="")&&(resdomingo[5]!=undefined)){
tiempo=resdomingo[5];
}

tabla+="<tr>";

tabla+="<td style='width:12.5%;'>"+
"<br>"+
"<select class='tiempo' id="+contador+" name="+"tiempo"+tiempo+" style='height:24px;width:110px;'>"+
"</select>"+
"</td>";

if((reslunes[1]!=undefined)&&(band1!=0)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" value="+reslunes[6]+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' value='"+reslunes[1]+"' id="+"receta"+cont+" class='receta' autocomplete='off' required>"+
"<datalist id="+"browsers"+contador+" ></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+reslunes[2]+"' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' value='"+reslunes[3]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none;' value='"+lunes+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if((reslunes[1]==undefined)&&(band1==1)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" autocomplete='off' required>"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' id="+"receta"+cont+" autocomplete='off' class='receta' required>"+
"<datalist id="+"browsers"+contador+" class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' required pattern='^[0-9]{0,3}$' id="+"personas"+cont+" maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+lunes+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if(band1==0){
tabla+="<td style='width:12.5%;'></td>";
}

if((resmartes[1]!=null)&&(band2!=0)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" value="+resmartes[6]+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' value='"+resmartes[1]+"' id="+"receta"+cont+" class='receta' autocomplete='off' required>"+
"<datalist id="+"browsers"+contador+"></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resmartes[2]+"' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' value='"+resmartes[3]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+martes+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if((resmartes[1]==undefined)&&(band2==1)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' id="+"receta"+cont+" autocomplete='off' class='receta' required>"+
"<datalist id="+"browsers"+contador+" class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' id="+"costo"+cont+" >"+
"<input style='width:65px' required pattern='^[0-9]{0,3}$' id="+"personas"+cont+" maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+martes+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if(band2==0){
tabla+="<td style='width:12.5%;'></td>";
}

if((resmiercoles[1]!=undefined)&&(band3!=0)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" value="+resmiercoles[6]+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' value='"+resmiercoles[1]+"' id="+"receta"+cont+" class='receta' autocomplete='off' required>"+
"<datalist id="+"browsers"+contador+" ></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resmiercoles[2]+"' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' value='"+resmiercoles[3]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+miercoles+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if((resmiercoles[1]==undefined)&&(band3==1)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" autocomplete='off' required>"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' id="+"receta"+cont+" autocomplete='off' class='receta' required>"+
"<datalist id="+"browsers"+contador+" class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' required pattern='^[0-9]{0,3}$' id="+"personas"+cont+" maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+miercoles+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if(band3==0){
tabla+="<td style='width:12.5%;'></td>";
}

if((resjueves[1]!=undefined)&&(band4!=0)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" value="+resjueves[6]+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' value='"+resjueves[1]+"' id="+"receta"+cont+" class='receta' autocomplete='off' required>"+
"<datalist id="+"browsers"+contador+" ></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resjueves[2]+"' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' value='"+resjueves[3]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+jueves+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if((resjueves[1]==undefined)&&(band4==1)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" autocomplete='off' required>"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' id="+"receta"+cont+" autocomplete='off' class='receta' required>"+
"<datalist id="+"browsers"+contador+" class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' required pattern='^[0-9]{0,3}$' id="+"personas"+cont+" maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+jueves+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if(band4==0){
tabla+="<td style='width:12.5%;'></td>";
}


if((resviernes[1]!=undefined)&&(band5!=0)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" value="+resviernes[6]+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' value='"+resviernes[1]+"' id="+"receta"+cont+" class='receta' autocomplete='off' required>"+
"<datalist id="+"browsers"+contador+" ></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resviernes[2]+"' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' value='"+resviernes[3]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+viernes+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if((resviernes[1]==undefined)&&(band5==1)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" autocomplete='off' required>"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' id="+"receta"+cont+" autocomplete='off' class='receta' required>"+
"<datalist id="+"browsers"+contador+" class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' required pattern='^[0-9]{0,3}$' id="+"personas"+cont+" maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+viernes+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if(band5==0){
tabla+="<td style='width:12.5%;'></td>";
}

if((ressabado[1]!=undefined)&&(band6!=0)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" value="+ressabado[6]+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' value='"+ressabado[1]+"' id="+"receta"+cont+" class='receta' autocomplete='off' required>"+
"<datalist id="+"browsers"+contador+" ></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+ressabado[2]+"' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' value='"+ressabado[3]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+sabado+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if((ressabado[1]==undefined)&&(band6==1)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" autocomplete='off' required>"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' id="+"receta"+cont+" autocomplete='off' class='receta' required>"+
"<datalist id="+"browsers"+contador+" class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' required pattern='^[0-9]{0,3}$' id="+"personas"+cont+" maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+sabado+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if(band6==0){
tabla+="<td style='width:12.5%;'></td>";
}


if((resdomingo[1]!=undefined)&&(band7!=0)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" value="+resdomingo[6]+" >"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' value='"+resdomingo[1]+"' id="+"receta"+cont+" class='receta' autocomplete='off' required>"+
"<datalist id="+"browsers"+contador+" ></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resdomingo[2]+"' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' value='"+resdomingo[3]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+domingo+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if((resdomingo[1]==undefined)&&(band7==1)){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:12.5%;'>"+
"Receta"+
"<br>"+
"<input style='width:42%;margin-bottom:5px' id="+"id"+cont+" autocomplete='off' required>"+
"<input list="+"browsers"+contador+" style='width:42%;margin-bottom:5px' id="+"receta"+cont+" autocomplete='off' class='receta' required>"+
"<datalist id="+"browsers"+contador+" class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' id="+"costo"+cont+" disabled>"+
"<input style='width:65px' required pattern='^[0-9]{0,3}$' id="+"personas"+cont+" maxlength='3'>"+
"<br>"+
//"Fecha"+
//"<br>"+
"<input style='width:80px;background-color:white;display:none' value='"+domingo+"' class="+"fechas"+cont+" disabled>"+
"</td>";
}
if(band7==0){
tabla+="<td style='width:12.5%;'></td>";
}

tabla+="</tr>";

});

$('#tabla').html(tabla);

$('.receta').on('input',function(){
id=$(this).attr('id');
id=id.replace("receta","");
if($(this).val()==""){
$('#id'+id).val("");
$('#costo'+id).val(0);
$('#personas'+id).val(0);
}else{
$.ajax({
url : 'menu/php/agregarmenu18.php',
data : {
nombre:$(this).val()
},
type : 'POST',
success:function(respuesta){
res=respuesta.split(",");
$('#id'+id).val(res[0]);
$('#costo'+id).val(res[1]);
},
});
}
});

$('.tiempo').on('input',function(){
fila=$(this).attr('id');
$.ajax({
url : 'menu/php/agregarmenu7.php',
data : {
subunidad:subunidad,
tiempo:$(this).children("option:selected").val()
},
type : 'POST',
dataType: 'json',
async:false,
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
nombre="";
$.each(res,function(key,value){
nombre+="<option>"+value.nombre+"</option>";
});
$('#browsers'+fila).html(nombre);
},
});
});

$.ajax({
url : 'menu/php/tiempos.php',
data : {},
type : 'POST',
dataType: 'json',
async:false,
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);
tiempos="";
tiempos+="<option disabled selected> -- Selecione tiempo -- </option>";
$.each(res,function(key,value){
tiempos+="<option value="+value.idTiempo+" >"+value.descripcion+"</option>";
});
$('.tiempo').html(tiempos);
},
});

for (i=1;i<=contador;i++){
auxiliar1=$('#'+i).attr('name').replace("tiempo","");
$('#'+i+' option[value='+auxiliar1+']').prop('selected', 'selected').change();
}

},
});

band=1;

}

$("#copiar").click(function(){

temp1="";
temp2="";
temp3="";
temp4="";
bandc=0;
bandrec=0;
tiemposf="";

for (i=1;i<=cont;i++){
if (i==1){
temp1=$('#receta'+i).val();
}
if (i>1){
temp1+=","+$('#receta'+i).val();
}
if (i==1){
temp2=$('#costo'+i).val();
}
if (i>1){
temp2+=","+$('#costo'+i).val();
}
if (i==1){
temp3=$('#personas'+i).val();
}
if (i>1){
temp3+=","+$('#personas'+i).val();
}
if (i==1){
temp4=$('.fechas'+i).val();
}
if (i>1){
temp4+=","+$('.fechas'+i).val();
}
}

for (var i=1;i<=cont;i++){
if(i==1){
costot=Number($('#costo'+i).val())*Number($('#personas'+i).val());
}
if(i>1){
costot=costot+Number($('#costo'+i).val())*Number($('#personas'+i).val());
}
}

$.ajax({
url : 'menu/php/existe1.php',
data : {
idMenu: $('#idm').val()
},
type : 'POST',
async:false,
success:function(respuesta){
if(respuesta==0){
bandc=1;
alert("Menu no existe");
}
},
});

var receta = [temp1];
var receta = JSON.stringify(receta);
var costo = [temp2];
var costo = JSON.stringify(costo);
var personas = [temp3];
var personas = JSON.stringify(personas);
var fechas = [temp4];
var fechas = JSON.stringify(fechas);

if((bandc!=1)&&(bandrec!=1)){
$.ajax({
url : 'menu/php/modificarmenu2.php',
type : 'POST',
data : {
idMenu:$('#idm').val(),
tiempo:$('#tiem').val(),
fecha:fecha,
costot:costot,
receta:receta,
costo:costo,
personas:personas,
fechas:fechas,
lunes:band1,
martes:band2,
miercoles:band3,
jueves:band4,
viernes:band5,
sabado:band6,
domingo:band7
},
success:function(respuesta){
if(respuesta==0){
Swal.fire("Exito", 'Menu modificado correctamente', 'success');
}
if(respuesta==1){
alert("Receta no existe");
}
},
});
}

});

$("#exportar").click(function(){
$('#subunidad').click();
});

</script>