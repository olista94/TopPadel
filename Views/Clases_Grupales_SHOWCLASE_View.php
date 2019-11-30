<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';

 //Declaracion de la clase 
 class Clases_Grupales_SHOWCLASE{	 
	//Datos de los contactos
	var $apuntados;

	//Variable con el enlace al showall
	var $enlace;	
	//Constructor de la clase
	function __construct($apuntados,$enlace){
		$this -> apuntados = $apuntados;
		$this -> idclase = $apuntados ->fetch_array()[0];
		$this -> enlace = $enlace;
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

<!--Tabla con los datos de los torneos-->
	<div class="showall">       

<form class="generar-cal-form" id="generar-cal-form" action="../Controllers/Clases_Grupales_has_Usuarios_Controller.php" method="post" name="action" >
<?php

?>
					
					<button class="guardar" name="action" value="Guardar_Asistencia" type="submit"></button>
					<input type="hidden" name="ID_Clase" value=<?php echo $this-> idclase; ?>>
					
				</form>		
		<table class="tablaClases">
			<tr><th style="border:none" class="title" colspan="4"><?php echo $strings['Apuntados']; ?>
			<tr>
				<th <?php echo $strings['Jugadores'];?>></th>
				<th><?php echo $strings['Dia'];echo " 1"; ?></th>
				<th><?php echo $strings['Dia'];echo " 2"; ?></th>
				<th><?php echo $strings['Dia'];echo " 3"; ?></th>
				<th><?php echo $strings['Dia'];echo " 4"; ?></th>
				<th><?php echo $strings['Dia'];echo " 5"; ?></th>
				<th><?php echo $strings['Dia'];echo " 6"; ?></th>
				<th><?php echo $strings['Dia'];echo " 7"; ?></th>
				<th><?php echo $strings['Dia'];echo " 8"; ?></th>
				<th><?php echo $strings['Dia'];echo " 9"; ?></th>
				<th><?php echo $strings['Dia'];echo " 10"; ?></th>

			</tr>
		<?php 
		//Mientras haya filas en la bd
		//if(!is_array($this -> parejas))
				while($apuntados=$this->apuntados->fetch_array()){
					
	
		?>
			<tr>
				<form action="../Controllers/Clases_Grupales_has_Usuarios_Controller.php" method="post" name="action" >
				<input type="hidden" name="ID_Clase" value=<?php echo $apuntados['ID_Clase']; ?>>
				<input type="hidden" name="login_usuario" value=<?php echo $apuntados['login_usuario']; ?>>
					
					<td><?php echo $apuntados['login_usuario']; ?></td>		
					<td name = "dia1"><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia1" value="<?php echo $apuntados['dia1']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia2" value="<?php echo $apuntados['dia2']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia3" value="<?php echo $apuntados['dia3']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia4" value="<?php echo $apuntados['dia4']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia5" value="<?php echo $apuntados['dia5']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia6" value="<?php echo $apuntados['dia6']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia7" value="<?php echo $apuntados['dia7']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia8" value="<?php echo $apuntados['dia8']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia9" value="<?php echo $apuntados['dia9']; ?>"></td>			
					<td><input style="width:100%;height:100%;padding:0;margin:0;border:0" type="number" min="0" max="1" name="dia10" value="<?php echo $apuntados['dia10']; ?>"></td>					
				</form>	
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

