<?php
use gestionConcursante\gestionHoja\funcion\redireccion;

if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("../index.php");
	exit ();
}
class consultarProfesional {
	var $miConfigurador;
	var $lenguaje;
	var $miFormulario;
	var $miSql;
        var $miSesion;
        var $rutaSoporte;   
	function __construct($lenguaje, $formulario, $sql) {
		$this->miConfigurador = \Configurador::singleton ();
		
		$this->miConfigurador->fabricaConexiones->setRecursoDB ( 'principal' );
		
		$this->lenguaje = $lenguaje;
		
		$this->miFormulario = $formulario;
		
		$this->miSql = $sql;
                
                $this->miSesion = \Sesion::singleton();
                
	}
	function miForm() {
		
		// Rescatar los datos de este bloque
		$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );
                
                $rutaBloque = $this->miConfigurador->getVariableConfiguracion("host");
                $rutaBloque.=$this->miConfigurador->getVariableConfiguracion("site") . "/blocks/";
                $rutaBloque.= $esteBloque['grupo'] . "/" . $esteBloque['nombre'];
		
                $directorio = $this->miConfigurador->getVariableConfiguracion("host");
                $directorio.= $this->miConfigurador->getVariableConfiguracion("site") . "/index.php?";
                $directorio.=$this->miConfigurador->getVariableConfiguracion("enlace");
                $this->rutaSoporte = $this->miConfigurador->getVariableConfiguracion ( "host" ) .$this->miConfigurador->getVariableConfiguracion ( "site" ) . "/blocks/";
                
		// ---------------- SECCION: Parámetros Globales del Formulario ----------------------------------
		/**
		 * Atributos que deben ser aplicados a todos los controles de este formulario.
		 * Se utiliza un arreglo
		 * independiente debido a que los atributos individuales se reinician cada vez que se declara un campo.
		 *
		 * Si se utiliza esta técnica es necesario realizar un mezcla entre este arreglo y el específico en cada control:
		 * $atributos= array_merge($atributos,$atributosGlobales);
		 */
		
		$atributosGlobales ['campoSeguro'] = 'true';
		
		$_REQUEST ['tiempo'] = time ();
		
