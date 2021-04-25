<!DOCTYPE html>
<html>
	
<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Zarejestruj się</h4>
    <form class="white" action="zamowienia.php" method="POST">
        <label>Nazwa zamówienia</label>
        <input type="text" name="nazwa">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label>Adres odbioru</label>
        <input type="text" name="adres_odb">
        <label>Adres dostawy</label>
        <input type="text" name="adres_dost">
        <label>Kwota</label>
        <input type="number" name="kwota">
        <label>Kraj</label>
        <input type="text" name="kraj">
        <div class="center">
            <input type="submit" name="submit" value="Dalej" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>


</html>