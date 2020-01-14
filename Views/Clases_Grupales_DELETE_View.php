
 
  <?php
  //Declaracion de la clase
 class Clases_Grupales_DELETE{

	//Datos del usuario
	var $datos;
	//Variable con el enlace al form para ADD usuaro
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
             <!--Tabla con los datos del usuario-->
			<div class="show-half">
            <form class="formShow" enctype="multipart/form-data" action="../Controllers/Clases_Grupales_Controller.php">
                <!--ID del usuario tipo hidden para enviarlo al model-->
				<input type="hidden" name="ID_Clase" value= "<?php echo $this -> fila['ID_Clase'] ?>">
                <table class="showU" style="margin-left: 30%;">

                <tr><th class="title" colspan="4"><?php echo $strings['Borrar clase']; ?>
					<!--Boton para volver atras-->
				   <button onclick="location.href='../Controllers/Clases_Grupales_Controller.php';" class="volver"></button></th>
                </tr>


				<tr>
                    <th><?php echo $strings['Descripcion']; ?></th>
                    <td><?php echo $this -> fila['descripcion']; ?></td>
                </tr>
				
				
                <tr>
                    <th><?php echo $strings['Entrenador']; ?></th>
                    <td><?php echo $this -> fila['login_entrenador']; ?></td>
                </tr>	
				
                <tr>
                    <th><?php echo $strings['Fecha limite']; ?></th>
                    <td><?php echo $this -> fila['fecha_limite']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Tope']; ?></th>
                    <td><?php echo $this -> fila['tope']; ?></td>
                </tr>
				
				<!--Confirmar borrado-->
					<th><button class="borrar-si" type="submit" name="action" value="Confirmar_DELETE2"></button></th>
					<!--Cancelar borrado-->
					<td><button class="borrar-no" type="submit" name="action" value=""></button></td>
                </tr> 
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>