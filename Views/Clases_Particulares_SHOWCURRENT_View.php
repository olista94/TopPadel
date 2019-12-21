
 
  <?php
  //Declaracion de la clase
 class Clases_Particulares_SHOWCURRENT{

	//Datos del usuario
	var $datos;
	var $pista;
	//Variable con el enlace al form para ADD usuaro
	var $enlace;
	var $fila;
	
	//Constructor de la clase	
	function __construct($datos,$pista,$enlace){
	
		$this -> datos = $datos;
		$this -> pista = $pista -> fetch_array();
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
            <form class="formShow" enctype="multipart/form-data" action="../Controllers/Clases_Particulares_Controller.php">
                <!--ID del usuario tipo hidden para enviarlo al model-->
				<input type="hidden" name="ID_Clase" value= "<?php echo $this -> fila['ID_Clase'] ?>">
                <table class="showU" style="margin-left: 30%;">

                <tr><th class="title" colspan="4"><?php echo $strings['Datos de la clase']; ?>
					<!--Boton para volver atras-->
				   <button onclick="location.href='../Controllers/Clases_Particulares_Controller.php';" class="volver"></button></th>
                </tr>
				<!--Campo login del usuario-->
                <tr>
                    <th><?php echo $strings['Deportista']; ?></th>
                    <td><?php echo $this -> fila['login_usuario']; ?></td>								
                </tr>
				<!--Campo password del usuario-->
                <tr>
                    <th><?php echo $strings['Entrenador']; ?></th>
                    <td><?php echo $this -> fila['login_entrenador']; ?></td>
                </tr>
				<!--Campo nombre del usuario-->
                <tr>
                    <th><?php echo $strings['Fecha']; ?></th>
                    <td><?php echo $this -> fila['fecha_clase']; ?></td>
                </tr>
				<!--Campo apellidos del usuario-->
                <tr>
                    <th><?php echo $strings['Hora']; ?></th>
                    <td><?php echo $this -> fila['hora_clase']; ?></td>
                </tr>
				<!--Campo DNI del usuario-->
                <tr>
                    <th><?php echo $strings['Pista']; ?></th>
                    <td><?php echo $this -> pista['Nombre_Pista']; ?></td>
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

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>