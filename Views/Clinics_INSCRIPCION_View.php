
 
  <?php
  //Declaracion de la clase
 class Clinics_INSCRIPCION{

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
            <form class="formShow" enctype="multipart/form-data" action="../Controllers/Clinics_Controller.php">
                <!--ID del usuario tipo hidden para enviarlo al model-->
				<input type="hidden" name="ID_Clase" value= "<?php echo $this -> fila['ID_Clase'] ?>">
                <table class="showU" style="margin-left: 30%;">

                <tr><th class="title" colspan="4"><?php echo $strings['¿Apuntarse a este clinic?']; ?>
					<!--Boton para volver atras-->
				   <button onclick="location.href='../Controllers/Clinics_Controller.php';" class="volver"></button></th>
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
                    <th><?php echo $strings['Invitado']; ?></th>
                    <td><?php echo $this -> fila['invitado']; ?></td>
                </tr>
				
                <tr>
                    <th><?php echo $strings['Fecha']; ?></th>
                    <td><?php echo $this -> fila['fecha_limite']; ?></td>
                </tr>

				
				 <tr>
                    <th><?php echo $strings['Tope']; ?></th>
                    <td><?php echo $this -> fila['tope']; ?></td>
                </tr>
				
				<!--Confirmar borrado-->
					<th><button class="aceptar" type="submit" name="action" value="Confirmar_INSCRIPCION2"></button></th>

                </tr> 
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>