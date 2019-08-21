// JavaScript for  SOFTONE

function PreviewImage(ffile, imagen_name,radio_name,imagen_call) {
	var radioval = $('form input[name='+radio_name+']:checked').val();
	var imagen = $('form input[name='+imagen_name+']').val();
//	alert(radioval);

	$.fancybox.open({
		  'type': 'ajax', 
		'speedIn': 500,
		'speedOut': 300,
		width: 350,
				height: 350,

		 'fitToView': false,

//		'autoDimensions': true,
//		'centerOnScroll': true,
		'href' : 'common_ajax.php?caller=preview-modo&modo='+radioval+'&ffile='+ffile+'&imagen='+imagen+"&imagen_call="+imagen_call
	});
	
}


var EW_dateSep; // default date separator
if (EW_dateSep == "") EW_dateSep = "/";

function openCKFinder() {
	
	 CKFinder.Popup( '../../', null, null, function(url) {SetFileField(field, url)} ) ;
//	openWindow('../../adm/dealer/js/ckfinder/ckfinder.html?CKEditor=imagen&CKEditorFuncNum=2&langCode=es', 'finder', "700", "500", "no");

}

function openWindow(mypage, myname, w, h, scroll) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable' //Puede ser noresizable
	win = window.open(mypage, myname, winprops)
	
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}

function EW_submitForm(EW_this) {	
	if (typeof EW_HTMLArea != "undefined") {			
		for (var i=0; i<EW_HTMLArea.length; i++) {
			var html = EW_HTMLArea[i].getHTML();
			if (html == "<p />" || html == "<br />\n") html = "";
			EW_HTMLArea[i]._textArea.value = html;
		}
	}	
	if (EW_checkMyForm(EW_this))
		EW_this.submit();
}

function EW_isHTMLArea(input_object, object_type) {
	return (object_type == "TEXTAREA" && typeof EW_HTMLArea != "undefined" && input_object.style && input_object.style.display && input_object.style.display == "none");
}

function EW_onError(form_object, input_object, object_type, error_message) {

	var CSSError = ' 1px solid #ff0000';
	var CSSNormal = ' 1px solid #CCC';
	var idObj = input_object.id;
	
	if (object_type == "RADIO" || object_type == "CHECKBOX") {
		if (input_object[0]) {
			input_object[0].focus();	
			input_object[0].style.border=CSSError;
		} else {
			input_object.focus();
		}
	}	else if (!EW_isHTMLArea(input_object, object_type)) { 
		input_object.focus();  
		input_object.style.border=CSSError;
	}  else if(object_type == "SELECT") {
		
		input_object.style.border=CSSError;
	}
	if (object_type == "TEXT" || object_type == "PASSWORD" || object_type == "TEXTAREA" || object_type == "FILE") {
		if (!EW_isHTMLArea(input_object, object_type))
			input_object.select();
	}
	
	$('#'+idObj).blur(function() {
	  $('#'+idObj).css({"border":CSSNormal});
	});
	return false;	
}

function EW_hasValue(obj, obj_type) {
	if (obj_type == "TEXT" || obj_type == "PASSWORD" || obj_type == "TEXTAREA" || obj_type == "FILE")	{
		if (obj.value.length == 0) 
			return false;		
		else 
			return true;
	}	else if (obj_type == "SELECT") {
		if (obj.type != "select-multiple" && obj.selectedIndex <= 0)
			return false;
		else if (obj.type == "select-multiple" && obj.selectedIndex == -1)
			return false;
		else
			return true;
	}	else if (obj_type == "RADIO" || obj_type == "CHECKBOX")	{
		if (obj[0]) {
			for (i=0; i < obj.length; i++) {
				if (obj[i].checked)
					return true;
			}
		} else {
			return (obj.checked);
		}
		return false;	
	}
}

// Date (mm/dd/yyyy)
function EW_checkusdate(object_value) {
	if (object_value.length == 0)
		return true;
	
	isplit = object_value.indexOf(EW_dateSep);
	
	if (isplit == -1 || isplit == object_value.length)
		return false;
	
	sMonth = object_value.substring(0, isplit);
	
	if (sMonth.length == 0)
		return false;
	
	isplit = object_value.indexOf(EW_dateSep, isplit + 1);
	
	if (isplit == -1 || (isplit + 1 ) == object_value.length)
		return false;
	
	sDay = object_value.substring((sMonth.length + 1), isplit);
	
	if (sDay.length == 0)
		return false;
	
	isep = object_value.indexOf(' ', isplit + 1); 
	if (isep == -1) {
		sYear = object_value.substring(isplit + 1);
	} else {
		sYear = object_value.substring(isplit + 1, isep);
		sTime = object_value.substring(isep + 1);
		if (!EW_checktime(sTime))
			return false; 
	}
	
	if (!EW_checkinteger(sMonth)) 
		return false;
	else if (!EW_checkrange(sMonth, 1, 12)) 
		return false;
	else if (!EW_checkinteger(sYear)) 
		return false;
	else if (!EW_checkrange(sYear, 0, 9999)) 
		return false;
	else if (!EW_checkinteger(sDay)) 
		return false;
	else if (!EW_checkday(sYear, sMonth, sDay))
		return false;
	else
		return true;
}

