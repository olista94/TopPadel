
<?php
if($_SESSION['tipo'] == "ADMIN" || $_SESSION['tipo'] == "NORMAL"){
class Index {
  //Constructor de la clase
	function __construct(){
		$this->render();
	}
  //Pagina principal de la aplicación
	function render(){	
		header('Location:../Controllers/Torneos_Controller.php');
	}

}
}else{
	class Index {
  //Constructor de la clase
	function __construct(){
		$this->render();
	}
  //Pagina principal de la aplicación
	function render(){	
		header('Location:../Controllers/Clases_Particulares_Controller.php');
	}

}
}
?>