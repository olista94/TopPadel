
<?php
  	 //Comprueba que esta autenticado
	include_once '../Functions/Authentication.php';
  //Declaracion de la clase
 class Promociones_INSCRIPCION{
	
//Datos de la reserva	
	var $fila;
	//Prioridad de la reserva
	var $pista;
	var $socio;
	//Variable con el enlace a la tabla DELETE
	var $enlace;
	//Constructor de la clase	
	function __construct($fila,$pista,$socio,$enlace){

		$this -> fila = $fila -> fetch_array();

		$this -> pista = $pista -> fetch_array();
		
		$this -> socio = $socio;
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

                    <tr><th class="title" colspan="4"><?php echo $strings['¿Apuntarse a esta promocion?']; ?>
                        <!--Boton para volver atrás -->
						<button onclick="location.href='../Controllers/	Promociones_Controller.php';" class="volver"></button></th>
                    </tr>
					
					<tr>
                        <th><?php echo $strings['Usuario']; ?></th>
                        <td><?php echo $this -> fila['usuarios_login_usuario']; ?></td>								
                    </tr>
					
                    <tr>
                        <th><?php echo $strings['Pista']; ?></th>
                        <td><?php if($this -> fila['cerrada'] == 'NO')
                                    echo "-";
                                    else
                                        echo $this -> pista['Nombre_Pista'];
                         ?></td>
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
                        <th><?php echo $strings['Metodo de pago']; ?></th>
                        <td><?php echo $this -> fila['pago']; ?></td>
                    </tr>
					
					<tr>
                        <th><?php echo $strings['Precio']; ?></th>
                        <td><?php if ($this -> socio == 'SI')
								echo "10€";
							else
								echo "20€";

						?></td>
                    </tr>
					
					   <tr>
					<!--Boton de confirmar borrado-->
                        <th><button class="aceptar" type="submit" name="action" value="Confirmar_INSCRIPCION2"></button></th>
                    
                    </tr> 
                                                                            
                </table>
            </form>            
        </div>       
        
<?php    
    }
}
?>