// Date (yyyy/mm/dd, )
function EW_checkdate(object_value) {
	if (object_value.length == 0)
		return true;
	
	isplit = object_value.indexOf(EW_dateSep);
	
	if (isplit == -1 || isplit == object_value.length)
		return false;
	
	sYear = object_value.substring(0, isplit);
	
	isplit = object_value.indexOf(EW_dateSep, isplit + 1);
	
	if (isplit == -1 || (isplit + 1 ) == object_value.length)
		return false;
	
	sMonth = object_value.substring((sYear.length + 1), isplit);
	
	if (sMonth.length == 0)
		return false;
	
	isep = object_value.indexOf(' ', isplit + 1); 
	if (isep == -1) {
		sDay = object_value.substring(isplit + 1);
	} else {
		sDay = object_value.substring(isplit + 1, isep);
		sTime = object_value.substring(isep + 1);
		if (!EW_checktime(sTime))
			return false; 
	}
	
	if (sDay.length == 0)
		return false;
	
	if (!EW_checkinteger(sMonth)) 
		return false;
	else if (!EW_checkrange(sMonth, 1, 12)) 
		return false;
	else if (!EW_checkinteger(sYear)) 
		return false;
	else if (!EW_checkrange(sYear, 0, 9999)) 
		return false;
	else if (!EW_checkinteger(sDay)) 
		return false;
	else if (!EW_checkday(sYear, sMonth, sDay))
		return false;
	else
		return true;
}

// Date (dd/mm/yyyy)
function EW_checkeurodate(object_value) {
	if (object_value.length == 0)
	  return true;
	
	isplit = object_value.indexOf(EW_dateSep);
	
	if (isplit == -1 || isplit == object_value.length)
		return false;
	
	sDay = object_value.substring(0, isplit);
	
	monthSplit = isplit + 1;
	
	isplit = object_value.indexOf(EW_dateSep, monthSplit);
	
	if (isplit == -1 ||  (isplit + 1 )  == object_value.length)
		return false;
	
	sMonth = object_value.substring((sDay.length + 1), isplit);
	
	isep = object_value.indexOf(' ', isplit + 1); 
	if (isep == -1) {
		sYear = object_value.substring(isplit + 1);
	} else {
		sYear = object_value.substring(isplit + 1, isep);
		sTime = object_value.substring(isep + 1);
		if (!EW_checktime(sTime))
			return false; 
	}
	
	if (!EW_checkinteger(sMonth)) 
		return false;
	else if (!EW_checkrange(sMonth, 1, 12)) 
		return false;
	else if (!EW_checkinteger(sYear)) 
		return false;
	else if (!EW_checkrange(sYear, 0, null)) 
		return false;
	else if (!EW_checkinteger(sDay)) 
		return false;
	else if (!EW_checkday(sYear, sMonth, sDay)) 
		return false;
	else
		return true;
}

function EW_checkday(checkYear, checkMonth, checkDay) {
	maxDay = 31;
	
	if (checkMonth == 4 || checkMonth == 6 ||	checkMonth == 9 || checkMonth == 11) {
		maxDay = 30;
	} else if (checkMonth == 2)	{
		if (checkYear % 4 > 0)
			maxDay =28;
		else if (checkYear % 100 == 0 && checkYear % 400 > 0)
			maxDay = 28;
		else
			maxDay = 29;
	}
	
	return EW_checkrange(checkDay, 1, maxDay); 
}

function EW_checkinteger(object_value) {
	if (object_value.length == 0)
		return true;
	
	var decimal_format = ".";
	var check_char;
	
	check_char = object_value.indexOf(decimal_format);
	if (check_char < 1)
		return EW_checknumber(object_value);
	else
		return false;
}

function EW_numberrange(object_value, min_value, max_value) {
	if (min_value != null) {
		if (object_value < min_value)
			return false;
	}
	
	if (max_value != null) {
		if (object_value > max_value)
			return false;
	}
	
	return true;
}

