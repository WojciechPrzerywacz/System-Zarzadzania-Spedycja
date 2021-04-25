<?php 
    include('templates/session.php');
    include('db_connect.php');

    if(isset($_POST['delete'])){

        echo '<script>myfunction()</script>';
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        echo $id_to_delete;
        $sql = "DELETE FROM `zamówienia` WHERE `zamówienia`.`id_zamówienia` = $id_to_delete";

        if(mysqli_query($conn, $sql)){
			header('Location: zamowienia.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

		//if(mysqli_query($conn, $sql))
		

	}

	$sql = "SELECT * FROM zamówienia";

	$result = mysqli_query($conn, $sql);

	//rows as an array
	$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);
	mysqli_close($conn);

    //print_r($orders);
?>

<!DOCTYPE html>

<html>
	
<?php include('templates/login_header.php'); ?>

<h4 class="center grey-text">Zamówienia</h4>

<div class="container">
    <div class="row">

        <?php foreach($orders as $order){ if($order['id_spedytora']==$ID){ ?>

            <div class="col s6 m6">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h5>Nazwa Towaru: <?php echo htmlspecialchars($order["Nazwa towaru"]); ?></h5>
                        <div>Numer zamówienia: <?php echo htmlspecialchars($order['id_zamówienia']); ?></div>
                        <div>Adres odbioru: <?php echo htmlspecialchars($order['Adres odbioru']); ?></div>
                        <div>Adres dostawy: <?php echo htmlspecialchars($order['Adres dostawy']); ?></div>
                        <div>Kwota zamówienia: <?php echo htmlspecialchars($order['Kwota']); ?></div>
                        <div>Kraj: <?php echo htmlspecialchars($order['Kraj']); ?></div>
                        <div>Numer zleceniodawcy: <?php echo htmlspecialchars($order['id_zleceniodawcy']); ?></div>
                        <div>Numer zleceniobiorcy: <?php echo htmlspecialchars($order['id_zleceniobiorcy']); ?></div>
                        <div>Numer spedytora: <?php echo htmlspecialchars($order['id_spedytora']); ?></div>
                        <div>Numer kierowcy: <?php echo htmlspecialchars($order['id_kierowcy']); ?></div>
                    </div>

                <div>
                    <form action="zamowienia.php" method="POST">
                        <div class="card-action center-align">
                            <a class="btn brand z-depth-0" href="zamowienia_details.php?variable1=<?php echo htmlspecialchars($order['id_zamówienia']); ?>&variable2=<?php echo htmlspecialchars($order["Nazwa towaru"]); ?>">Szczegóły</a>
                            <a class="btn brand z-depth-0" href="zamowienia_state.php?variable1=<?php echo htmlspecialchars($order['id_zamówienia']); ?>&variable2=<?php echo htmlspecialchars($order["Nazwa towaru"]); ?>">Status</a>
                            <a class="btn brand z-depth-0" href="add.php">Edytuj</a>
                            <input type="hidden" name="id_to_delete" value="<?php echo $order['id_zamówienia']; ?>">
                            <input type="submit" name="delete" value="Usuń" onclick='return confirm("Jesteś pewien że chcesz usunąć to zamówienie?");' class="btn brand z-depth-0">
                        </div>
                    </form>
                </div>

                </div>
            </div>

        <?php } } ?>

    </div>
</div>

<?php include('templates/footer.php'); ?>

</html>

