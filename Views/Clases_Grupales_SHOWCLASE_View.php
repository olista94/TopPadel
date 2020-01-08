<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';


 class Clases_Grupales_SHOWCLASE{	 

	//Variable con el enlace al showall
	var $apuntados;	
	var $num_sesiones;	
	var $enlace;	
	//Constructor de la clase
	function __construct($apuntados,$num_sesiones,$enlace){
		$this -> apuntados = $apuntados;
		$this -> num_sesiones = $num_sesiones;
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
			<tr><th style="border:none;background: #FFF;" class="title" colspan="4"><?php echo $strings['Asistencia']; ?>
			<form class="tableActions" action="../Controllers/Clases_Grupales_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<button class="refrescar" name="action" value="Confirmar_Edit_SHOWCLASE" type="submit"></button>
			<input type="hidden" name="ID_Clase" value="<?php echo $this -> apuntados -> fetch_array()[0]; ?>">
			</form></th></tr>
	<!--Campos Categoria,nombre,Edicion,Fecha,Nivel -->
			<tr>
			
				<th style="border-left:none;border-top:none;background: #FFF"></th>
				<?php
					for ($i=1; $i <= $this->num_sesiones; $i++) { 
						?>
						<th><?php echo $strings['Dia'];echo " $i" ?></th>
						<?php
					}
				?>
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
					
					<!-- Estilo para alternar colores entre filas da table -->
					<style type='text/css'>
						tr:nth-child(odd) {	
    						background-color:#f2f2f2; /*gris*/	
						}	
						tr:nth-child(even) {	
    						background-color:#FFF; /*azul*/	
						} 	
					</style>
					<!-- ************************************************* -->
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

