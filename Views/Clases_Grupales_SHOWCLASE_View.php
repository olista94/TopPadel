<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';


 class Clases_Grupales_SHOWCLASE{	 

	//Variable con el enlace al showall
	var $apuntados;	
	var $enlace;	
	//Constructor de la clase
	function __construct($apuntados,$enlace){

		$this -> apuntados = $apuntados;
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

<div class="showall">   
     <table class="asistencia">
			<tr><th style="border:none;" class="title" colspan="4"><?php echo $strings['Clases']; ?>
			<form class="tableActions" action="../Controllers/Clases_Grupales_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="guardar" name="action" value="Confirmar_Edit_SHOWCLASE" type="submit"></button>
			<input type="hidden" name="ID_Clase" value="<?php echo $this -> apuntados -> fetch_array()[0]; ?>">
			</form></th></tr>
	<!--Campos Categoria,nombre,Edicion,Fecha,Nivel -->
			<tr>
			
				<th style="border-left:none;border-top:none;"></th>
				<th><?php echo $strings['Dia'];echo " 1" ?></th>
				<th><?php echo $strings['Dia'];echo " 2" ?></th>
				<th><?php echo $strings['Dia'];echo " 3" ?></th>
				<th><?php echo $strings['Dia'];echo " 4" ?></th>
				<th><?php echo $strings['Dia'];echo " 5" ?></th>
				<th><?php echo $strings['Dia'];echo " 6" ?></th>
				<th><?php echo $strings['Dia'];echo " 7" ?></th>
				<th><?php echo $strings['Dia'];echo " 8" ?></th>
				<th><?php echo $strings['Dia'];echo " 9" ?></th>
				<th><?php echo $strings['Dia'];echo " 10" ?></th>
			</tr>
		<?php 
		//Mientras haya filas en la bd
		$this -> apuntados -> data_seek(0);
			while($fila = $this -> apuntados->fetch_array()){                        
		?>
			<tr>
				<form action="../Controllers/Clases_Grupales_Controller.php" method="post" name="action" >
					<input type="hidden" name="ID_Clase" value="<?php echo $fila['ID_Clase']; ?>">
					<!--Datos-->
					
					<td style="border:1px solid black;border-left:none;border-collapse:collapse;"><?php echo $fila['login_usuario']; ?></td>	
							
					<td><?php if($fila['dia1'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>

							<td><?php if($fila['dia2'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia3'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia4'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia5'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia6'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia7'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia8'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia9'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>
							
							<td><?php if($fila['dia10'] == 0){
								echo $strings['Asiste'];
							}
							else{
								echo $strings['Falta'];
							}?></td>		
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

