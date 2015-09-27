<html>
<head>
	<title>Le Cercle Infographique à besoin de toi !</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
	<?php  include('opengraph.php') ?>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<style type="text/css" media="screen">
		body{
			font-family: 'Arimo', sans-serif;
			max-width:1000px;
			margin:0 auto;
		}
		h1{
			text-align: center;
			padding-top:90px;
		}

		h2{
			text-align: center;
		}
		p{
			text-align: center;
			margin-bottom:50px;
		}
		ul{
			display:inline-block;
			list-style: none;
			position:relative;
			left:50%;
			transform:translate(-50%,-50%);
			margin-top:40px;
		}
		li{
			text-align: left;
			margin-bottom:10px;
		}

		li:before{
			content:"";
			display:block;
			background:url(check.png) no-repeat; 
			width:20px;
			height:20px;
			position:absolute;
			left:10px;

		}
		.container{
			width:80%;
			margin:0 auto;
		}
		input{
			display:block;
			margin:0 auto;
			margin-bottom:30px;
			margin-top:10px;
			text-align: center;
		}
		label{
			display:block;
			text-align: center;
		}
		input[name="your_commune"]{
			margin-bottom:50px;
		}
		.adress{
			margin-bottom:10px;
		}

		.obligation{
			text-align: left;
			padding-bottom:5px;
			border-bottom:1px solid lightgray;
			margin-bottom:70px;
			color:black;
		}

		.approbation{
			margin-bottom:80px;
			color:green;
		}
		form{
			margin-bottom:60px;
		
		}
		.none{
			display:none;
		}
		.label{
			display:inline;
			text-align:left;
			margin:0;
			width:auto;
		}
		input[type="radio"]{
			display:inline;
			margin:0;
			width: auto;
			margin-bottom:10px;
		}

		.checkform{
			width:260px;
			margin:0 auto;
		}

		input[type="submit"]{
			margin-top:70px;
			background:green;
			border:none;
			padding:20px;
			color:white;
		}

		.bye{
			position:absolute;
			left:-100000000px;
		}

		.envoieok{
			width:100%;
			background:green;
			color:white;
			position:absolute;
			top:10px;
			left:0px;
			padding-top:30px;
			padding-bottom:30px;
			margin:0;
			text-align: center;
		}
		input{
			padding-top:10px;
			padding-bottom:10px;
			text-align: center;
		}



		.envoiepasok{
			background:red;
			color:black;
		}

		.envoieok strong{
			font-weight: bold;
			color:white;
		}

		a{
			position:absolute;
			top:20px;
			right:20px;
			text-decoration: none;
			color:black;
			padding:10px;
			background:grey;
			z-index:10;
			color:white;

		}
		
	</style>
