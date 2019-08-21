<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'inicio';
//$route['404_override'] = 'my404';
//$route['translate_uri_dashes'] = FALSE;

/* 404 */
$route['error-404'] = "inicio/show_404";

/* Handler redirect */
$route['redirect/index'] = "redirect/index";

/* Cron */
$route['cron/check_cron'] = "cron/check_cron";

/* Login */ 
$route['login'] = "inicio/login";
$route['logout'] = "inicio/logout";
$route['enviar_login'] = "inicio/enviar_login";
$route['login_recuperar'] = "inicio/login_recuperar/1";
$route['login_recuperar2'] = "inicio/login_recuperar/2";
$route['login_recuperar3'] = "inicio/login_recuperar/3";

/* Biblioteca */
$route['biblioteca'] = "Biblioteca/index";

$route['biblioteca/list'] = "Biblioteca/bibliotecalist";
$route['biblioteca/list'] = "Biblioteca/bibliotecalist";

$route['biblioteca/list/export-(:any)'] = "Biblioteca/bibliotecalist/$1";
$route['biblioteca/list/pag-(:num)'] = "Biblioteca/bibliotecalist//$1";
$route['biblioteca/list/start-(:num)'] = "Biblioteca/bibliotecalist///$1";
$route['biblioteca/list/start-(:num)/recperpage-(:num)'] = "Biblioteca/bibliotecalist///$1/$2";
$route['biblioteca/list/start-(:num)/recperpage-ALL'] = "Biblioteca/bibliotecalist///$1/ALL";


$route['biblioteca/upload'] = "Biblioteca/bibliotecaupload"; 
$route['biblioteca/save'] = "Biblioteca/bibliotecasave"; // guardar archivos
$route['biblioteca/save_end'] = "Biblioteca/bibliotecasave_end"; // guardar form con todos los datos
$route['biblioteca/save_edit'] = "Biblioteca/bibliotecasave_edit"; // Guardar form con todos los datos para edit

$route['biblioteca/quitar_vigencia/(:any)'] = "Biblioteca/quitar_vigencia/$1";
$route['biblioteca/delete/(:any)'] = "Biblioteca/eliminar/$1";
$route['biblioteca/edit/(:any)'] = "Biblioteca/bibliotecaedit/$1";
$route['biblioteca/enviar_arriba/(:any)'] = "Biblioteca/enviar_arriba/$1";

$route['biblioteca/quitar_vigencia_multiple/(:any)'] = "Biblioteca/quitar_vigencia_multiple/$1";
$route['biblioteca/delete_multiple/(:any)'] = "Biblioteca/eliminar_multiple/$1";
$route['biblioteca/enviar_arriba_multiple/(:any)'] = "Biblioteca/enviar_arriba_multiple/$1";

$route['biblioteca/ajax_query'] = "Biblioteca/ajax_query";
$route['biblioteca/ajax_verifica_archivo'] = "Biblioteca/ajax_verifica_archivo";

/* Dashboard */
$route['dashboard'] = "SystemDashboard/index"; 
$route['dashboard/(:any)'] = "SystemDashboard/index/$1"; 
$route['dashboard/(:any)/excel'] = "SystemDashboard/index/$1/excel"; 

/* CRON & WS */
$route['test_ws'] = "SystemCustom/test_ws"; 


/* Ajax */
$route['ajax_actualizar_estado'] = "SystemCustom/ajax_actualizar_estado"; 
$route['ajax_actualizar_estado_bloque_dashboard'] = "SystemCustom/ajax_actualizar_estado_bloque_dashboard"; 
$route['ajax_consulta_user_disponible'] = "SystemCustom/ajax_consulta_user_disponible"; 
$route['ajax_solicitar_imagen_alta'] = "SystemCustom/ajax_solicitar_imagen_alta"; 
$route['ajax_actualizar_alertas_leidas'] = "SystemCustom/ajax_actualizar_alertas_leidas"; 
$route['ajax_modal_alerta/(:num)'] = "SystemCustom/ajax_modal_alerta/$1"; 
$route['ajax_secciones_padre_en_categoria/(:num)'] = "SystemCustom/ajax_secciones_padre_en_categoria/$1"; 
$route['ajax_modulos_utilizados/(:any)/(:num)/(:num)/(:num)'] = "SystemCustom/ajax_modulos_utilizados/$1/$2/$3/$4";
$route['ajax_login_epedidos'] = "SystemCustom/ajax_login_epedidos";
$route['ajax_destruir_token_epedidos'] = "SystemCustom/ajax_destruir_token_epedidos";

