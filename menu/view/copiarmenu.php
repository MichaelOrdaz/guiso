<style type="text/css">
div#contenedor label, div#contenedor li, div#contenedor h5, div#contenedor p, div#contenedor td, div#contenedor th {
color: black;
}
</style>

<div class="row" style="margin-top: 31px;">
    <div class="col-lg-12">
        <div class="panel panel-default" style="margin-bottom: 8px;">
            <div class="panel-heading" style="text-align: center; background-color: #EE7561; color: white;">
            Copia de menus
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
                    <select class="form-control" id="unidad" style="height: 28px;">
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
                    <label style="color: #337ab7;">*Grupo:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="grupo" style="height: 28px;" >
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
                    <input list="idMenu" class="form-control" id="idm" placeholder=" -- Seleccione menu --" autocomplete="off" style="height: 28px;">
                    <datalist id="idMenu">
                    </datalist>
                    </div>
                    </div>

                    <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-1 col-sm-12" style="margin-top: 6px;">
                    <label style="color: #337ab7;">*# Tiempos:</label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <select class="form-control" id="tiemp" style="height: 28px;" disabled>
                    <option disabled selected></option>
                    </select>
                    </div>
                    <div class="col-md-5 col-sm-12" style='color:#337ab7;'>
                    <label style="color: #337ab7;margin-right: 8px;">*dias:</label>
                    lunes
                    <input type="checkbox" name=""  id="checkbox1" >
                    martes
                    <input type="checkbox" name=""  id="checkbox2" >
                    miercoles
                    <input type="checkbox" name=""  id="checkbox3" >
                    jueves
                    <input type="checkbox" name=""  id="checkbox4" >
                    viernes
                    <input type="checkbox" name=""  id="checkbox5" >
                    sabando
                    <input type="checkbox" name=""  id="checkbox6" >
                    domingo
                    <input type="checkbox" name=""  id="checkbox7" >
                    </div>
                    <div class="col-md-2 col-sm-12">
                    <button type="submit" class="btn btn-default" style="color: #337ab7;height: 32px;" id="agregar">Agregar Tiempo</button>
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

<BUTTON style="float: right;margin-bottom: 20px; background-color:#337ab7;" class="btn btn-primary" id="copiar"> Copiar menu </BUTTON>

</div>
<!-- /.col-lg-12 -->
</div>

<script>

temporal1="";

contador1=0;

lunes1=0;
band1=0;
martes1=0;
band2=0;
miercoles1=0;
band3=0;
jueves1=0;
band4=0;
viernes1=0;
band5=0;
sabado1=0;
band6=0;
domingo1=0;
band7=0;

$("#checkbox1").click(function() { 
band1=1;
if ($("#checkbox1").is( ":checked")){ 
lunes1=1;
}else{
lunes1=0;
} 
});

$("#checkbox2").click(function() { 
band2=1;
if ($("#checkbox2").is( ":checked")){ 
martes1=1;
}else{
martes1=0;
} 
});

$("#checkbox3").click(function() { 
band3=1;
if ($("#checkbox3").is( ":checked")){ 
miercoles1=1;
}else{
miercoles1=0;
} 
});

$("#checkbox4").click(function() { 
band4=1;
if ($("#checkbox4").is( ":checked")){ 
jueves1=1;
}else{
jueves1=0;
} 
});

$("#checkbox5").click(function() { 
band5=1;
if ($("#checkbox5").is( ":checked")){ 
viernes1=1;
}else{
viernes1=0;
} 
});

$("#checkbox6").click(function() { 
band6=1;
if ($("#checkbox6").is( ":checked")){ 
sabado1=1;
}else{
sabado1=0;
} 
});

$("#checkbox7").click(function() { 
band7=1;
if ($("#checkbox7").is( ":checked")){ 
domingo1=1;
}else{
domingo1=0;
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
url : 'menu/php/imprimirmenu2.php',
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
tabla1="";
$.each(res,function(key,value){
tabla1+="<option>"+value.idMenu+"</option>";
});
$('#idMenu').html(tabla1);
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
$('#idm').val(id);
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
$('#idm').val(id);
buscar();
}
});

$('#grupo').on('change',function(){
$('#agregar').click();
if((ano!=null)&&(semana!=null)&&($('#cliente').val()!=null)&&($('#unidad').val()!=null)&&($('#subunidad').val()!=null)&&($('#grupo').val()!=null)){
id=ano+"_"+semana+"_"+$('#cliente').val()+"_"+$('#unidad').val()+"_"+$('#subunidad').val()+"_"+$('#grupo').val();
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
$('#idm').val(id);
buscar();
}
},
});
});

