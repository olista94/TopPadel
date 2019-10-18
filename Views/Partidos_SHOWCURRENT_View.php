 <?php
  //Declaracion de la clase
 class Partidos_SHOWCURRENT{
	//Datos del torneo
	var $datos;
	//Variable con el enlace al DELETE torneo
	var $enlace;
	var $fila;
	
	//Constructor de la clase
	function __construct($datos,$enlace){
		
		$this -> datos = $datos;
		$this -> enlace = $enlace;
		$this -> fila = $this -> datos -> fetch_array();
		$this -> mostrar();
		
	}
	//Funcion que "muestra" el contenido de la página
	function mostrar(){
        //Variable de idioma
        if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH';
        }
//Archivo del idioma
        include '../Locales/Strings_'. $_SESSION['idioma'] .'.php';
        ?>
              <!--Tabla con los datos del torneo--> 
			<div class="show-half">
			
				<form class="formShow" enctype="multipart/form-data" action="../Controllers/Torneos_Controller.php">
            	<!--Clave del torneo que se pasa como hidden al model-->
				<input type="hidden" name="ID_Torneo" value= "<?php echo $this -> fila['ID_Torneo'] ?>">	
            	<table class="showU" style="margin-left: 30%;">	

                <tr><th class="title" colspan="4"><?php echo $strings['Detalles del torneo']; ?>
                   <!--Boton para volver atrás -->
				   <button onclick="location.href='../Controllers/Torneos_Controller.php';" class="volver"></button></th>
                </tr>
				 <!--Campo ID_Torneo del torneo-->
                <tr>
                    <th><?php echo $strings['Fecha']; ?></th>
                    <td><?php echo $this -> fila['fecha']; ?></td>
                </tr>
				 <!--Campo nombre del torneo-->
                <tr>
                    <th><?php echo $strings['Hora']; ?></th>
                    <td><?php echo $this -> fila['hora']; ?></td>
                </tr>
				 <!--Campo descripcion del torneo-->				
				<tr>
                    <th><?php echo $strings['Ronda']; ?></th>
                    <td><?php echo $this -> fila['ronda']; ?></td>
                </tr>
				<!--Campo telefono del torneo-->
				
				<tr>
                    <th><?php echo $strings['Grupo']; ?></th>
                    <td><?php echo $this -> fila['grupo']; ?></td>
                </tr>
				

                <tr>
                    <th><?php echo $strings['Sets Local']; ?></th>
                    <td><?php echo $this -> fila['Sets_Local']; ?></td>
                </tr>

                <tr>
                    <th><?php echo $strings['Sets Visitante']; ?></th>
                    <td><?php echo $this -> fila['Sets_Visitante']; ?></td>
                </tr>

				   
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>