<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['jsonCFG']=<<<END
{
	"accesos": {
		"fields": {
			"id_acceso": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"codigo": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": ""
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			}
		}
	},
	"administradores": {
		"config": {
			"orderby":"administradores.nombre asc"
		},
		"fields": {
			"nombre": {
				"mode": "varchar(45)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": ""
			},
			"usuario": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"user_email"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"password": {
				"mode": "varchar(64)",
				"null": "YES",
				"key": "",
				"default": null,
				 "extra":"md5",
				"ftype":"input_password",
				"nolist":"nolist"
			},
			"rol": {
				"mode": "enum('admin','colaborador','personalizado')",
				"null": "NO",
				"key": "",
				"default": "admin",
				"extra": "",
				"ftype": "input_radio_rol",
				"fvalue":"admin,colaborador"
			},
			"codigo_administradores_accesos":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"administradores_menu,codigo,nombre,codigo_padre = '0'",
				"multijoin":"administradores_accesos,usuario,codigo",
				"nolist":"nolist"
			 },			 
			"admin_colaborador": {
				"mode": "enum('off','on')",
				"null": "NO",
				"key": "",
				"default": "off",
				"extra": "",
				"ftype": "input_radio",
				"fvalue":"on,off",
				"nolist":"nolist"
			},
			"moderacion_usuarios": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":0,
				"ftype":"input_radio",
				"fvalue":"1,0",
				"nolist":"nolist"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"1,0"
			}
		}
	},
	"administradores_accesos": {
		"fields": {
			"usuario": {
				"mode": "varchar(24)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"codigo": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			}
		}
	},
	"administradores_menu": {
		"fields": {
			"codigo": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"codigo_padre": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "MUL",
				"default": "0",
				"extra": ""
			},
			"nombre": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"imagen": {
				"mode": "varchar(100)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": ""
			},
			"onclick": {
				"mode": "varchar(250)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": ""
			},
			"orden": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"input_hidden"
			}
		}
	},
	"alertas": {
		"config": {
			"action_after_save":"check_alertas_enviar_ahora",
			"action_after_delete":"alertas_enviadas_delete"
		},
		"fields": {
			"id_alerta": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"	
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"tipo": {
				"mode":"varchar(200)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"tipos_alerta,tipo,nombre",
				"multijoin":"alertas_tipos,id_alerta,tipo",
				"nolist":"nolist"
			},
			"id_evento": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"eventos,id_evento,titulo",
				"keylink":"eventos,id_evento,titulo"
			},
			"texto_abajo_nombre": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"asunto": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},			
			"imagen": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": null,
				"ftype":"biblioteca",
				"extra": "images",
				"nolist":"nolist"
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"texto": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"ckeditor",
				"nolist":"nolist"
			},
			"texto_boton": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"tipo_enlace": {
				"mode": "enum('seccion','externo')",
				"null": "NO",
				"key": "",
				"default":"seccion",
				"ftype":"input_radio",
				"fvalue":"seccion,externo",
				"nolist":"nolist"
			},
			"id_seccion": {
				"mode": "int(11)",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "select",
				"fvalue":"table",
				"fjoin":"secciones,id_seccion,nombre",
				"keylink":"secciones,id_seccion,nombre",
				"nolist":"nolist"
			},
			"enlace_personalizado": {
				"mode": "varchar(300)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"texto_notificacion": {
				"mode": "varchar(500)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"estado": {
				"mode": "enum('enviado','programado','enviar_ahora','borrador','enviado')",
				"null": "NO",
				"key": "MUL",
				"default": "enviar_prueba_ahora",
				"extra": "",
				"ftype": "input_radio",
				"fvalue": "enviar_prueba_ahora,borrador,enviar_ahora,programado,enviado"
			},
			"fecha_programacion": {
				"mode": "date",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype":"date",
				"size":"3,3,open",
				"nolist":"nolist"
			},
			"hora_programacion": {
				"mode": "time",
				"null": "YES",
				"key": "",
				"default": "",
				"extra": "",
				"ftype":"input_time",
				"size":"3,3,close",
				"nolist":"nolist"
			}
		}
	},
	"categorias": {
		"config": {
			"orderby":"categorias.orden asc",
			"filterfields":{  
				"Tipo":"id_categoria_tipo,like"
			 },
			 "backpage":"list/categorias/?"
		},
		"fields": {
			"id_categoria": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"			
			},			
			"id_categoria_tipo": {
				"mode": "int(11)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "select",
				"fvalue":"table",
				"nodelete":"nodelete",
				"fjoin":"categorias_tipo,id_categoria_tipo,descripcion",
				"keylink":"categorias_tipo,id_categoria_tipo,descripcion"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden",
				"nodelete":"nodelete"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"id_categoria_sub":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"categorias C inner join categorias_tipo CT on (CT.id_categoria_tipo=C.id_categoria_tipo),id_categoria,nombre",
				"multijoin":"categorias_sub,id_categoria_sub,id_categoria",
				"nolist":"nolist",
				"nodelete":"nodelete"
			},
			"orden": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"input_hidden",
				"nodelete":"nodelete"
			}
		}
	},
	"categorias_tipo": {
		"config": {
			"orderby":"nivel asc"
		},
		"fields": {
			"id_categoria_tipo": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"descripcion": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"nivel": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"number"
			},
			"genero": {
				"mode": "enum('m','f')",
				"null": "NO",
				"key": "",
				"default":1,
				"nolist":"nolist",
				"ftype":"input_radio",
				"fvalue":"m,f"
			}
		}
	},
	"distribuidores": {
	 "config":{  
         "export":"excel",
		 "action_after_save":"distribuidores_after_save",
		 "action_after_delete":"distribuidores_after_delete",
         "filterfields":{  
            "Nombre":"nombre,like"
         },
		 "childtable":{
			"distribuidores_usuarios":"id_distribuidor,id_distribuidor" 
		 }
      },
		"fields": {
			"id_distribuidor": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"codigo": {
				"mode": "varchar(32)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"telefono": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"direccion": {
				"mode": "varchar(500)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"id_zona_geografica1": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"select",
				"fvalue":"table",
				"fjoin": "zonas_geograficas,id_zona_geografica,nombre,id_padre=0"
			},
			"id_zona_geografica2": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"select",
				"fvalue":"table",
				"fjoin": "zonas_geograficas,id_zona_geografica,nombre,id_padre!=0"
			},
			"id_zona_geografica3": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"select",
				"fvalue":"table",
				"fjoin": "zonas_geograficas,id_zona_geografica,nombre,id_padre!=0"
			},
			"id_distribuidores_categorias":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"special_select_categorias",
				"fvalue":"table",
				"fjoin":"categorias,id_categoria,nombre",
				"multijoin":"distribuidores_categorias,id_distribuidor,id_categoria",
				"nolist":"nolist",
				"custom_sqlfunction":"get_all_categorias"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},
	"distribuidores_categorias": {
		"fields": {
			"id_distribuidor": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"id_categoria": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			}
		}
	},
	"distribuidores_usuarios": {
		"config": {			
			"export":"excel",
			"mastertable":{
				"distribuidores":"id_distribuidor,id_distribuidor"
			},
			"filterfunction":  { "nombre": "nombre,!=,distribuidores_usuarios"},
			"action_after_save":"distribuidores_usuarios_after_save",
			"action_after_delete":"distribuidores_usuarios_after_delete"
		},
		"fields": {
			"id_distribuidor_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"id_distribuidor": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"distribuidores,id_distribuidor,nombre",
				"keylink":"distribuidores,id_distribuidor,nombre"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"celular": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"size":"3,4,open"
								
			},
			"telefono": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"size":"1,4,close"
			},
			"direccion": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"id_perfil_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"perfiles_usuarios,id_perfil_usuario,nombre",
				"keylink":"perfiles_usuarios,id_perfil_usuario,nombre"
			},
			"genero": {
				"mode": "enum('masculino','femenino')",
				"null": "NO",
				"key": "",
				"default": "masculino",
				"extra": "",
				"ftype":"input_radio",
				"nolist":"nolist",				
				"size":"3,3,open",
				"fvalue":"masculino,femenino"
			},
			"fecha_nacimiento": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"size":"2,4,close",
				"ftype":"date_birth"
			},
			"acceso_epedidos": {
				"mode": "enum('off','on')",
				"null": "NO",
				"key": "",
				"default": "on",
				"extra": "",
				"ftype": "input_radio",
				"fvalue":"off,on"
			},
			"email": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"user_email"
			},
			"password": {
				"mode": "varchar(256)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "md5",
				"nolist":"nolist",
				"ftype": "input_password"
			},
			"enviar_clave": {
				"mode": "enum('off','on')",
				"null": "NO",
				"key": "",
				"default": "off",
				"extra": "",
				"ftype": "input_radio",
				"fvalue":"off,on",
				"size":"3,3,open",
				"nolist":"nolist"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1",
				"size":"2,4,close"
			}
		}
	},
	"distribuidores_usuarios_tmp": {
		"config": {
			"export":"excel",
			"mastertable":{
				"distribuidores":"id_distribuidor,id_distribuidor"
			},
			"action_after_save":"distribuidores_usuarios_tmp_after_save",
			"action_after_delete":"distribuidores_usuarios_tmp_after_delete"
		},
		"fields": {
			"id_distribuidor_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"id_distribuidor": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"default": "FUNCTION",
				"default_function": "default_distribuidor",
				"ftype":"input_hidden",
				"keylink":"distribuidores,id_distribuidor,nombre"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"celular": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"size":"3,4,open"								
			},
			"telefono": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"size":"1,4,close"
			},
			"direccion": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"id_perfil_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"perfiles_usuarios,id_perfil_usuario,nombre,visible_admin_colaborador='1'",
				"keylink":"perfiles_usuarios,id_perfil_usuario,nombre"
			},
			"genero": {
				"mode": "enum('masculino','femenino')",
				"null": "NO",
				"key": "",
				"default": "masculino",
				"extra": "",
				"ftype":"input_radio",
				"nolist":"nolist",
				"fvalue":"masculino,femenino"
			},
			"fecha_nacimiento": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"date_birth"
			},
			"acceso_epedidos": {
				"mode": "enum('off','on')",
				"null": "NO",
				"key": "",
				"default": "on",
				"extra": "",
				"ftype": "input_radio",
				"fvalue":"off,on"
			},
			"email": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"user_email"
			},
			"password": {
				"mode": "varchar(256)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "md5",
				"nolist":"nolist",
				"ftype": "input_password"
			},
			"enviar_clave": {
				"mode": "enum('off','on')",
				"null": "NO",
				"key": "",
				"default": "off",
				"extra": "",
				"ftype": "input_hidden",
				"fvalue":"off,on",
				"nolist":"nolist"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_hidden",
				"fvalue":"0,1"
			}
		}
	},
	"eventos": {
		"config": {
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"1",
			"sidebar_dis":"1",
			"backpage":"referer",
			"childtable":{
				"eventos_sesiones":"id_evento,id_evento",
				"eventos_asistencia":"id_evento,id_evento" 
			}
		},
		"fields": {
			"id_evento": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": ""
			},
			"imagen_principal": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"ftype":"biblioteca",
				"extra": "images"
			},
			"mantener_arriba": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			},
			"vigencia_desde": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"nolist": "nolist",
				"size":"3,3,open"
			},
			"vigencia_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"nolist": "nolist",
				"size":"2,4,close"
			},
			"programar_desde": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"3,3,open"
			},
			"programar_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"2,4,close"
			},			
			"eventos_imagenes" : {
				"mode": "",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca_multiple",
				"extra": "images_videos",
				"keylinkbib":"id_evento"	
			},
			"titulo_confirmacion": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": ""
			},
			"texto_confirmacion": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"ckeditor"
			},
			"eventos_documentos" : {
				"mode": "",
				"null": "YES",
				"key": "YES",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca_multiple",
				"extra": "archivos",
				"keylinkbib":"id_evento"	
			},
			"texto_resumen": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"texto": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"ckeditor"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},
	"eventos_sesiones": {
		"config": {
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"0",
			"sidebar_dis":"0",
			"mastertable":{
				"eventos":"id_evento,id_evento"
			}			
		},
		"fields": {
			"id_evento_sesion": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"id_evento": {
				"mode": "int(11)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"tipo_sesion": {
				"mode": "enum('presencial','online')",
				"null": "NO",
				"key": "MUL",
				"default": "presencial",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"presencial,online"
			},
			"fecha": {
				"mode": "date",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"3,3,open"
			},
			"hora": {
				"mode": "time",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "input_time",
				"size":"3,3,close"
			},
			"cupos": {
				"mode": "int(11)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"size":"3,3,open",
				"ftype":"number"
			},
			"costo_evento": {
				"mode": "varchar(20)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"size":"3,3,close",
				"nolist":"nolist",
				"ftype":"number"
			},
			"video_url": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_url"
			},
			"ubicacion": {
				"mode": "varchar(400)",
				"null": "YES",
				"key": "",
				"default": null,
				"nolist":"nolist",
				"extra": "",
				"ftype":"map"
			},
			"coordenadas": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"nolist":"nolist",
				"default": null,
				"extra": ""
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "MUL",
				"default": "1",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},	
	"idiomas_sistema": {
		"config": {
			"filterfields": { "Texto":"texto,LIKE"},
			"filterfunction":  { "localizacion": "localizacion,=,localizacion"},
			"delete":"denied",
			"add":"denied", 
			"orderby":"tabla asc"
		},
		"fields": {
			"tabla": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"campo": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "PRI",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"texto": {
				"mode": "varchar(250)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"input_text"
			}
		}
	},
	"idiomas_sitio": {
		"config": {
			"filterfields": { "Texto":"texto,LIKE"},
			"filterfunction":  { "localizacion": "localizacion,=,localizacion"},
			"delete":"denied",
			"add":"denied",
			"orderby":"seccion asc"
		},
		"fields": {
			"seccion": {
				"mode": "varchar(12)",
				"null": "NO",
				"key": "PRI",
				"default": "general",
				"extra": ""
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "PRI",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"codigo": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"texto": {
				"mode": "text",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"input_text"
			}
		}
	},
	"incentivos": {
		"config": {
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"0",
			"sidebar_dis":"1",
			"backpage":"referer"
		},
		"fields": {
			"id_incentivo": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"imagen_principal": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"ftype":"biblioteca",
				"extra": "images"
			},
			"vigencia_desde": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"3,3,open"
			},
			"vigencia_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"2,4,close"
			},
			"programar_desde": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"3,3,open"
			},
			"programar_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"2,4,close"
			},
			"contenido_titulo": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"contenido_texto": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"ftype":"ckeditor",
				"extra": "",
				"nolist":"nolist"
			},
			"incentivos_documentos" : {
				"mode": "",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca_multiple",
				"extra": "archivos",
				"keylinkbib":"id_incentivo"	
			},
			"info_ganadores_titulo": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"info_ganadores_texto": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"ckeditor",
				"nolist":"nolist"
			},
			"incentivos_documentos_ganadores" : {
				"mode": "",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca_multiple",
				"extra": "archivos",
				"keylinkbib":"id_incentivo"	
			},
			"incentivos_imagenes" : {
				"mode": "",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca_multiple",
				"extra": "images",
				"keylinkbib":"id_incentivo"	
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},
	"material_pop": {
		"config": {			
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"1",
			"sidebar_dis":"0",
			"backpage":"referer"
		},
		"fields": {
			"id_material_pop": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"imagen_principal": {
				"mode": "int(11)",
				"null": "YES",
				"key": "MUL", 
				"default": "",
				"ftype":"biblioteca",
				"extra": "images",
				"nolist":"nolist",
				"nodelete":"nodelete"
			},
			"etiqueta": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"size":"3,3,open"
			},
			"codigo": {
				"mode": "varchar(50)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"size":"2,4,close"
			},
			"set_package": {
				"mode": "varchar(100)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": ""
			},
			"simbolo_moneda": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": "$",
				"extra": "",
				"size":"3,3,open"	
			},
			"costo_distribuidor": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"size":"2,4,close"		
			},
			"precio_bonificacion": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"size":"3,3,open"
			},
			"bonificacion": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"size":"2,4,close"				
			},
			"id_material_pop_tipos_contenidos":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"tipos_contenidos,id_tipo_contenido,nombre",
				"multijoin":"material_pop_tipos_contenidos,id_material_pop,id_tipo_contenido",
				"nolist":"nolist"
			},
			"programar_desde": {
				"mode": "date",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "date",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"size":"3,3,open"
			},
			"programar_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "date",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"size":"2,4,close"
			},			
			"mantener_arriba": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"fvalue":"0,1"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"fvalue":"0,1"
			}
		}
	},
	"novedades": {
		"config": {
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"1",
			"sidebar_dis":"1",
			"backpage":"referer"
		},
		"fields": {
			"id_novedad": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"imagen_principal": {
				"mode": "int(11)",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"ftype":"biblioteca",
				"extra": "images",
				"nolist":"nolist",
				"nodelete":"nodelete"
			},
			"programar_desde": {
				"mode": "date",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "date",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"size":"3,3,open"
			},
			"programar_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"size":"2,4,close"
			},			
			"texto": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"ckeditor",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"nolist":""
			},
			"mantener_arriba": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"fvalue":"0,1"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"fvalue":"0,1"
			},
			"novedades_archivos" : {
				"mode": "",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"ftype":"biblioteca_multiple",
				"extra": "archivos",
				"keylinkbib":"id_novedad"	
			},
			"novedades_imagenes" : {
				"mode": "",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"nolist":"nolist",
				"nodelete":"nodelete",
				"ftype":"biblioteca_multiple",
				"extra": "images_videos",
				"keylinkbib":"id_novedad"	
			}
		}
	},
	"parametros": {
		"fields": {
			"id_parametro": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"codigo": {
				"mode": "varchar(24)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"seccion": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"valor": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"tipo_administracion": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			}
		}
	},
	"perfiles": {
		"fields": {
			"id_perfil": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"rol": {
				"mode": "enum('admin','visualizador')",
				"null": "NO",
				"key": "",
				"default": "visualizador",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"admin,visualizador"
			},			
			"codigo_administradores_accesos":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"administradores_menu,codigo,nombre,codigo_padre = '0'",
				"multijoin":"perfiles_accesos,id_perfil,codigo",
				"nolist":"nolist"
			 }
		}
	},
	"perfiles_accesos": {
		"fields": {
			"id_perfil": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			},
			"id_acceso": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			}
		}
	},
	"perfiles_usuarios": {
		"config": {
			"orderby":"perfiles_usuarios.id_perfil_epedidos ASC, perfiles_usuarios.nombre ASC"
		},
		"fields": {
			"id_perfil_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"crear_usuarios": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1",
				"nodelete":"nodelete"
			},
			"id_perfil_epedidos": {
				"mode": "enum('1','2')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"1,2",
				"nodelete":"nodelete"
			},
			"visible_admin_colaborador": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1",
				"nodelete":"nodelete"
			}
		}
	},
	"promociones": {
		"config": {
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"1",
			"sidebar_dis":"0",
			"orderby":"promociones.id_promocion ASC",
			"backpage":"referer"				
		},
		"fields": {
			"id_promocion": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden",
				"nodelete":"nodelete"
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"imagen_principal": {
				"mode": "int(11)",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"ftype":"biblioteca",
				"extra": "images",
				"nolist": "nolist",
				"nodelete":"nodelete" 
			},
			"vigencia_desde": {
				"mode": "date",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"3,3,open",
				"nodelete":"nodelete"
			},
			"vigencia_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"2,4,close",
				"nodelete":"nodelete"
			},
			"pdf_interior": {
				"mode": "",
				"null": "YES",
				"key": "YES",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca",
				"extra": "archivos",
				"nodelete":"nodelete"				
			},			
			"titulo_inferior": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nodelete":"nodelete"
			},
			"promociones_documentos" : {
				"mode": "",
				"null": "YES",
				"key": "YES",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca_multiple",
				"extra": "todos",
				"keylinkbib":"id_promocion",
				"nodelete":"nodelete"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1",
				"nodelete":"nodelete"
			}
		}
	},
	"promociones_documentos": {
		"config": {
			"orderby":"promociones_documentos.orden ASC",
			"sortdrag":"enabled",
			"mastertable":{
				"promociones":"id_promocion,id_promocion"
			
			},
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"0",
			"sidebar_dis":"0"	
		},
		"fields": {
			"id_promocion_documento": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"id_promocion": {
				"mode": "int(11)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"id_biblioteca": {
				"mode": "",
				"null": "YES",
				"key": "YES",
				"default": "",
				"nolist":"nolist",
				"ftype":"biblioteca",
				"extra": "todos"	
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"orden": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},
	"redes_sociales": {
		"fields": {
			"id_red_social": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"icono": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"enlace": {
				"mode": "varchar(300)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"orden": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},
	"secciones": {
		"config": {
			"orderby":"secciones.orden ASC",
			"sortdrag":"enabled",
			"filterfields": {"Categoría:":"id_categoria,="}		
		},
		"fields": {
			"id_seccion": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"id_categoria": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": "1",
				"extra": "",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"categorias C inner join categorias_tipo CT on (CT.id_categoria_tipo=C.id_categoria_tipo),id_categoria,nombre,CT.nivel=1",
				"keylink":"categorias,id_categoria,nombre",
				"nolist":"nolist"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"tipo": {
				"mode": "enum('seccion','subseccion')",
				"null": "NO",
				"key": "",
				"default": "seccion",
				"extra": "",
				"ftype": "input_radio",
				"fvalue":"seccion,subseccion"				
			},	
			"id_seccion_padre": {
				"mode": "int(11)",
				"null": "YES",
				"key": "",
				"default": "0",
				"extra": "",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"secciones,id_seccion,nombre,id_seccion_padre=0",
				"keylink":"secciones,id_seccion,nombre",
				"nolist":"nolist"
			},
			"menu": {
				"mode": "enum('off','on')",
				"null": "NO",
				"key": "",
				"default": "on",
				"extra": "",
				"ftype": "input_radio",
				"fvalue":"off,on"
				
			},			
			"mostrar_filtro": {
				"mode": "enum('si','no')",
				"null": "NO",
				"key": "",
				"default": "si",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"si,no"
			},	
			"id_template": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": "1",
				"extra": "",
				"ftype":"special_select_template",
				"fvalue":"table",
				"fjoin":"templates,id_template,nombre",
				"keylink":"templates,id_template,nombre"
			},
			"columnas": {
				"mode": "enum('2','3')",
				"null": "NO",
				"key": "",
				"default": "3",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"2,3"
			},
			"mostrar_listado": {
				"mode": "varchar(500)",
				"null": "YES",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"secciones_campos_disponibles,nombre,nombre",
				"multijoin":"secciones_campos,id_seccion,nombre",
				"nolist":"nolist"
			},	
			"url_externa": {
				"mode": "varchar(500)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"destino": {
				"mode": "varchar(50)",
				"null": "YES",
				"key": "",
				"default": "_self",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"_self,_blank"
			},
			"contenido_enriquecido": {
				"mode": "text",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"ckeditor"
			},
			"orden_de_contenido": {
				"mode": "varchar(50)",
				"null": "YES",
				"key": "",
				"default": "sort_desc",
				"extra": "",
				"nolist":"nolist",
				"ftype": "input_radio",
				"fvalue":"sort_desc,sort_asc,sort_alpha"
			},
			"orden_alfabetico_criterio": {
				"mode": "enum('A-Z','Z-A')",
				"null": "YES",
				"key": "",
				"default": "A-Z",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"A-Z,Z-A"
			},
			"id_secciones_agrupar_tipo_contenido":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"tipos_contenidos,id_tipo_contenido,nombre",
				"multijoin":"secciones_agrupar_tipo_contenido,id_seccion,id_tipo_contenido",
				"nolist":"nolist"
			},
			"id_secciones_perfiles_usuarios":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"select_multiple",
				"fvalue":"table",
				"fjoin":"perfiles_usuarios,id_perfil_usuario,nombre",
				"multijoin":"secciones_perfiles_usuarios,id_seccion,id_perfil_usuario",
				"nolist":"nolist"
			 },
			"orden": {
				"mode": "int(11)",
				"null": "YES",
				"key": "", 
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"estado_dashboard": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"nolist":"nolist",
				"fvalue":"0,1"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},
	"secciones_perfiles_usuarios": {
		"fields": {
			"id_seccion": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"id_perfil_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra": ""
			}
		}
	},
	"slider_home": {
		"config": {
			"template_edit":"edit_contenidos",
			"template_list":"list_contenidos",
			"sidebar_cat":"1",
			"sidebar_dis":"1",
			"backpage":"referer",
			"orderby":"orden ASC",
			"sortdrag":"enabled"
		},
		"fields": {
			"id_slider_home": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"titulo": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"imagen_principal": {
				"mode": "int(11)",
				"null": "YES",
				"key": "MUL",
				"default": "",
				"ftype":"biblioteca",
				"extra": "images",
				"nolist":"nolist"
			},
			"texto_boton": {
				"mode": "varchar(200)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"url": {
				"mode": "varchar(300)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"destino": {
				"mode": "enum('_self','_blank','lightbox')",
				"null": "YES",
				"key": "",
				"default": "_self",
				"extra": "",
				"ftype":"input_radio",
				"fvalue":"_self,_blank",
				"nolist":"nolist",
				"nolist":"nolist"
			},
			"orden": {
				"mode": "int(11)",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": ""
			},
			"programar_desde": {
				"mode": "date",
				"null": "YES",
				"key": "MUL",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"3,3,open",
				"nolist":"nolist"
			},
			"programar_hasta": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "date",
				"size":"2,4,close",
				"nolist":"nolist"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1"
			}
		}
	},
	"templates": {
		"fields": {
			"id_template": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"codigo": {
				"mode": "varchar(45)",
				"null": "NO",
				"key": "MUL",
				"default": null,
				"extra": ""
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			}
		}
	},
	"tipos_contenidos": {
		"config": {
			"orderby":"orden ASC",
			"sortdrag":"enabled"
		},
		"fields": {
			"id_tipo_contenido": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			}
		}
	},
	"usuarios": {
		"config": {
			"export":"excel",
			"action_after_save":"usuarios_after_save"
		},
		"fields": {
			"id_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			},
			"celular": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"size":"3,4,open"
								
			},
			"telefono": {
				"mode": "varchar(100)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"size":"1,4,close"
			},
			"direccion": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist"
			},
			"id_perfil_usuario": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"perfiles_usuarios,id_perfil_usuario,nombre",
				"keylink":"perfiles_usuarios,id_perfil_usuario,nombre"
			},
			"genero": {
				"mode": "enum('masculino','femenino')",
				"null": "NO",
				"key": "",
				"default": "masculino",
				"extra": "",
				"ftype":"input_radio",
				"nolist":"nolist",
				"fvalue":"masculino,femenino"
			},
			"fecha_nacimiento": {
				"mode": "date",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "",
				"nolist":"nolist",
				"ftype":"date_birth"
			},
			"email": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype": "user_email"
			},
			"password": {
				"mode": "varchar(256)",
				"null": "YES",
				"key": "",
				"default": null,
				"extra": "md5",
				"nolist":"nolist",
				"ftype": "input_password"
			},
			"id_usuarios_categorias":{  
				"mode":"int(11)",
				"extra":"multijoin",
				"default":"MULTIJOIN",
				"ftype":"special_select_categorias",
				"fvalue":"table",
				"fjoin":"categorias,id_categoria,nombre",
				"multijoin":"usuarios_categorias,id_usuario,id_categoria",
				"nolist":"nolist",
				"custom_sqlfunction":"get_all_categorias"
			},
			"enviar_clave": {
				"mode": "enum('off','on')",
				"null": "NO",
				"key": "",
				"default": "off",
				"extra": "",
				"ftype": "input_radio",
				"fvalue":"off,on",
				"size":"3,3,open",
				"nolist":"nolist"
			},
			"estado": {
				"mode": "enum('0','1')",
				"null": "NO",
				"key": "",
				"default":1,
				"ftype":"input_radio",
				"fvalue":"0,1",
				"size":"3,3,close"
			}
		}
	},
	"zonas_geograficas": {
		"fields": {
			"id_zona_geografica": {
				"mode": "int(11)",
				"null": "NO",
				"key": "PRI",
				"default": null,
				"extra":"autoincrement",
				"nolist":"nolist",
				"ftype":"input_hidden"
			},
			"localizacion": {
				"mode": "char(2)",
				"null": "NO",
				"key": "MUL",
				"default": "FUNCTION",
				"default_function": "localizacion",
				"nolist":"nolist",
				"extra": "",
				"ftype":"input_hidden"
			},
			"id_padre": {
				"mode": "int(11)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": "",
				"ftype":"select",
				"fvalue":"table",
				"fjoin":"zonas_geograficas,id_zona_geografica,nombre",
				"keylink":"zonas_geograficas,id_zona_geografica,nombre"
			},
			"nombre": {
				"mode": "varchar(200)",
				"null": "NO",
				"key": "",
				"default": null,
				"extra": ""
			}
		}
	}
}
END;
 ?>