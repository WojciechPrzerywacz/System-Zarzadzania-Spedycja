<?php 
	include('templates/session.php');
    include('db_connect.php');

    if(isset($_POST['delete'])){

        echo '<script>myfunction()</script>';
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        echo $id_to_delete;
        //$sql = "DELETE FROM `zamówienia` WHERE `zamówienia`.`id_zamówienia` = $id_to_delete";

        if(mysqli_query($conn, $sql)){
			header('Location: clients.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

		//if(mysqli_query($conn, $sql))
		

	}

	$sql = "SELECT * FROM kontakty";

	$result = mysqli_query($conn, $sql);
	//rows as an array
    $contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    mysqli_close($conn);


?>

<!DOCTYPE html>

<html>
	
<?php include('templates/login_header.php'); ?>

<h4 class="center grey-text">Twoi klienci</h4>

<div class="container">
    <div class="row">

        <?php foreach($contacts as $contact){ ?>
        

            <div class="col s6 m6">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h5><?php echo htmlspecialchars($contact["Nazwa"]); ?></h5>
                        <div>NIP: : <?php echo htmlspecialchars($contact['NIP']); ?></div>
                        <div>Telefon kontaktowy: <?php echo htmlspecialchars($contact['Telefon']); ?></div>
                        <div>Adres: <?php echo htmlspecialchars($contact['Adres']); ?></div>

                    </div>

                <div>
                    <form action="zamowienia.php" method="POST">
                        <div class="card-action center-align">
                            <a class="btn brand z-depth-0" href="#">Powiązane transporty</a>
                            <a class="btn brand z-depth-0" href="#">Edytuj</a>
                            <input type="hidden" name="id_to_delete" value="<?php echo $order['id_zamówienia']; ?>">
                            <input type="submit" name="delete" value="Usuń" onclick='return confirm("Jesteś pewien że chcesz usunąć to zamówienie?");' class="btn brand z-depth-0">
                        </div>
                    </form>
                </div>

                </div>
            </div>

        <?php } ?>

    </div>
</div>

<?php include('templates/footer.php'); ?>

</html>