 <!DOCTYPE html>
 <html>


	<?php include('templates/header.php') ?>


	<div class="section">

  <h1 class="block-effect" style="--td: 1s">
    <div class="block-reveal" style="--bc: #4040bf; --d: .1s">Dyskretnie</div>
    <div class="block-reveal" style="--bc: #bf4060; --d: .5s">Zawsze na czas</div>
  </h1>
        <div class="video-container">
			<header>
            	<div class="color-overlay"></div>
            	<video autoplay loop muted>
					<source src="images/vid1.mp4" type="video/mp4">
				</video>
			</header>
		</div>
		<a href="#banner" class="button circled scrolly">Start</a>
	</div>

	<section id="banner">
		<header>
			<h2 style="font-size:75px;">Lorem brum brum.</h2>
			<p style="font-size:20px;">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
        Proin venenatis nunc a iaculis volutpat.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
				Proin venenatis nunc a iaculis volutpat.
			</p>
		</header>
	</section>




  
<div class="container" style="background: #f0f0f0;">
  <div style="text-align:center; font-size:20px;">
    <h2>Kontakt</h2>
    <p>Oferty współpracy, wyceny transportów, skontaktuj się z nami przy pomocy formularza lub zadzwoń.</p>
  </div>
  <div class="row">

  <div class="hover07 column" style="margin-top: 50px">
      <img src="images/form.jpg" class="send_form_image">
    </div>

      <!--
    <div class="hover07 column" style="margin-top: 50px">
      <div>
        <figure><img src="images/form.jpg" class="send_form_image"></figure>
        <span>Hover</span>
      </div>
    </div>
    -->
    <div class="column">
      <form action="/action_page.php">
        <label for="fname">Imię</label>
        <input type="text" id="fname" name="firstname" placeholder="Twoje imię...">
        <label for="lname">Nazwisko</label>
        <input type="text" id="lname" name="lastname" placeholder="Twoje nazwisko...">
        <label for="country">Country</label>
        <label for="subject">Wiadomość</label>
        <textarea id="subject" name="subject" placeholder="Wpisz wiadomość..." style="height:170px"></textarea>
        <input type="submit" value="Wyślij" class="brand">
      </form>
    </div>
  </div>
</div>







<div class="container" style="background: #f0f0f0;">
  <div style="text-align:center; font-size:20px;">
    <h2>Nasza flota</h2>
    <p>Naszym priorytetem jest nowoczesny tabor transportowy. </p>
      <p>Sprzęt, z którego korzystamy nie liczy więcej niż 5 lat, ponieważ jest on na bieżąco wymieniany. </p>


  </div>
  <div class="row">

  <div class="hover07 column" style="margin-top: 55px; margin-left: 250px;">
      <img src="images/trucks.jpg" class="send_form_image">
  </div>
  </div>




	<?php include('templates/footer.php') ?>


 </html>