
 
<?php
  	 //Comprueba que esta autenticado
	include_once '../Functions/Authentication.php';
  //Declaracion de la clase
 class Promociones_DELETE{
	
//Datos de la reserva	
	var $fila;
	//Prioridad de la reserva
	var $pista;
	//Variable con el enlace a la tabla DELETE
	var $enlace;
	//Constructor de la clase	
	function __construct($fila,$pista,$enlace){

		$this -> fila = $fila -> fetch_array();

		$this -> pista = $pista -> fetch_array();
		$this -> enlace = $enlace;

		$this -> mostrar();

	}

	//función que pinta la vista
    function mostrar(){
        //comprueba si hay un idioma en $_SESSION
        //si no, inserta el idioma español
        if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH';
        }
		//Archivo del idioma
        include '../Locales/Strings_'. $_SESSION['idioma'] .'.php';
?>
     	<!--Tabla con los datos de la reserva-->       
		<div class="show-half">
            <form class="formShow" enctype="multipart/form-data" action="../Controllers/Promociones_Controller.php">
                 <!--Clave de la reserva que se pasa como hidden al model-->
				<input type="hidden" name="ID_Promo" value= "<?php echo $this -> fila['ID_Promo'] ?>">
				
                <table class="showU" style="margin-left: 30%;">

                    <tr><th class="title" colspan="4"><?php echo $strings['Borrar promocion']; ?>
                        <!--Boton para volver atrás -->
						<button onclick="location.href='../Controllers/	Promociones_Controller.php';" class="volver"></button></th>
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['ID Promocion']; ?></th>
                        <td><?php echo $this -> fila['ID_Promo']; ?></td>								
                    </tr>
					
					<tr>
                        <th><?php echo $strings['Usuario']; ?></th>
                        <td><?php echo $this -> fila['usuarios_login_usuario']; ?></td>								
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Pista']; ?></th>
                        <td><?php echo $this -> pista['Nombre_Pista']; ?></td>
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Fecha']; ?></th>
                        <td><?php echo $this -> fila['fecha']; ?></td>
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Hora inicio']; ?></th>
                        <td><?php echo $this -> fila['hora_inicio']; ?></td>
                    </tr>
					   <tr>
					<!--Boton de confirmar borrado-->
                        <th><button class="borrar-si" type="submit" name="action" value="Confirmar_DELETE2"></button></th>
                     <!--Boton de cancelar borrado--> 
					   <td><button class="borrar-no" type="submit" name="action" value=""></button></td>
                    </tr> 
                                                                            
                </table>
            </form>            
        </div>       
        
<?php    
    }
}
?>