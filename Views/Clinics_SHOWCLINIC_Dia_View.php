<?php
//Comprobamos que está autenticado
include_once '../Functions/Authentication.php';


 class Clinics_SHOWCLINIC_Dia{	 

	//Variable con el enlace al showall
	var $apuntados;	
	var $dia;	
	var $enlace;	
	//Constructor de la clase
	function __construct($apuntados,$dia,$enlace){

		$this -> apuntados = $apuntados;
		$this -> dia = $dia;
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
                                

			
			<form class="tableActions" action="../Controllers/Clases_Grupales_has_Usuarios_Controller.php" method="post">
			<input type="hidden" name="ID_Clase" value="<?php echo $this -> apuntados -> fetch_array()[0]; ?>">
			<input type="hidden" name="dia2" value="<?php echo $this->dia; ?>">
					<div>
					<label style="margin-left: 40%;font-size: 16px;" class="lblSearch" for="action">
					<?php echo $strings['Dia']; ?>:</label>
					<select class="slcSearch" name="dia1">
					<?php for($i = 1; $i < 2; $i++){
						?>
					<option  value="<?php echo 'dia'.$i;?>"><?php echo 'Dia '.$i;?></option>
						
						<?php
							}
						?>
						
					</select>
					<button style="margin-right: 45%;margin-top: 12px;" type="submit" name="action" value="Ver_Dia" value="Submit" 
						class="buscar-little"></button>
					<ul>
					
						<?php $this -> apuntados -> data_seek(0);
						while($login = $this -> apuntados -> fetch_array()){?>
							
							<li style="display:inline-block; margin: 30px"> <label for="tipo"> <?php echo $login[1]; ?></label>
					<select name="<?php echo $login[1]; ?>">
					<option style="background: #80c60e;" value="0" <?php if($login[2] == 0) echo "selected"; ?>><?php echo $strings['Asiste']; ?></option>
					<option style="background: #fa312a;" value="1" <?php if($login[2] == 1) echo "selected"; ?>><?php echo $strings['Falta']; ?></option>
					</select>
							
							</li>
							<?php
						}
						?>							
					</ul>
					</div>
					<button style="margin-right: 50%;margin-left: 50%;" type="submit" name="action" value="Guardar_Asistencia" value="Submit" class="guardar"></button>
				</form>
			       
	</div> 	
       
<?php   
    }
}
?>

    
<footer>
<!--Pie de pagina-->
	<?php include '../Views/Footer.php'; ?>
</footer>

