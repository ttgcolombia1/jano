<?php
require_once ("core/builder/HtmlBase.class.php");


class Fieldset  extends HtmlBase{
    
    function marcoAgrupacion($tipo, $atributos = "") {
    
        $this->cadenaHTML = "";
        if (isset ( $atributos [self::ESTILO] ) && $atributos [self::ESTILO] == "jqueryui") {
            if ($tipo == self::INICIO) {
                $this->cadenaHTML = "<div ";
    
                if (isset ( $atributos ["id"] )) {
                    $this->cadenaHTML .= "id='" . $atributos ["id"] . "' ";
                }
    
                if (isset ( $atributos [self::ESTILOENLINEA] ) && $atributos [self::ESTILOENLINEA] != "") {
                        $this->cadenaHTML .= "style='" . $atributos [self::ESTILOENLINEA] . "' ";
                    }
                
                $this->cadenaHTML .= ">\n";
                $this->cadenaHTML .= "<fieldset class='ui-widget ui-widget-content' ";
    
                $this->cadenaHTML .= ">\n";
                if (isset ( $atributos [self::LEYENDA] )) {
                    $this->cadenaHTML .= "<legend class='ui-state-default ui-corner-all'>\n" . $atributos [self::LEYENDA] . "</legend>\n";
                }
            } else {
                $this->cadenaHTML .= "</fieldset>\n";
                $this->cadenaHTML .= "</div>\n";
            }
        } else {
    
            if ($tipo == self::INICIO) {
                $this->cadenaHTML = "<div class='marcoControles'>\n";
                $this->cadenaHTML .= "<fieldset ";
                if (isset ( $atributos ["id"] )) {
                    $this->cadenaHTML .= "id='" . $atributos ["id"] . "' ";
                }
                $this->cadenaHTML .= ">\n";
                if (isset ( $atributos [self::LEYENDA] )) {
                    $this->cadenaHTML .= "<legend>\n" . $atributos [self::LEYENDA] . "</legend>\n";
                }
            } else {
                $this->cadenaHTML .= "</fieldset>\n";
                $this->cadenaHTML .= "</div>\n";
            }
        }
        return $this->cadenaHTML;
    
    }
    
    
    
    /**
     * Agrupaciones que no deben tener una división propia
     *
     * @param unknown $tipo
     * @param string $atributos
     * @return Ambigous <string, unknown>
     *
     */
    function agrupacion($tipo, $atributos = "") {
    
        $this->cadenaHTML = "";
    
        if ($tipo == self::INICIO) {
            $this->cadenaHTML .= "<fieldset ";
            if (isset ( $atributos ["id"] )) {
                $this->cadenaHTML .= "id='" . $atributos ["id"] . "' ";
            }
            $this->cadenaHTML .= ">\n";
            if (isset ( $atributos [self::LEYENDA] )) {
                $this->cadenaHTML .= "<legend>\n" . $atributos [self::LEYENDA] . "</legend>\n";
            }
        } else {
            $this->cadenaHTML .= "</fieldset>\n";
        }
    
        return $this->cadenaHTML;
    
    }
    
    
    
}