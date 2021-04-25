<?php
//session_start();
//$name = $_SESSION["nazwa"];
//$ID = $_SESSION["session_ID"];
?>

<head>
 	<title>Firma spedycyjna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        .brand{
            background: rgb(161,92,92);
background: linear-gradient(90deg, rgba(161,92,92,1) 0%, rgba(159,104,131,1) 5%, rgba(129,102,160,1) 28%, rgba(112,101,176,1) 65%, rgba(90,99,198,1) 96%);
        }
        .brand-text{
            
            font-size: 72px;
            background: -webkit-linear-gradient(#e66465, #9198e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    </style>


</head>
    
    <body class="grey lighten-3">
        <nav class="white z-depth-0.5">
            <div class="container">
             <a href="index.php" class="brand-logo brand-text">Przemytex sp. z.o.o</a>
             <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><div class="grey-text">Witaj <?php echo htmlspecialchars($name); ?>!</div></li>
                <li><a href="zamowienia.php" class="btn brand z-depth-0">Twoje zamówienia</a></li>
                <li><a href="clients.php" class="btn brand z-depth-0">Twoi klienci</a></li>
                <li><a href="add.php" class="btn brand z-depth-0">Nowe zamówienie</a></li>
                <li><a href="add_client.php" class="btn brand z-depth-0">Nowy klient</a></li>
                <li><a href="index.php" class="btn brand z-depth-0">Wyloguj</a></li>
            </ul>
            
            </div>
        </nav>