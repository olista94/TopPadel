<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';

class Clases_Grupales_SHOWCLASE_Admin{	 

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
			<tr><th style="border:none;background: #FFF;" class="title" colspan="4"><?php echo $strings['Pagos']; ?>
			<form class="tableActions" action="../Controllers/Clases_Grupales_Controller.php" method="">
			<!--Botones para añadir o buscar-->
			<input type="hidden" name="ID_Clase" value="<?php echo $this -> apuntados -> fetch_array()[0]; ?>">
			</form></th></tr>
	<!--Campos Categoria,nombre,Edicion,Fecha,Nivel -->
			<tr>
			
				<th style="border-left:none;border-top:none;background: #FFF"></th>
				<th style="text-align:center"><?php echo $strings['Metodo de pago'];?></th>
				<th style="text-align:center"><?php echo $strings['CCV'];?></th>
				<th style="text-align:center"><?php echo $strings['Numero de tarjeta'];?></th>
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
					<!-- ************************************************* -->
							<td style="text-align:center"><?php echo $fila['pago']; ?></td>
							<td style="text-align:center"><?php if($fila['CCV'] == null)
								echo '-';
							else
								echo $fila['CCV']; ?></td>
							
							<td style="text-align:center"><?php if($fila['num_tarjeta'] == null)
								echo '-';
							else
								echo $fila['num_tarjeta']; ?></td>
						
		
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