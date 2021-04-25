<?php 
	include('db_connect.php');
	include('templates/session.php');
	$typ_klienta = $nazwa = $kraj = $miasto = $ulica = '';
	$NIP = $telefon = 0;
	$errors = array('typ_klienta' => '', 'nazwa' => '', 'kraj' => '', 'miasto' => '', 'ulica' => '', 'NIP' => '', 'telefon' => '');

	if(empty($_POST['typ_klienta'])){
		$errors['typ_klienta'] = 'Pole wymagane';
	} else{
		$typ_klienta = $_POST['typ_klienta'];
	}
	if(empty($_POST['nazwa'])){
		$errors['nazwa'] = 'Pole wymagane';
	} else{
		$nazwa = $_POST['nazwa'];
	}
	if(empty($_POST['kraj'])){
		$errors['kraj'] = 'Pole wymagane';
	} else{
		$kraj = $_POST['kraj'];
	}
	if(empty($_POST['miasto'])){
		$errors['miasto'] = 'Pole wymagane';
	} else{
		$miasto = $_POST['miasto'];
	}
	if(empty($_POST['ulica'])){
		$errors['ulica'] = 'Pole wymagane';
	} else{
		$ulica = $_POST['ulica'];
	}
	if(empty($_POST['NIP'])){
		$errors['NIP'] = 'Pole wymagane';
	} else{
		$NIP = $_POST['NIP'];
	}
	if(empty($_POST['telefon'])){
		$errors['telefon'] = 'Pole wymagane';
	} else{
		$telefon = $_POST['telefon'];
	}	
	

	if(array_filter($errors)){
		//echo 'errors in form';
	} else {
		// escape sql chars
		
		$typ_klienta = mysqli_real_escape_string($conn, $_POST['typ_klienta']);
		$nazwa = mysqli_real_escape_string($conn, $_POST['nazwa']);
		$NIP = mysqli_real_escape_string($conn, $_POST['NIP']);
		$telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
		$kraj = mysqli_real_escape_string($conn, $_POST['kraj']);
		$miasto = mysqli_real_escape_string($conn, $_POST['miasto']);
		$ulica = mysqli_real_escape_string($conn, $_POST['ulica']);
		//$adres=$miasto+$ulica;

		// create sql
			$sql="INSERT INTO `kontakty` (`id_kontaktu`, `Nazwa`, `Telefon`, `NIP`, `Adres`) VALUES (NULL, '$nazwa', '$telefon', '$NIP', '$ulica')";
		

		// save to db and check
		if(mysqli_query($conn, $sql)){
			// success
			header('Location: clients.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

		
	}

	if(isset($_POST['submit'])){
		echo htmlspecialchars($_POST["typ_klienta"] . '<br />');
		echo htmlspecialchars($_POST["NIP"] . '<br />');
		echo htmlspecialchars($_POST["telefon"] . '<br />');
		echo htmlspecialchars($_POST["kwota"] . '<br />');
		echo htmlspecialchars($_POST["kraj"] . '<br />');
		echo htmlspecialchars($_POST["miasto"] . '<br />');
		echo htmlspecialchars($_POST["ulica"] . '<br />');
	}

?>

<!DOCTYPE html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<html>
	
	<?php include('templates/login_header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Utwórz klienta</h4>
		<form class="white" action="add_client.php" method="POST">

			<label>Typ klienta:</label>
			<input type="text" name="typ_klienta" required><br>
			<label>Nazwa:</label>
			<input type="text" name="nazwa" required><br>
			<label>NIP:</label>
			<input type="number" name="NIP" required minlength="10" maxlength="10"><br>
			<label>Telefon kontaktowy:</label>
			<input type="number" name="telefon" required minlength="9" maxlength="9"><br>
			<label>Kraj:</label>
			<input type="text" name="kraj" required><br>
			<label>Miasto:</label>
			<input type="text" name="miasto" required><br>
			<label>Ulica:</label>
			<input type="text" name="ulica" required><br>


			<div class="center">
				<input type="submit" name="submit" value="Dalej" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
