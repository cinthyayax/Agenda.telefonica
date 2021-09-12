<?php
include "funciones/simples.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agenda Telef&oacute;nica</title>

    <!-- Adjuntar documentos JavaScript -->
    <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
    <script type="text/javascript" language="javascript" src="js/validations.js"></script>
    <script type="text/javascript" language="javascript" src="js/number-functions.js"></script>    
    <!-- fin adjuntar documento JavaScript -->

    <!-- Adjuntar documentos CSS -->
    <style type="text/css">
        @import url("css/plantilla.css");
        @import url("css/contenido.css");
    </style>
    <!-- Adjuntar documentos CSS -->

    </head>

    <body class="oneColFixCtr">

        <div id="container">
            <div id="header">
                <div id="logoagenda"><img src="images/telefono.jpg" width="50" height="35"/></div>
                <div id="blanco">    
                    <ul id="menuAgenda">   
                        <li><a><?php echo fecha(); ?></a></li>
                        <li><a href="http://www.muniguate.com" target="new">Municipalidad de Guatemala</a></li>
                        <li><a href="http://www.muniguate.com/control-territorial/" target="new">DCT</a></li>                          
                    </ul>
                </div> <!-- fin blanco -->
                
                <!-- inicio verde -->
                <div id="verde"></div>
                <!-- fin verde -->
        
            </div> <!-- fin header -->

            <?php
                /*LLamado a menu.php */
                include ('front_menu.php');	
            ?>	   

            <div id="contenido">
                <?php
                    /*Imprime los formularios */                    
                    $opc = $_GET['id'];                       
                    switch ($opc) 
                    {
                        case 1 : require_once("front_mensajes.php"); break;   // Despliega los mensajes                     
                        case 2 : require_once("front_tipotelefono.php"); break;	
                        case 3 : require_once("front_empresatelefono.php"); break;	
                        case 4 : require_once("front_departamentopersona.php"); break;	
                        case 5 : require_once("front_persona.php"); break;  
                        case 6 : require_once("front_registrotelefono.php"); break;                      																											
                        default : require_once("front_consultagenda.php"); break; 
                    }                                          
                ?>       
            </div>
            <!-- fin contenido -->   
        </div>  
        <!--fin container -->
    </body>
</html>


