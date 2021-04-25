<?php 

include('db_connect.php');

$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
echo $id_to_delete;
$sql = "DELETE FROM `zamówienia` WHERE `zamówienia`.`id_zamówienia` = 8";


mysqli_free_result($result);
mysqli_close($conn);
        
?>