function EW_checknumber(object_value) {
	if (object_value.length == 0)
		return true;
	
	var start_format = " .+-0123456789";
	var number_format = " .0123456789";
	var check_char;
	var decimal = false;
	var trailing_blank = false;
	var digits = false;
	
	check_char = start_format.indexOf(object_value.charAt(0));
	if (check_char == 1)
		decimal = true;
	else if (check_char < 1)
		return false;
	 
	for (var i = 1; i < object_value.length; i++)	{
		check_char = number_format.indexOf(object_value.charAt(i))
		if (check_char < 0) {
			return false;
		} else if (check_char == 1)	{
			if (decimal)
				return false;
			else
				decimal = true;
		} else if (check_char == 0) {
			if (decimal || digits)	
			trailing_blank = true;
		}	else if (trailing_blank) { 
			return false;
		} else {
			digits = true;
		}
	}	
	
	return true;
}

function EW_checkrange(object_value, min_value, max_value) {
	if (object_value.length == 0)
		return true;
	
	if (!EW_checknumber(object_value))
		return false;
	else
		return (EW_numberrange((eval(object_value)), min_value, max_value));	
	
	return true;
}

function EW_checktime(object_value) {
	if (object_value.length == 0)
		return true;
	
	isplit = object_value.indexOf(':');
	
	if (isplit == -1 || isplit == object_value.length)
		return false;
	
	sHour = object_value.substring(0, isplit);
	iminute = object_value.indexOf(':', isplit + 1);
	
	if (iminute == -1 || iminute == object_value.length)
		sMin = object_value.substring((sHour.length + 1));
	else
		sMin = object_value.substring((sHour.length + 1), iminute);
	
	if (!EW_checkinteger(sHour))
		return false;
	else if (!EW_checkrange(sHour, 0, 23)) 
		return false;
	
	if (!EW_checkinteger(sMin))
		return false;
	else if (!EW_checkrange(sMin, 0, 59))
		return false;
	
	if (iminute != -1) {
		sSec = object_value.substring(iminute + 1);		
		if (!EW_checkinteger(sSec))
			return false;
		else if (!EW_checkrange(sSec, 0, 59))
			return false;	
	}
	
	return true;
}

function EW_checkphone(object_value) {
	if (object_value.length == 0)
		return true;
	
	if (object_value.length != 12)
		return false;
	
	if (!EW_checknumber(object_value.substring(0,3)))
		return false;
	else if (!EW_numberrange((eval(object_value.substring(0,3))), 100, 1000))
		return false;
	
	if (object_value.charAt(3) != "-" && object_value.charAt(3) != " ")
		return false
	
	if (!EW_checknumber(object_value.substring(4,7)))
		return false;
	else if (!EW_numberrange((eval(object_value.substring(4,7))), 100, 1000))
		return false;
	
	if (object_value.charAt(7) != "-" && object_value.charAt(7) != " ")
		return false;
	
	if (object_value.charAt(8) == "-" || object_value.charAt(8) == "+")
		return false;
	else
		return (EW_checkinteger(object_value.substring(8,12)));
}


function EW_checkzip(object_value) {
	if (object_value.length == 0)
		return true;
	
	if (object_value.length != 5 && object_value.length != 10)
		return false;
	
	if (object_value.charAt(0) == "-" || object_value.charAt(0) == "+")
		return false;
	
	if (!EW_checkinteger(object_value.substring(0,5)))
		return false;
	
	if (object_value.length == 5)
		return true;
	
	if (object_value.charAt(5) != "-" && object_value.charAt(5) != " ")
		return false;
	
	if (object_value.charAt(6) == "-" || object_value.charAt(6) == "+")
		return false;
	
	return (EW_checkinteger(object_value.substring(6,10)));
}


function EW_checkcreditcard(object_value) {
	var white_space = " -";
	var creditcard_string = "";
	var check_char;
	
	if (object_value.length == 0)
		return true;
	
	for (var i = 0; i < object_value.length; i++) {
		check_char = white_space.indexOf(object_value.charAt(i));
		if (check_char < 0)
			creditcard_string += object_value.substring(i, (i + 1));
	}	
	
	if (creditcard_string.length == 0)
		return false;	 
	
	if (creditcard_string.charAt(0) == "+")
		return false;
	
	if (!EW_checkinteger(creditcard_string))
		return false;
	
	var doubledigit = creditcard_string.length % 2 == 1 ? false : true;
	var checkdigit = 0;
	var tempdigit;
	
	for (var i = 0; i < creditcard_string.length; i++) {
		tempdigit = eval(creditcard_string.charAt(i));		
		if (doubledigit) {
			tempdigit *= 2;
			checkdigit += (tempdigit % 10);			
			if ((tempdigit / 10) >= 1.0)
				checkdigit++;			
			doubledigit = false;
		}	else {
			checkdigit += tempdigit;
			doubledigit = true;
		}
	}
		
	return (checkdigit % 10) == 0 ? true : false;
}


