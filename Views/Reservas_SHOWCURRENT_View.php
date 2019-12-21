 
<?php
  	 //Comprueba que esta autenticado
	include_once '../Functions/Authentication.php';
		 class Reservas_SHOWCURRENT{
	
//Datos de la reserva	
	var $datos;
	//Prioridad de la reserva
	var $pista;
	var $socio;
	//Variable con el enlace a la tabla DELETE
	var $enlace;
	//Constructor de la clase	
	function __construct($datos,$pista,$socio,$enlace){

		$this -> fila = $datos -> fetch_array();

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
					
					<tr>
                        <th><?php echo $strings['Precio']; ?></th>
                        <td><?php if ($this -> fila['usuarios_login'] == 'admin')
								echo "1€";
							else if ($this -> socio == 'SI')
								echo "10€";
							else if ($this -> socio == 'NO')
								echo "20€";

						?></td>
                    </tr>
					
					<tr>
                        <th><?php echo $strings['Metodo de pago']; ?></th>
                        <td><?php if($this -> fila['pago'] == 'Paypal')
								echo $strings['Paypal'];
							else if($this -> fila['pago'] == 'Tarjeta')
								echo $strings['Tarjeta'];
							else if($this -> fila['pago'] == 'Contrareembolso')
								echo $strings['Efectivo'];
								?></td>
                    </tr>
					
					<?php if($this -> fila['pago'] == 'Tarjeta'){
					?>
				<tr>
                    <th><?php echo $strings['CCV']; ?></th>
                    <td><?php echo $this -> fila['CCV']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Numero de tarjeta']; ?></th>
                    <td><?php echo $this -> fila['num_tarjeta']; ?></td>
                </tr>
				<?php
				}
				?>
					
                                                                            
                </table>
            </form>            
        </div>       
        
<?php    
			}
		}

?>