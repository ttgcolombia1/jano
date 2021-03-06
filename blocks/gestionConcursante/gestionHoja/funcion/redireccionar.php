<?php

namespace gestionConcursante\gestionHoja\funcion;

if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("index.php");
	exit ();
}
class redireccion {
	public static function redireccionar($opcion, $valor = "") {
		$miConfigurador = \Configurador::singleton ();
		//$miPaginaActual = $miConfigurador->getVariableConfiguracion ( "pagina" );
                $miPaginaActual="gestionConcursante";
		$pestanna="";
		switch ($opcion) {

                        case "actualizoBasicos":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoBasico";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;
                            
                        case "actualizoContacto":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoContacto";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;                            
                            
                        case "actualizoFormacion":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoFormacion";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;                            

                        case "actualizoProfesional":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoProfesional";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;                                  
                            
                        case "actualizoDocencia":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoDocencia";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;                                   

                        case "actualizoActividad":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoActividad";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;                                   

                        case "actualizoInvestigacion":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoInvestigacion";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;  
                        case "actualizoProduccion":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoProduccion";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;                              
                        case "actualizoIdioma":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizoIdioma";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombre'];
                                $variable.="&apellidos=".$valor['apellido'];
                                break;                              
                    case "inserto":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=confirma";
                                $variable.="&identificacion=".$valor['identificacion'];
                                $variable.="&nombres=".$valor['nombres'];
                                $variable.="&apellidos=".$valor['apellidos'];
                                $variable.="&correo=".$valor['correo'];
                                $variable.="&telefono=".$valor['telefono'];
                                $variable.="&perfilUs=".$valor['perfilUs'];
                                $variable.="&password=".$valor['pass'];
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                break;

                        case "noInserto":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=error";
                                if($valor!=""){
                                        $variable.="&identificacion=".$valor['identificacion'];
                                        $variable.="&nombres=".$valor['nombres'];
                                        $variable.="&apellidos=".$valor['apellidos'];
                                        $variable.="&correo=".$valor['correo'];
                                        $variable.="&telefono=".$valor['telefono'];
                                        $variable.="&password=".$valor['password'];
                                }
                                break;

                        case "existe":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=existe";
                                if($valor!=""){
                                        $variable.="&identificacion=".$valor['identificacion'];
                                        $variable.="&nombres=".$valor['nombres'];
                                        $variable.="&apellidos=".$valor['apellidos'];
                                        $variable.="&correo=".$valor['correo'];
                                        $variable.="&telefono=".$valor['telefono'];
                                        $variable.="&password=".$valor['password'];
                                }
                                break;  
                                
                        case "existeLog":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=existeLog";
                                if($valor!=""){
                                        $variable.="&id_usuario=".$valor['id_usuario'];
                                        $variable.="&identificacion=".$valor['identificacion'];
                                        $variable.="&nombres=".$valor['nombre'];
                                        $variable.="&apellidos=".$valor['apellido'];
                                }
                                break;                        

                        case "borro":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=borro";
                                $variable.="&tipo=".$valor['tipo'];
                                $variable.="&dato=".$valor['dato'];
                                break;                                 
                        case "noBorro":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=noBorro";
                                $variable.="&tipo=".$valor['tipo'];
                                break;                                  
                   
                                
                        case "actualizo":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=actualizo";
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                $variable.="&nombres=".$valor['nombres'];
                                $variable.="&apellidos=".$valor['apellidos'];
                                $variable.="&correo=".$valor['correo'];
                                $variable.="&telefono=".$valor['telefono'];

                                break;

                        case "noActualizo":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=errorActualizo";
                                if($valor!=""){
                                    $variable.="&id_usuario=".$valor['id_usuario'];
                                    $variable.="&nombres=".$valor['nombre'];
                                    $variable.="&apellidos=".$valor['apellido'];
                                    }
                                break;        

                        case "inhabilitar":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=inhabilito";
                                $variable.="&id_usuario=".$valor;

                                break;

                        case "noinhabilitar":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=noInhabilito";
                                if($valor!=""){
                                        $variable.="&id_usuario=".$valor;
                                }
                                break;        

                        case "habilitar":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=habilito";
                                $variable.="&id_usuario=".$valor;

                                break;

                        case "nohabilitar":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=nohabilito";
                                if($valor!=""){
                                        $variable.="&id_usuario=".$valor;
                                }
                                break;   
                                
                        case "insertoPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=confirmaPerfil";
                                $variable.="&perfilUs=".$valor['perfilUs'];
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                break;
                            
                        case "noInsertoPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=errorPerfil";
                                if($valor!=""){
                                       $variable.="&id_usuario=".$valor['id_usuario'];
                                    }
                                break;

                        case "editoPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=confirmaEditaPerfil";
                                $variable.="&perfilUs=".$valor['perfilUs'];
                                $variable.="&id_usuario=".$valor['id_usuario'];
                                break;

                        case "noEditoPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=errorEditaPerfil";
                                if($valor!=""){
                                       $variable.="&id_usuario=".$valor['id_usuario'];
                                    }
                                break;
                                
                        case "inhabilitarPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=inhabilitoPerfil";
                                $variable.="&id_usuario=".$valor;

                                break;

                        case "noinhabilitarPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=noInhabilitoPerfil";
                                if($valor!=""){
                                        $variable.="&id_usuario=".$valor;
                                }
                                break;        

                        case "habilitarPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=habilitoPerfil";
                                $variable.="&id_usuario=".$valor;

                                break;

                        case "nohabilitarPerfil":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mensaje";
                                $variable.="&mensaje=nohabilitoPerfil";
                                if($valor!=""){
                                        $variable.="&id_usuario=".$valor;
                                }
                                break;                         

                        case "confirmarNuevo":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=confirmar";
                                if($valor!=""){
                                        $variable.="&id_sesion=".$valor;
                                }
                                break;
			
			case "paginaPrincipal" :
				$variable = "pagina=" . $miPaginaActual;
				break;
                        case "devolver":
                                $variable="pagina=".$miPaginaActual;
                                $variable.="&opcion=mostrar";
                                $pestanna="#tab".$_REQUEST['tipo'];
                                
                                break;     
		}
		
		foreach ( $_REQUEST as $clave => $valor ) {
			unset ( $_REQUEST [$clave] );
		}
		
		$url = $miConfigurador->configuracion ["host"] . $miConfigurador->configuracion ["site"] . "/index.php?";
		$enlace = $miConfigurador->configuracion ['enlace'];
		$variable = $miConfigurador->fabricaConexiones->crypto->codificar ( $variable );
		$_REQUEST [$enlace] = $enlace . '=' . $variable;
		$redireccion = $url . $_REQUEST [$enlace].$pestanna;
		
		echo "<script>location.replace('" . $redireccion . "')</script>";
		
		// $enlace =$miConfigurador->getVariableConfiguracion("enlace");
		// $variable = $miConfigurador->fabricaConexiones->crypto->codificar($variable);
		// // echo $enlace;
		// // // echo $variable;
		// // exit;
		// $_REQUEST[$enlace] = $variable;
		// $_REQUEST["recargar"] = true;
		// return true;
	}
}

?>