function EW_checkssc(object_value) {
	var white_space = " -+.";
	var ssc_string="";
	var check_char;
	
	if (object_value.length == 0)
		return true;
	
	if (object_value.length != 11)
		return false;
	
	if (object_value.charAt(3) != "-" && object_value.charAt(3) != " ")
		return false;
	
	if (object_value.charAt(6) != "-" && object_value.charAt(6) != " ")
		return false;
	
	for (var i = 0; i < object_value.length; i++) {
		check_char = white_space.indexOf(object_value.charAt(i));
		if (check_char < 0)
			ssc_string += object_value.substring(i, (i + 1));
	}	
	
	if (ssc_string.length != 9)
		return false;	 
	
	if (!EW_checkinteger(ssc_string))
		return false;
	
	return true;
}
	

function EW_checkemail(object_value) {
	if (object_value.length == 0)
		return true;
	
	if (!(object_value.indexOf("@") > -1 && object_value.indexOf(".") > -1))
		return false;    
	
	return true;
}
	
// GUID {xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx}	
function EW_checkGUID(object_value)	{
	if (object_value.length == 0)
		return true;
	if (object_value.length != 38)
		return false;
	if (object_value.charAt(0)!="{")
		return false;
	if (object_value.charAt(37)!="}")
		return false;	
	
	var hex_format = "0123456789abcdefABCDEF";
	var check_char;	
	
	for (var i = 1; i < 37; i++) {		
		if ((i==9) || (i==14) || (i==19) || (i==24)) {
			if (object_value.charAt(i)!="-")
				return false;
		} else {
			check_char = hex_format.indexOf(object_value.charAt(i));
			if (check_char < 0)
				return false;
		}
	}
	return true;
}
	

// Update a combobox with filter value
// object_value_array format
// object_value_array[n] = option value
// object_value_array[n+1] = option text 1
// object_value_array[n+2] = option text 2
// object_value_array[n+3] = option filter value
function EW_updatecombo(obj, object_value_array, filter_value) {
	var value = obj.options[obj.selectedIndex].value;
	for (var i = obj.length-1; i > 0; i--) {
		obj.options[i] = null;
	}	
	for (var j=0; j<object_value_array.length; j=j+4) {
		if (object_value_array[j+3].toUpperCase() == filter_value.toUpperCase()) {
			EW_newopt(obj, object_value_array[j], object_value_array[j+1], object_value_array[j+2]);			
		}	
	}
	EW_selectopt(obj, value);
}

// Create combobox option 
function EW_newopt(obj, value, text1, text2) {
	var text = text1;
	if (text2 != "")
		text += ", " + text2;
	var optionName = new Option(text, value, false, false)
	var length = obj.length;
	obj.options[length] = optionName;
}

// Select combobox option
function EW_selectopt(obj, value) {
	for (var i = obj.length-1; i>=0; i--) {
		if (obj.options[i].value.toUpperCase() == value.toUpperCase()) {
			obj.selectedIndex = i;
			break;
		}
	}
}

// Get image width/height
function EW_getimagesize(file_object, width_object, height_object) {
	if (navigator.appVersion.indexOf("MSIE") != -1)	{
		myimage = new Image();
		myimage.onload = function () {
			width_object.value = myimage.width; height_object.value = myimage.height;
		}		
		myimage.src = file_object.value;
	}
}

// Get Netscape Version
function getNNVersionNumber() {
	if (navigator.appName == "Netscape") {
		var appVer = parseFloat(navigator.appVersion);
		if (appVer < 5) {
			return appVer;
		} else {
			if (typeof navigator.vendorSub != "undefined")
				return parseFloat(navigator.vendorSub);
		}
	}
	return 0;
}

