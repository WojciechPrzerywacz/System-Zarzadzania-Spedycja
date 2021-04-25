<?php 
include('templates/session.php');
include('db_connect.php');
$x=$_GET['variable1'];//value1 be stored in $x
$y=$_GET['variable2'];//value1 be stored in $x
$sql = "SELECT * FROM `status zamówienia` WHERE id_zamówienia =".$x;

$result = mysqli_query($conn, $sql);

//rows as an array
$order = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>

<html>
	
<?php include('templates/login_header.php'); ?>

<h4 class="center grey-text">Szczegóły Zamówienia: <?php echo htmlspecialchars($y); ?></h4>

<div class="container">
    <div class="row">

        <?php foreach($order as $order){ ?>

            <div class="container center">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h5>Nazwa Towaru: <?php echo htmlspecialchars($y); ?></h5>
                        <div>Numer zamówienia: <?php echo htmlspecialchars($order['id_zamówienia']); ?></div>
                        <div>Etap realizacji: <?php echo htmlspecialchars($order['etap realizacji']); ?></div>
                    </div>

                <div>
                    <form action="zamowienia.php" method="POST">
                        <div class="card-action center-align">
                        <a class="btn brand z-depth-0" href="zamowienia_details.php?variable1=<?php echo htmlspecialchars($x); ?>&variable2=<?php echo htmlspecialchars($y); ?>">Szczegóły</a>
                        <a class="btn brand z-depth-0" href="#">Zmień status</a>
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