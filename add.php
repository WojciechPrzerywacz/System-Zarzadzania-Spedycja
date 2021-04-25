<?php 
	include('templates/session.php');
	include('db_connect.php');
	$nazwa = $adres_odb = $adres_dost = $kraj = '';
	$ID_zleceniodawcy = $ID_zleceniobiorcy = $ID_kierowcy = $kwota = 0;
	$errors = array('nazwa' => '', 'adres_odb' => '', 'adres_dost' => '', 'kwota' => '', 'kraj' => '', 'ID_zleceniodawcy' => '', 'ID_zleceniobiorcy' => '', 'ID_kierowcy' => '');

	if(empty($_POST['nazwa'])){
		$errors['nazwa'] = 'Pole wymagane';
	} else{
		$nazwa = $_POST['nazwa'];
	}
	if(empty($_POST['adres_odb'])){
		$errors['adres_odb'] = 'Pole wymagane';
	} else{
		$adres_odb = $_POST['adres_odb'];
	}
	if(empty($_POST['adres_dost'])){
		$errors['adres_dost'] = 'Pole wymagane';
	} else{
		$adres_dost = $_POST['adres_dost'];
	}
	if(empty($_POST['kwota'])){
		$errors['kwota'] = 'Pole wymagane';
	} else{
		$kwota = $_POST['kwota'];
	}
	if(empty($_POST['kraj'])){
		$errors['kraj'] = 'Pole wymagane';
	} else{
		$kraj = $_POST['kraj'];
	}
	if(empty($_POST['ID_zleceniodawcy'])){
		$errors['ID_zleceniodawcy'] = 'Pole wymagane';
	} else{
		$ID_zleceniodawcy = $_POST['ID_zleceniodawcy'];
	}
	if(empty($_POST['ID_zleceniobiorcy'])){
		$errors['ID_zleceniobiorcy'] = 'Pole wymagane';
	} else{
		$ID_zleceniobiorcy = $_POST['ID_zleceniobiorcy'];
	}	
	if(empty($_POST['ID_kierowcy'])){
		$errors['ID_kierowcy'] = 'Pole wymagane';
	} else{
		$ID_kierowcy = $_POST['ID_kierowcy'];
	}


	if(array_filter($errors)){
		//echo 'errors in form';
	} else {
		// escape sql chars
		
		$nazwa = mysqli_real_escape_string($conn, $_POST['nazwa']);
		$adres_odb = mysqli_real_escape_string($conn, $_POST['adres_odb']);
		$adres_dost = mysqli_real_escape_string($conn, $_POST['adres_dost']);
		$kwota = mysqli_real_escape_string($conn, $_POST['kwota']);
		$kraj = mysqli_real_escape_string($conn, $_POST['kraj']);
		$ID_zleceniodawcy = mysqli_real_escape_string($conn, $_POST['ID_zleceniodawcy']);
		$ID_zleceniobiorcy = mysqli_real_escape_string($conn, $_POST['ID_zleceniobiorcy']);
		$ID_kierowcy = mysqli_real_escape_string($conn, $_POST['ID_kierowcy']);
		$my_ID = $_SESSION["session_ID"];
		// create sql
		$sql = "INSERT INTO `zamówienia` (`id_zamówienia`, `Nazwa towaru`, `Adres odbioru`, `Adres dostawy`, `Kwota`, `Kraj`, `id_zleceniodawcy`, `id_zleceniobiorcy`, `id_spedytora`, `id_kierowcy`) 
		VALUES (NULL, '$nazwa', '$adres_odb', '$adres_dost', $kwota, '$kraj', $ID_zleceniodawcy, $ID_zleceniobiorcy, $my_ID, $ID_kierowcy)";

		// save to db and check
		if(mysqli_query($conn, $sql)){
			// success
			header('Location: zamowienia.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

		
	}

	if(isset($_POST['submit'])){
		echo htmlspecialchars($_POST["nazwa"] . '<br />');
		echo htmlspecialchars($_POST["adres_odb"] . '<br />');
		echo htmlspecialchars($_POST["adres_dost"] . '<br />');
		echo htmlspecialchars($_POST["kwota"] . '<br />');
		echo htmlspecialchars($_POST["kraj"] . '<br />');
		echo htmlspecialchars($_POST["ID_zleceniodawcy"] . '<br />');
		echo htmlspecialchars($_POST["ID_zleceniobiorcy"] . '<br />');
		echo htmlspecialchars($_POST["ID_kierowcy"] . '<br />');
	}

?>

<!DOCTYPE html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<html>
	
	<?php include('templates/login_header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Dodaj zamówienie</h4>
		<form class="white" action="add.php" method="POST">

			<label>Nazwa zamówienia:</label>
			<input type="text" name="nazwa" required><br>
			<label>Adres odbioru:</label>
			<input type="text" name="adres_odb" required><br>
			<label>Adres dostawy:</label>
			<input type="text" name="adres_dost" required><br>
			<label>Kwota:</label>
			<input type="number" name="kwota" required><br>
			<label>Kraj:</label>
			<input type="text" name="kraj" required><br>
			<label>ID zleceniodawcy:</label>
			<input type="number" name="ID_zleceniodawcy" required><br>
			<label>ID zleceniobiorcy:</label>
			<input type="number" name="ID_zleceniobiorcy" required><br>
			<label>ID kierowcy:</label>
			<input type="number" name="ID_kierowcy" required><br>

			<div class="center">
				<input type="submit" name="submit" value="Dalej" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