		// -------------------------------------------------------------------------------------------------
                $conexion="estructura";
		$esteRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB ( $conexion );
	//identifca lo roles para la busqueda de subsistemas
            $parametro=array('id_usuario'=>$_REQUEST['usuario']);    
            $cadena_sql = $this->miSql->getCadenaSql("consultarExperiencia", $parametro);
            $resultadoListaProfesional = $esteRecursoDB->ejecutarAcceso($cadena_sql, "busqueda");
            $esteCampo = "marcoListaProfesional";
            $atributos ['id'] = $esteCampo;
            $atributos ["estilo"] = "jqueryui";
            $atributos ['tipoEtiqueta'] = 'inicio';
            $atributos ["leyenda"] = "<b>".$this->lenguaje->getCadena ( $esteCampo )."</b>";
            echo $this->miFormulario->marcoAgrupacion ( 'inicio', $atributos );
            unset ( $atributos );
                {

                echo "<div ><table width='100%' align='center'>
                        <tr align='center'>
                            <td align='center'>";
                                $esteCampo = 'nuevoProfesional';
                                $atributos ['id'] = $esteCampo;
                                $atributos ['enlace'] = "#";//$variableNuevo;
                                $atributos ['onClick'] ="show(\"marcoProfesional\")";
                                $atributos ['tabIndex'] = 1;
                                $atributos ['enlaceTexto'] = $this->lenguaje->getCadena ( $esteCampo );
                                $atributos ['estilo'] = 'textoPequenno textoGris';
                                $atributos ['enlaceImagen'] = $rutaBloque."/images/new.png";
                                $atributos ['posicionImagen'] = "atras";//"adelante";
                                $atributos ['ancho'] = '45px';
                                $atributos ['alto'] = '45px';
                                $atributos ['redirLugar'] = true;
                                echo $this->miFormulario->enlace ( $atributos );
                                unset ( $atributos );
                echo "            </td>
                        </tr>
                      </table></div> ";

                    if($resultadoListaProfesional)
                        {	
                            //-----------------Inicio de Conjunto de Controles----------------------------------------
                                $esteCampo = "marcoConsultaProfesional";
                                $atributos["estilo"] = "jqueryui";
                                $atributos["leyenda"] = $this->lenguaje->getCadena($esteCampo);
                                //echo $this->miFormulario->marcoAgrupacion("inicio", $atributos);
                                unset($atributos);
                                echo "<div class='cell-border'><table id='tablaProfesional' class='table table-striped table-bordered'>";
                                echo "<thead>
                                        <tr align='center'>
                                            <th>Pais</th>
                                            <th>Ingreso</th>                                            
                                            <th>Terminación</th>                                            
                                            <th>Cargo</th>
                                            <th>Actividades</th>
                                            <th>Institución</th>
                                            <th>Tipo</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Certificación</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                foreach($resultadoListaProfesional as $key=>$value )
                                    {   $parametro['tipo']='unico';
                                        $parametroSop = array('consecutivo'=>$resultadoListaProfesional[$key]['consecutivo_persona'],
                                             'tipo_dato'=>'datosExperiencia',
                                             'nombre_soporte'=>'soporteExperiencia',
                                             'consecutivo_dato'=>$resultadoListaProfesional[$key]['consecutivo_experiencia']
                                            );
                                        
                                        $cadenaSop_sql = $this->miSql->getCadenaSql("buscarSoporte", $parametroSop);
                                        $resultadoSprof = $esteRecursoDB->ejecutarAcceso($cadenaSop_sql, "busqueda");
                                        
                                        $variableEditar = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( 'pagina' );                                                        
                                        $variableEditar.= "&opcion=mostrar";
                                        $variableEditar.= "&usuario=" . $this->miSesion->getSesionUsuarioId();
                                        $variableEditar.= "&id_usuario=" .$_REQUEST['usuario'];
                                        $variableEditar.= "&campoSeguro=" . $_REQUEST ['tiempo'];
                                        $variableEditar.= "&tiempo=" . time ();
                                        $variableEditar .= "&consecutivo_experiencia=".$resultadoListaProfesional[$key]['consecutivo_experiencia'];
                                        $variableEditar .= "&consecutivo_persona=".$resultadoListaProfesional[$key]['consecutivo_persona'];       
                                        $variableEditar = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($variableEditar, $directorio);
                                        $variableEditar.= "#tabProfesional";
                                        
                                        $mostrarHtml = "<tr align='center'>
                                                <td align='left'>".$resultadoListaProfesional[$key]['pais']."</td>
                                                <td align='left'>".$resultadoListaProfesional[$key]['fecha_inicio']."</td>
                                                <td align='left'>".$resultadoListaProfesional[$key]['fecha_fin']."</td>
                                                <td align='left'>".$resultadoListaProfesional[$key]['cargo']."</td>
                                                <td align='left'>".$resultadoListaProfesional[$key]['descripcion_cargo']."</td>                                                    
                                                <td align='left'>".$resultadoListaProfesional[$key]['nombre_institucion']."</td>
                                                <td align='left'>".$resultadoListaProfesional[$key]['nivel_institucion']."</td>
                                                <td align='left'>".$resultadoListaProfesional[$key]['telefono_institucion']."</td>
                                                <td align='left'>".$resultadoListaProfesional[$key]['correo_institucion']."</td>";
                                      
                                        $mostrarHtml .= "<td>";
                                                    if(isset($resultadoSprof[0]['alias']))
                                                        {
                                                          $esteCampo = 'archivoexperiencia'.$resultadoTarjeta[0]['consecutivo_soporte'];
                                                          $atributos ['id'] = $esteCampo;
                                                          $atributos ['enlace'] = 'javascript:soporte("ruta_experiencia'.$resultadoSprof[0]['consecutivo_soporte'].'");';
                                                          $atributos ['tabIndex'] = 0;
                                                          $atributos ['columnas'] = 2;
                                                          $atributos ['enlaceTexto'] = $resultadoSprof[0]['alias'];
                                                          $atributos ['estilo'] = 'clasico';
                                                          $atributos ['enlaceImagen'] = $rutaBloque."/images/pdfImage.png";
                                                          $atributos ['posicionImagen'] ="atras";//"adelante";
                                                          $atributos ['ancho'] = '25px';
                                                          $atributos ['alto'] = '25px';
                                                          $atributos ['redirLugar'] = false;
                                                          $atributos ['valor'] = '';
                                                          $mostrarHtml .= $this->miFormulario->enlace( $atributos );
                                                          unset ( $atributos );
                                                           // --------------- FIN CONTROL : Cuadro de Texto --------------------------------------------------  
                                                          $esteCampo = 'ruta_experiencia'.$resultadoSprof[0]['consecutivo_soporte'];
                                                          $atributos ['id'] = $esteCampo;
                                                          $atributos ['nombre'] = $esteCampo;
                                                          $atributos ['tipo'] = 'hidden';
                                                          $atributos ['etiqueta'] = "";//$this->lenguaje->getCadena ( $esteCampo );
                                                          $atributos ['obligatorio'] = false;
                                                          $atributos ['valor'] = $this->rutaSoporte.$resultadoSprof[0]['ubicacion']."/".$resultadoSprof[0]['archivo'];
                                                          $atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo . 'Titulo' );
                                                          $atributos ['deshabilitado'] = FALSE;
                                                          $mostrarHtml .= $this->miFormulario->campoCuadroTexto ( $atributos );
                                                          // --------------- FIN CONTROL : Cuadro de Texto --------------------------------------------------  
                                                        }
                                        $mostrarHtml .= "</td>
                                                        <td>";
                                                    //-------------Enlace-----------------------
                                                    $esteCampo = "editar";
                                                    $atributos["id"]=$esteCampo;
                                                    $atributos['enlace']=$variableEditar;
                                                    $atributos['tabIndex']=$esteCampo;
                                                    $atributos['redirLugar']=true;
                                                    $atributos['estilo']='clasico';
                                                    $atributos['enlaceTexto']='';
                                                    $atributos['ancho']='25';
                                                    $atributos['alto']='25';
                                                    $atributos['enlaceImagen']=$rutaBloque."/images/edit.png";
                                                    $mostrarHtml .= $this->miFormulario->enlace($atributos);
                                                    unset($atributos);    
                                        $mostrarHtml .= "</td>";
                                       $mostrarHtml .= "</tr>";
                                       echo $mostrarHtml;
                                       unset($mostrarHtml);
                                       unset($variable);
                                    }
                                echo "</tbody>";
                                echo "</table></div>";
                                //Fin de Conjunto de Controles

                        }else
                        {
                                $atributos["id"]="divNoEncontroProfesional";
                                $atributos["estilo"]="";
                           //$atributos["estiloEnLinea"]="display:none"; 
                                echo $this->miFormulario->division("inicio",$atributos);

                                //-------------Control Boton-----------------------
                                $esteCampo = "noEncontroProfesional";
                                $atributos["id"] = $esteCampo; //Cambiar este nombre y el estilo si no se desea mostrar los mensajes animados
                                $atributos["etiqueta"] = "";
                                $atributos["estilo"] = "centrar";
                                $atributos["tipo"] = 'error';
                                $atributos["mensaje"] = $this->lenguaje->getCadena($esteCampo);;
                                echo $this->miFormulario->cuadroMensaje($atributos);
                                unset($atributos); 
                                //-------------Fin Control Boton----------------------

                               echo $this->miFormulario->division("fin");
                                //------------------Division para los botones-------------------------
                        }
                }
            echo $this->miFormulario->marcoAgrupacion ( 'fin' );
            unset ( $atributos );
    }
}

$miSeleccionador = new consultarProfesional ( $this->lenguaje, $this->miFormulario, $this->sql );

$miSeleccionador->miForm ();
?>