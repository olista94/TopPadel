<!-- TABLA QUE MUESTRA TODAS LAS PROMOCIONES
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->

<?php
//Comprueba si esta autenticado
include_once '../Functions/Authentication.php';
//Header
include_once '../Views/Header.php';
 //Declaracion de la clase 
 class Promociones_SHOWALL_Todas{ 
	//Datos de datos
	var $datos;
	var $usuarios;
	var $usuarios2;
	//Variable con el enlace al showall
	var $enlace;	
	
	//Constructor de la clase
	function __construct($datos,$usuarios,$enlace){
		$this -> datos = $datos;
		$this -> usuarios = $usuarios;
		$this -> usuarios2 = [];
		//Cuenta el numero de usuarios
		if($this -> usuarios -> num_rows > 0){
			while($usu = $this -> usuarios -> fetch_array()){
						$this -> usuarios2[$usu[1]] = $usu[0];	
							}
		}
		$this -> enlace = $enlace;
		$this -> pinta();
	}
	//Funcion que "muestra" el contenido de la página	
	function pinta(){
		//Variable de idioma
		if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH';
        }
//Archivo del idioma
        include '../Locales/Strings_'. $_SESSION['idioma'] .'.php';
?>

 <!--Tabla con los datos de los usuarios-->
	<div class="showall">   
                                
		<table class="showAllUsers">
			<tr><th class="title" colspan="4"><?php echo $strings['Promociones']; ?>
			
			<form class="tableActions" action="../Controllers/Promociones_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="buscar-little" name="action" value="Confirmar_SEARCH1" type="submit"></button>
			<button class="anadir-little"  name="action" value="Confirmar_ADD1" type="submit"></button>
			</form>
			<form class="tableActions" action="../Controllers/Promociones_Controller.php" method="">
					<div>
						<label class="lblSearch" for="action"><?php echo $strings['Mostrar']; ?>:</label>
						<select class="slcSearch" name="action" id="action" onchange="this.form.submit()">
							
							<option value="Mostrar_Todas"><?php echo $strings['Todas']; ?></option>
							<option value="Mostrar_Mias"><?php echo $strings['Mis promos']; ?></option>
							
						</select>

					</div>
				</form>
			</th></tr>
			<!--Campos a mostrar-->
			<tr>
				<th><?php echo $strings['Usuario']; ?></th>
				<th><?php echo $strings['Fecha']; ?></th>
				<th><?php echo $strings['Hora']; ?></th>
				<th><?php echo $strings['Anotados']; ?></th>
				<th></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		
			while($fila = $this ->datos->fetch_array()){      
		
		?>
			<tr>
				<form action="../Controllers/Promociones_Controller.php" method="post" name="action" >
					
					<input type="hidden" name="ID_Promo" value="<?php echo $fila['ID_Promo']; ?>">
					<!--Datos-->
					<td><?php echo $fila['usuarios_login_usuario']; ?></td>
					<td><?php echo $fila['fecha']; ?></td>
					<td><?php echo $fila['hora_inicio'] ?></td>
					<td>
						 <!--Muestra el numero de usuarios-->
						<?php
						if($this -> usuarios-> num_rows == 0){
							//Si no hay usuarios muestra 0
							echo '0';
						}
						else{
							$entra = 0;
							//Foreach para contar los usuarios que tiene la tarea
							foreach($this -> usuarios2 as $indice => $valor){
								if($indice == $fila['ID_Promo']){
									$entra = 1;
									echo $valor;
								}
							}
							if($entra == 0){
								echo '0';
							}
							$entra = 0;
						}
						?>
						</td>					
					<td style="text-align:right">
					
					
					<!--Botones para editar,borrar o ver en detalle-->
						
						
						<button class="add" name="action" value="Confirmar_SHOWCURRENT" type="submit"></button>
						<button class="inscripcion" name="action" value="Confirmar_INSCRIPCION1" type="submit"></button>
					
					</form>
					</td>
				
			</tr>
		<?php
			}
		?>                    
		</table>        
	</div>           
        
<?php   
    }
}
?>
    
<footer>
<!--Pie de pagina-->
	<?php include '../Views/Footer.php'; ?>
</footer>