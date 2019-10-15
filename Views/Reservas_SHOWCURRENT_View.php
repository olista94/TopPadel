<!-- TABLA QUE MUESTRA LOS DATOS DE UNA reserva A BORRAR
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->
 
<?php
  	 //Comprueba que esta autenticado
	include_once '../Functions/Authentication.php';
  //Declaracion de la clase
 class Reservas_SHOWCURRENT{
	
//Datos de la reserva	
	var $datos;
	//Prioridad de la reserva
	var $pista;
	//Variable con el enlace a la tabla DELETE
	var $enlace;
	//Constructor de la clase	
	function __construct($datos,$pista,$enlace){

		$this -> fila = $datos -> fetch_array();

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
            <form class="formShow" enctype="multipart/form-data" action="../Controllers/Reservas_Controller.php">
                 <!--Clave de la reserva que se pasa como hidden al model-->
				<input type="hidden" name="usuarios_login" value= "<?php echo $this -> fila['usuarios_login'] ?>">
				<input type="hidden" name="pista_ID_Pista" value= "<?php echo $this -> fila['pista_ID_Pista'] ?>">
				<input type="hidden" name="fecha_reserva" value= "<?php echo $this -> fila['fecha_reserva'] ?>">
				<input type="hidden" name="hora_inicio" value= "<?php echo $this -> fila['hora_inicio'] ?>">
                <table class="showU" style="margin-left: 30%;">

                    <tr><th class="title" colspan="4"><?php echo $strings['Detalles de la reserva']; ?>
                        <!--Boton para volver atrás -->
						<button onclick="location.href='../Controllers/Reservas_Controller.php';" class="volver"></button></th>
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Usuario']; ?></th>
                        <td><?php echo $this -> fila['usuarios_login']; ?></td>	
						
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Pista']; ?></th>
                        <td><?php echo $this -> pista['Nombre_Pista']; ?></td>
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Fecha reserva']; ?></th>
                        <td><?php echo $this -> fila['fecha_reserva']; ?></td>
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Hora inicio']; ?></th>
                        <td><?php echo $this -> fila['hora_inicio']; ?></td>
                    </tr>

                                                                            
                </table>
            </form>            
        </div>       
        
<?php    
    }
}
?>