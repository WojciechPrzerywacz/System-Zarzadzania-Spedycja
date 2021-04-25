<?php
include('db_connect.php');
//session_start();
//$_SESSION["nazwa"]="";
//$_SESSION["session_ID"]="";

$nazwa = $email = $haslo = '';
$ID_spedytora = 0;
$errors = array('nazwa' => '', 'haslo' => '');

if(empty($_POST['email'])){
	$errors['email'] = 'Podaj email';
} else{
	$email = $_POST['email'];
}

if(empty($_POST['haslo'])){
	$errors['haslo'] = 'Podaj hasło';
} else{
	$haslo = $_POST['haslo'];
}
 
if(array($errors)){
	//echo 'errors in form';
} else {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$haslo = mysqli_real_escape_string($conn, $_POST['haslo']);

}

$sql = "SELECT * FROM spedytorzy";

$result = mysqli_query($conn, $sql);

$speditors = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($speditors);
    
mysqli_free_result($result);
mysqli_close($conn);
 
foreach($speditors as $speditor){
	if($speditor["e-mail"]==$email && $speditor["hasło"]==$haslo){
		session_start();
		$_SESSION["nazwa"]=$speditor["nazwa"];
		$_SESSION["session_ID"]=$speditor["id_spedytora"];
		header('Location: zamowienia.php');
	}
}
//echo $_SESSION["nazwa"];
//echo $_SESSION["session_ID"];

?>


<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Zaloguj</h4>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>E-Mail</label>
			<input type="email" name="email">
			<label>Hasło</label>
			<input type="password" name="haslo">
			<div class="center">
			<input type="submit"  name="submit" value="Zaloguj" class="brand">
			</div>
		</form>
	</section>

	<?php


	?>

	<?php include('templates/footer.php'); ?>

</html>