/* Templates use */
$route['seccion/(:num)/(:any)'] = "Secciones/seccionshow/$1"; 
$route['seccion/(:num)/(:any)/pag-(:num)'] = "Secciones/seccionshow/$1//$3";
$route['seccion/(:num)/(:any)/start-(:num)'] = "Secciones/seccionshow/$1///$3";
$route['seccion/(:num)/(:any)/start-(:num)/recperpage-(:num)'] = "Secciones/seccionshow/$1///$3/$4";
$route['seccion/(:num)/(:any)/start-(:num)/recperpage-ALL'] = "Secciones/seccionshow/$1///$3/ALL"; 
$route['seccion/(:num)/(:any)/(:num)/(:any)'] = "Secciones/seccionshow_interior/$1/$3"; 


/* Profile */
$route['profile'] = "SystemCustom/profile";
$route['save/profile'] = "SystemCustom/profilesave";
$route['save/visual'] = "SystemCustom/visualsave";

/* Force overwrite base system */
$route['list_custom/categorias'] = "SystemCustom/categoriaslist";
$route['list/categorias'] = "SystemCustom/categoriaslistv2";
$route['formulario_categoriasv2'] = "SystemCustom/recurso_categoriasv2";
$route['save/idiomas_sitio'] = "SystemCustom/save_idiomas_sitio";
$route['save/idiomas_sistema'] = "SystemCustom/save_idiomas_sistema";

$route['edit/categorias'] = "SystemCustom/categoriasedit";
$route['delete/tipos_contenidos'] = "SystemCustom/tipos_contenidosdelete";
$route['add/categorias'] = "SystemCustom/categoriasadd";
$route['save/categorias'] = "SystemCustom/categoriassave";
$route['edit_custom/parametros'] = "SystemCustom/parametrosedit";

$route['list/secciones'] = "SystemCustom/seccioneslist";
$route['list/eventos_asistencia'] = "SystemCustom/eventos_asistencialist";
$route['list/eventos_asistencia/export-(:any)'] = "SystemCustom/eventos_asistencialist/$1";
$route['list/secciones/(:any)'] = "SystemCustom/seccioneslist/$1";
$route['list/log_movimientos'] = "SystemCustom/log_actividades";
$route['list/log_movimientos/export-(:any)'] = "SystemCustom/log_actividades/$1";
$route['list/log_movimientos/pag-(:num)'] = "SystemCustom/log_actividades//$1";
$route['list/log_movimientos/start-(:num)'] = "SystemCustom/log_actividades///$1";
$route['list/log_movimientos/start-(:num)/recperpage-(:num)'] = "SystemCustom/log_actividades///$1/$2";
$route['list/log_movimientos/start-(:num)/recperpage-ALL'] = "SystemCustom/log_actividades///$1/ALL";
$route['list/log_actividades_detalle/(:num)'] = "SystemCustom/log_actividades_detalle/$1";
$route['list/estadisticas'] = "SystemCustom/estadisticas/1";
$route['list/estadisticas/2'] = "SystemCustom/estadisticas/2";
$route['list/zonas_geograficas'] = "SystemCustom/zonas_geograficaslist";

$route['list/distribuidores/export-excel'] = "SystemCustom/custom_export_distribuidores";
$route['list/distribuidores_usuarios/export-excel'] = "SystemCustom/custom_export_distribuidores_usuarios";
$route['list/usuarios/export-excel'] = "SystemCustom/custom_export_usuarios";


$route['listc/distribuidores_usuarios'] = "SystemCustom/distribuidores_usuarioslist";
$route['list/usuarios_moderacion'] = "SystemCustom/distribuidores_usuarios_pendienteslist";
$route['list/distribuidores_usuarios_pendientes_detail/(:num)'] = "SystemCustom/distribuidores_usuarios_pendientes_detail/$1";
$route['save/distribuidores_usuarios_pendientes_detail'] = "SystemCustom/distribuidores_usuarios_pendientes_detail_save";

/* Base System */

/* Listados */
$route['list/sort_table'] = "SystemList/sort_table"; // Ordenar
$route['list/(:any)'] = "SystemList/cargar_tabla/$1";
$route['list/(:any)/export-(:any)'] = "SystemList/cargar_tabla/$1/$2";
$route['list/(:any)/sort-(:any)'] = "SystemList/cargar_tabla/$1/////$2";
$route['list/(:any)/pag-(:num)'] = "SystemList/cargar_tabla/$1//$2";
$route['list/(:any)/start-(:num)'] = "SystemList/cargar_tabla/$1///$2";
$route['list/(:any)/start-(:num)/recperpage-(:num)'] = "SystemList/cargar_tabla/$1///$2/$3";
$route['list/(:any)/start-(:num)/recperpage-ALL'] = "SystemList/cargar_tabla/$1///$2/ALL";

/* Agregar y Editar */
$route['add/(:any)'] = "SystemEdit/edit/$1";
$route['edit/(:any)'] = "SystemEdit/edit/$1";
$route['save/(:any)'] = "SystemEdit/save/$1"; 


/* Eliminar */
$route['delete/(:any)'] = "SystemDelete/delete/$1";
$route['delete_execute/(:any)'] = "SystemDelete/delete_execute/$1";

// $route['galeria/(:num)/(:any)'] = "galeria/interior/$1/$2";