// Get Ctrl key for multiple column sort
function ewsort(e, url) {	
	var ctrlPressed = 0;	
	if (parseInt(navigator.appVersion) > 3) {
		if (navigator.appName == "Netscape") {
			if (getNNVersionNumber() >= 6)
				ctrlPressed = e.ctrlKey;
			else
				ctrlPressed = ((e.modifiers+32).toString(2).substring(3,6).charAt(1)=="1");			
		} else {
		 ctrlPressed = event.ctrlKey;
		}
		if (ctrlPressed) {
			var newPage = "<scr" + "ipt language=\"JavaScript\">setTimeout('document.location.href=\"" + url + "&ctrl=1\"', 10);</scr" + "ipt>";
			document.write(newPage);
			document.close();			
			return false;
		}
	}
	return true;
}
function accesoUser(estado,usuario,seccion) {
	
	if (estado == true) {
		var x_estado = "ON";
	} else {
		var x_estado = "OFF";		
	}
	var url = 'ajax_commons.php?estado='+x_estado+'&usuario='+usuario+'&seccion='+seccion;
	var service = url + "?op=" + new Date().getMilliseconds() * 100;
	var xmlhttp;
	try {
		xmlhttp = new XMLHttpRequest();
	} catch(e) {
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e) {
				alert("Your browser is not supported.");
				return false;
			}
		}
	}
	xmlhttp.open("GET", service, true);
	xmlhttp.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT");
	
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4) {
			/*document.getElementById('retorno_acceso').innerHTML = xmlhttp.responseText;*/
		}
	}
	xmlhttp.send(null);
	xmlhttp.nothing;

	
}


//==============================================
// TOOLTIPS LIB
// V.1
//==============================================
var offsetx = 12;
var offsety =  8;

function newelement(newid)
{ 
	if(document.createElement)
	{ 
		var el = document.createElement('div'); 
		el.id = newid;     
		with(el.style)
		{ 
			display = 'none';
			position = 'absolute';
		} 
		el.innerHTML = '&nbsp;'; 
		document.body.appendChild(el); 
	} 
} 
var ie5	= (document.getElementById && document.all); 
var ns6 = (document.getElementById && !document.all); 
var ua	= navigator.userAgent.toLowerCase();
var isapple = (ua.indexOf('applewebkit') != -1 ? 1 : 0);
function getmouseposition(e) {
	if(document.getElementById)
	{
		var iebody=(document.compatMode && 
			document.compatMode != 'BackCompat') ? 
				document.documentElement : document.body;
		pagex = (isapple == 1 ? 0:(ie5)?iebody.scrollLeft:window.pageXOffset);
		pagey = (isapple == 1 ? 0:(ie5)?iebody.scrollTop:window.pageYOffset);
		mousex = (ie5)?event.x:(ns6)?clientX = e.clientX:false;
		mousey = (ie5)?event.y:(ns6)?clientY = e.clientY:false;

		var lixlpixel_tooltip = document.getElementById('tooltip');
		lixlpixel_tooltip.style.left = (mousex+pagex+offsetx) + 'px';
		lixlpixel_tooltip.style.top = (mousey+pagey+offsety) + 'px';
	}
}
function tooltip(tip){
	if (document.readyState == "complete" || document.readyState == undefined) {
	if(!document.getElementById('tooltip')) newelement('tooltip');
	var lixlpixel_tooltip = document.getElementById('tooltip');
	lixlpixel_tooltip.innerHTML = tip;
	lixlpixel_tooltip.style.display = 'block';
	document.onmousemove = getmouseposition;
	}
}
function exit(){
	if (document.getElementById('tooltip')) {
	document.getElementById('tooltip').style.display = 'none';
	}
}


// Generar codigo SEO por javascript

function generarSEOCode(cadena) {
	var textosalida =SEOCode(cadena);
	document.getElementById("x_url").value=textosalida;	
}

function generarSEOCode2Field(cadena,field_id) {
	var textosalida =SEOCode(cadena);
	document.getElementById(field_id).value=textosalida;	
}
function SEOCode(cadena){
	var texto='';
	texto = cadena.toLowerCase()
	texto=texto.replace(/(�|�|�|�|�|�|�)/gi,'a');
	texto=texto.replace(/(�|�|�|�)/gi,'e'); 
	texto=texto.replace(/(�|�|�|�)/gi,'i');
	texto=texto.replace(/(�|�|�|�|�)/gi,'o');
	texto=texto.replace(/(�|�|�|�)/gi,'u');
	texto=texto.replace(/(�)/gi,'n'); 
	texto=texto.replace(/( )/gi,'-');
	texto=texto.replace(/(�|�|!|�|�|,|%|�|�)/gi,'');
	texto=texto.replace(/(�)/gi,'c');
	texto=texto.replace(/[?]+/,'');
	texto=texto.replace(/[�]+/,'');

	return texto;
}

function ChequearTodos(chkbox){
	for (var i=0;i < document.forms["administradoresedit"].elements.length;i++){
		var elemento = document.forms[0].elements[i];
		if (elemento.type == "checkbox"){
			elemento.checked = chkbox.checked;
		}
	}
} 



function checkAll(check,contenedor){
        var valor = check.checked;
           
        $('#'+contenedor+' input[type=checkbox]').attr('checked',valor);
                
}
	