</head>
<body>

	<?php

		if(!empty($_POST)){

			if($_POST[spam] != ''){
				die("dégage sale");
			}

			$name = $_POST['your_name'];
			$mail = $_POST['your_mail'];
			$adress = $_POST['your_adress'];
			$number = $_POST['your_number'];
			$city = $_POST['your_city'];
			$commune = $_POST['your_commune'];
			$raison = $_POST['choice'];

			$variable = array($name, $mail, $adress, $number, $city, $commune);

			foreach ($variable as $value){
				$value = trim(strip_tags($_POST['$value']));
			} 

			//print_r($variable);


			$to = 'coel.jeremy@gmail.com';
			$subject = 'Inscription CI';
			$messagex = 'Nom : ' . $name . "\r\n" .
					   'Mail : ' . $mail . "\r\n".
					   'Adresse : ' . $adress . "\r\n".
					   'Numero : ' . $number . "\r\n".
					   'Ville : ' . $city . "\r\n".
					   'Commune : ' . $commune . "\r\n".
					   'raison : ' . $raison ;


			$header = 'From: coel.jeremy@gmail.com' . "\r\n" .
        	'Reply-To: '.$_POST['mail'] . "\r\n";


	
			if($name== "" ){
				echo '<p class="envoieok envoiepasok"> Oups ! Il semblerait que le champe <strong>nom</strong> ne soit pas valide </p>';
			}
			if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
				echo '<p class="envoieok envoiepasok"> Oups ! Il semblerait que le champ <strong>mail</strong> ne soit pas valide </p>';
			}
			if($_POST['your_date'] == "") {
				echo '<p class="envoieok envoiepasok"> Oups ! Il semblerait que le champ  <strong>date de naissance</strong> ne soit pas valide </p>';
			}
			if($number== "") {
				echo '<p class="envoieok envoiepasok"> Oups ! Il semblerait que le champ <strong>numero de ta maison</strong> ne soit pas valide </p>';
			}
			else{
				$envoie = mail($to, $subject, $messagex);
				echo '<p class="envoieok"> Le mail a bien été tranféré </p>';
				if(!$envoie){
					echo '<p class="envoieok envoiepasok"> Il y a eu un problème lors de l envoi !</p>';
				}
			}
		}
	?>

	<div class="container">
		<a href="#" title="">Accéder à mon Github</a>

		<h1> Heyyyyyy ! Le&nbsp;<abbr title="Cercle Infographique">CI</abbr>&nbsp;recrute&nbsp;!</h1>
		<p>T'es à l' <abbr title="Haute Ecole Albert Jacquard">HEAJ</abbr> ? T'as envie de t'éclater 
			et vivre une expérience unique ?</p>
			<h2>Rejoins nous ! </h2>
			<p>Pourquoi ?</p>
		<ul>
			<li>Il y a plus de meufs ici qu'a l'école !</li>
			<li>On boit et on assume !</li>
			<li>Tu recois une casquette, pratique quand il pleut !</li>
		</ul>

		<p class="approbation">N'en dites pas plus, je suis partant(e) !</p>
		<p class="obligation"> * = Informations à remplir <strong>obligatoirement</strong>  </p>

		<form action="" method="POST" accept-charset="utf-8" >

			<label for="name">Je&nbsp;suis&nbsp;*</label>
			<input type="text" id="name" placeholder="Ton nom" name="your_name" value="<?php if (isset($_POST['your_name'])) echo $_POST['your_name'];?>">
			<label for="mail">Mon&nbsp;e-mail&nbsp;est&nbsp;* </label>
			<input type="email" id="mail" placeholder="ton adresse mail" name="your_mail" value="<?php if (isset($_POST['your_mail'])) echo $_POST['your_mail'];?>">
			<label for="born">Je&nbsp;suis&nbsp;né(e)&nbsp;le&nbsp;* </label>
			<input type="date" id="born" max="1997-01-01" min="1988-01-01" name="your_date" value="<?php if (isset($_POST['your_date'])) echo $_POST['your_date'];?>">
			<label for="adress">Mon&nbsp;adresse&nbsp;est </label>
			<input type="text" class="adress" id="adress" placeholder="nom de ta rue" name="your_adress" value="<?php if (isset($_POST['your_adress'])) echo $_POST['your_adress'];?>">
			<label for="number" class='none'>Mon&nbsp;numero&nbsp;est </label>
			<input type="text" class="adress" id="number" placeholder="numero de ta maison" name="your_number" value="<?php if (isset($_POST['your_number'])) echo $_POST['your_number'];?>">
			<label for="city" class='none'>Ma&nbsp;ville&nbsp;est </label>
			<input type="text" class="adress" id="city" placeholder="nom de ta ville" name="your_city" value="<?php if (isset($_POST['your_city'])) echo $_POST['your_city'];?>">
			<label for="commune" class='none'>ma&nbsp;commune&nbsp;est </label>
			<input type="text" id="commune" placeholder="nom de ta commune" name="your_commune" value="<?php if (isset($_POST['your_commune'])) echo $_POST['your_commune'];?>">
			<label for="message" class="bye"> Ton&nbsp;email</label>
			<input type="mail" class="bye"  id='message' name="spam" placeholder="your email">

			<p>Quel est <strong>LA</strong> raison pour laquelle tu aimerais nous rejoindre&nbsp;?</p>
			<div class="checkform">
				<input type="radio" id="meuf" name="choice" value="meuf" <?php if(isset($_POST['choice']) && ($_POST['choice'])== "meuf"){ echo 'checked="checked"';} ?>> 
				<label for="meuf" class="label">T'as&nbsp;dis&nbsp;qu'il&nbsp;y&nbsp;avait&nbsp;des&nbsp;meufs&nbsp;!</label><br />
				<input type="radio" id="multiple" name="choice" value="schtroumpf" id="bleu" <?php if(isset($_POST['choice']) && ($_POST['choice'])== "schtroumpf"){ echo 'checked="checked"';} ?>> 
				<label for="bleu" class="label">J'aime&nbsp;les&nbsp;schtroumpfs&nbsp;!</label><br />
				<input type="radio" id="multiple" name="choice" value="soirée" id="soiree" <?php if(isset($_POST['choice']) && ($_POST['choice'])== "soirée"){ echo 'checked="checked"';} ?>> 
				<label for="soiree" class="label">Les&nbsp;soirées&nbsp;étudiantes&nbsp;!</label><br />
				<input type="radio" id="multiple" name="choice" value="biere" id="beer" <?php if(isset($_POST['choice']) && ($_POST['choice'])== "biere"){ echo 'checked="checked"';} ?>> 
				<label for="beer" class="label">La&nbsp;bière&nbsp;!</label><br />
			</div>
			<input type="submit" value="Pitié, acceptez-moi">


		</form>


	</div>





</body>
</html>