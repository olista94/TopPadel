<!-- TABLA QUE MUESTRA LOS DATOS DE UN USUARIO
CREADO POR: Los Cangrejas
Fecha: 20/12/2018-->


<?php
 //Declaracion de la clase
 class Usuarios_SHOWCURRENT{
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
            <table class="showU" style="margin-left: 30%;">

                <tr><th class="title" colspan="4"><?php echo $strings['Detalles del usuario']; ?>
                   <!--Boton para volver atras-->
				   <button onclick="location.href='../Controllers/Usuarios_Controller.php';" class="volver"></button></th>
                </tr>
				<!--Campo login del usuario-->
                <tr>
                    <th><?php echo $strings['Login']; ?></th>
                    <td><?php echo $this -> fila['login']; ?></td>								
                </tr>
				<!--Campo password del usuario-->
                <tr>
                    <th><?php echo $strings['Contraseña']; ?></th>
                    <td><?php echo $this -> fila['password']; ?></td>
                </tr>
				<!--Campo nombre del usuario-->
                <tr>
                    <th><?php echo $strings['Nombre']; ?></th>
                    <td><?php echo $this -> fila['nombre']; ?></td>
                </tr>
				<!--Campo apellidos del usuario-->
                <tr>
                    <th><?php echo $strings['Apellidos']; ?></th>
                    <td><?php echo $this -> fila['apellidos']; ?></td>
                </tr>
				<!--Campo DNI del usuario-->
                <tr>
                    <th><?php echo $strings['DNI']; ?></th>
                    <td><?php echo $this -> fila['dni']; ?></td>
                </tr>
				<!--Campo telefono del usuario-->
                <tr>
                    <th><?php echo $strings['Teléfono']; ?></th>
                    <td><?php echo $this -> fila['telefono']; ?></td>
                </tr>
				<!--Campo email del usuario-->
                <tr>
                    <th><?php echo $strings['Email']; ?></th>
                    <td><?php echo $this -> fila['email']; ?></td>
                </tr>     
				<!--Campo fecha de nacimiento del usuario-->				
				<tr>
                    <th><?php echo $strings['Fecha de nacimiento']; ?></th>
                    <td><?php echo $this -> fila['fecha']; ?></td>
                </tr>
				<!--Campo tipo del usuario (ADMIN O NORMAL)-->
				<tr>
                    <th><?php echo $strings['Tipo']; ?></th>
                    <td><?php if($this -> fila['tipo'] == 'Admin') echo $strings['Admin'];
					else echo $strings['Deportista']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Sexo']; ?></th>
                    <td><?php if($this -> fila['sexo'] == 'Masculina') echo $strings['Hombre'];
					else echo $strings['Mujer']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Socio']; ?></th>
                    <td><?php if($this -> fila['socio'] == 'SI') echo $strings['SI'];
					else echo $strings['NO']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['IBAN']; ?></th>
                    <td><?php if($this -> fila['IBAN'] == '') echo $strings['No es socio'];
					else echo $this -> fila['IBAN']; ?></td>
                </tr>
				
				<tr>
                    <th><?php echo $strings['Cuenta']; ?></th>
                    <td><?php if($this -> fila['cuenta'] == '') echo $strings['No es socio'];
					else echo $this -> fila['cuenta']; ?></td>
                </tr>
                                                                        
            </table>

        </div>
            
        </body>
        </html>
        
        <?php
    
        }
    }
?>