$('#agregar').on('click',function(){
buscar();
});

function buscar(){

$.ajax({
url : 'menu/php/modificarmenu.php',
data : {idmenu:$('#idm').val()},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);

$('#checkbox1').attr('checked', false);
$('#checkbox2').attr('checked', false);
$('#checkbox3').attr('checked', false);
$('#checkbox4').attr('checked', false);
$('#checkbox5').attr('checked', false);
$('#checkbox6').attr('checked', false);
$('#checkbox7').attr('checked', false);

$.each(res,function(key,value){

$('#costo').val(value.costo);
$('#elaboro').val(value.elaboro);
$('#tiemp').html("<option>"+value.numTiempos+"</option>");

idsubunidad=value.idsubunidad;
lapsoi=value.lapsoi;
lapso=value.lapso;

res=lapso.split(",");
lapsolunes=res[1];
lapsomartes=res[2];
lapsomiercoles=res[3];
lapsojueves=res[4];
lapsoviernes=res[5];
lapsosabado=res[6];
lapsodomingo=res[7];

if(band1==0){
lunes=value.lunes;
}
if(band1==1){
lunes=lunes1;
}

if(band2==0){
martes=value.martes;
}
if(band2==1){
martes=martes1;
}

if(band3==0){
miercoles=value.miercoles;
}
if(band3==1){
miercoles=miercoles1;
}

if(band4==0){
jueves=value.jueves;
}
if(band4==1){
jueves=jueves1;
}

if(band5==0){
viernes=value.viernes;
}
if(band5==1){
viernes=viernes1;
}

if(band6==0){
sabado=value.sabado;
}
if(band6==1){
sabado=sabado1;
}

if(band7==0){
domingo=value.domingo;
}
if(band7==1){
domingo=domingo1;
}

if(lunes==1){
$('#checkbox1').attr('checked', true);
}
if(martes==1){
$('#checkbox2').attr('checked', true);
}
if(miercoles==1){
$('#checkbox3').attr('checked', true);
}
if(jueves==1){
$('#checkbox4').attr('checked', true);
}
if(viernes==1){
$('#checkbox5').attr('checked', true);
}
if(sabado==1){
$('#checkbox6').attr('checked', true);
}
if(domingo==1){
$('#checkbox7').attr('checked', true);
}

});

$.ajax({
url : 'menu/php/modificarmenu1.php',
data : {idmenu:$('#idm').val()},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
res=JSON.parse(respuesta);

tabla="";
cont=0;

$.each(res,function(key,value){

tabla+="<tr>";

reslunes=value.lunes;
reslunes=reslunes.split(",");
resmartes=value.martes;
resmartes=resmartes.split(",");
resmiercoles=value.miercoles;
resmiercoles=resmiercoles.split(",");
resjueves=value.jueves;
resjueves=resjueves.split(",");
resviernes=value.viernes;
resviernes=resviernes.split(",");
ressabado=value.sabado;
ressabado=ressabado.split(",");
resdomingo=value.domingo;
resdomingo=resdomingo.split(",");

contador1=contador1+1;

if (reslunes[3]!=undefined){
temporal=reslunes[3];
}
if (resmartes[3]!=undefined){
temporal=resmartes[3];
}
if (resmiercoles[3]!=undefined){
temporal=resmiercoles[3];
}
if (resjueves[3]!=undefined){
temporal=resjueves[3];
}
if (resviernes[3]!=undefined){
temporal=resviernes[3];
}
if (ressabado[3]!=undefined){
temporal=ressabado[3];
}
if (resdomingo[3]!=undefined){
temporal=resdomingo[3];
}

if(contador1==1){
temporal1=temporal;
}
if(contador1>1){
temporal1+=","+temporal;
}

tabla+="<td style='width:12.5%;'>"+
"<div class='grid-container'>"+
"<br>"+
"<select style='width:100%;height:24px;' class='tiempos1' id="+contador1+" required>"+
"</select>"+
"</div>"+
"</td>";

if((lunes==1)&&(reslunes[0]!="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='"+reslunes[0]+"' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+reslunes[1]+"' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='"+reslunes[2]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if((lunes==1)&&(reslunes[0]=="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(lunes==0){
tabla+="<td style='height:24px'></td>";    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if((martes==1)&&(resmartes[0]!="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='"+resmartes[0]+"' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resmartes[1]+"' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='"+resmartes[2]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsomartes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if((martes==1)&&(resmartes[0]=="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(martes==0){
tabla+="<td style='height:24px'></td>";    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if((miercoles==1)&&(resmiercoles[0]!="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='"+resmiercoles[0]+"' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resmiercoles[1]+"' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='"+resmiercoles[2]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsomiercoles+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if((miercoles==1)&&(resmiercoles[0]=="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(miercoles==0){
tabla+="<td style='height:24px'></td>";    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if((jueves==1)&&(resjueves[0]!="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='"+resjueves[0]+"' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resjueves[1]+"' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='"+resjueves[2]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsojueves+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if((jueves==1)&&(resjueves[0]=="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(jueves==0){
tabla+="<td style='height:24px'></td>";    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if((viernes==1)&&(resviernes[0]!="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='"+resviernes[0]+"' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resviernes[1]+"' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='"+resviernes[2]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsoviernes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if((viernes==1)&&(resviernes[0]=="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(viernes==0){
tabla+="<td style='height:24px'></td>";    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if((sabado==1)&&(ressabado[0]!="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='"+ressabado[0]+"' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+ressabado[1]+"' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='"+ressabado[2]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsosabado+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if((sabado==1)&&(ressabado[0]=="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(sabado==0){
tabla+="<td style='height:24px'></td>";    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if((domingo==1)&&(resdomingo[0]!="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='"+resdomingo[0]+"' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='"+resdomingo[1]+"' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='"+resdomingo[2]+"' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if((domingo==1)&&(resdomingo[0]=="")){
cont=cont+1;
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsolunes+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(domingo==0){
tabla+="<td style='height:24px'></td>";    
}

tabla+="</tr>";

});

$('#tabla').html(tabla);

$.ajax({
url : 'menu/php/agregarmenu12.php',
data : {},
type : 'POST',
dataType: 'json',
success:function(respuesta){
respuesta="["+respuesta+"]";
respuesta=JSON.parse(respuesta);
temp="";
temp+="<option disabled selected> -- Tiempos -- </option>";
$.each(respuesta,function(key,value){
temp+="<option value="+value.idTiempo+">"+value.tiempo+"</option>";
});
$('.tiempos1').html(temp);
vector=temporal1.split(",");
for (var i=1;i<=vector.length;i++){
$('#'+i+' > option[value='+vector[i-1]+']').attr('selected', 'selected');
}
},
});

for (i=1;i<$('#tiemp').val();i++){
tabla+="<tr>";

tabla+=
"<td style='height:24px;width:12.5%;'>"+
"<br>"+
"<select style='width:100%;height:24px;' class='tiempos' required>"+
"</select>"+
"</td>";

if(lunes==1){
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(lunes==0){
tabla+="<td style='width:14%;'></td>"; 
}
if(martes==1){
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(martes==0){
tabla+="<td style='width:14%;'></td>"; 
}
if(miercoles==1){
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(miercoles==0){
tabla+="<td style='width:14%;'></td>"; 
}
if(jueves==1){
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(jueves==0){
tabla+="<td style='width:14%;'></td>"; 
}
if(viernes==1){
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(viernes==0){
tabla+="<td style='width:14%;'></td>"; 
}
if(sabado==1){
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(sabado==0){
tabla+="<td style='width:14%;'></td>"; 
}
if(domingo==1){
tabla+=
"<td style='height:24px;color:#337ab7;width:14%;'>"+
"Receta"+
"<br>"+
"<input list='browsers' style='width:130px;margin-bottom:5px' value='' id="+"recetas"+cont+" class='recetasj' autocomplete='off' required>"+
"<datalist id='browsers' class='recetasg'></datalist>"+
"<br>"+
"<label style='margin-right:30px;color:#337ab7;'>Costo</label><label style='color:#337ab7;'>Personas</label>"+
"<br>"+
"<input style='width:65px;background-color:white;margin-bottom:5px' value='' id="+"precior"+cont+" disabled>"+
"<input style='width:65px' value='' id="+"personas"+cont+" required pattern='^[0-9]{0,3}$' maxlength='3'>"+
"<br>"+
"Fecha"+
"<br>"+
//"<input style='width:80px;background-color:white;' value='"+lapsodomingo+"' class="+"fecha"+cont+" disabled>"+
"</td>";
}
if(domingo==0){
tabla+="<td style='height:24px' ></td>"; 
}
tabla+="</tr>";
$('#tabla').html(tabla);
}

},
});
},
});
}

</script>