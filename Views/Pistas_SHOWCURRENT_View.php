<!-- TABLA QUE MUESTRA LOS DATOS DE UNA PISTA A BORRAR
CREADO POR: Los Cangrejas
Fecha: 20/12/2018-->

<?php
//Incluimos el archivo para comprobar la autenticacion del usuario
    include_once '../Functions/Authentication.php';    
     //Declaracion de la clase
	class Pistas_SHOWCURRENT{
	 
	//Datos de la pista
	var $datos;	
	var $fila;
	//Variable con el enlace al DELETE pista
	var $enlace;
	
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
         <!--Tabla con los datos de la categoria-->   
        <div class="show-half">
		<!--ID de la categoria que se pasa como hidden al model-->
			<form class="formShow" enctype="multipart/form-data" action="../Controllers/Pistas_Controller.php">
            <input type="hidden" name="ID_Pista" value= "<?php echo $this -> fila['ID_Pista'] ?>">	
            <table class="showU" style="margin-left: 30%;">

                <tr><th class="title" colspan="2"><?php echo $strings['Detalles de la pista']; ?>
                   <!--Boton para volver atrás -->
				   <button onclick="location.href='../Controllers/Pistas_Controller.php';" class="volver"></button></th>
                </tr>
				<!--Campo ID de la pista-->
                <tr>
                    <th><?php echo $strings['ID pista']; ?></th>
                    <td><?php echo $this -> fila['ID_Pista']; ?></td>								
                </tr>
				<!--Campo nombre de la pista-->
                <tr>
                    <th><?php echo $strings['Nombre de la pista']; ?></th>
                    <td><?php echo $this -> fila['Nombre_Pista']; ?></td>
                </tr>   
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>