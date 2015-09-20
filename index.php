<html>

	<head>
		<title> Papa ? | Exercice Php </title>
		<meta charset="UTF-8">
		<style>
			body{
				background:#eeeeee;
				font-family: sans-serif;
				position:relative;
			}

			.container{
				width:600px;
				margin:0 auto;
			}

			h1,h2{
				text-align: center;
			}

			h1{
				padding-top:50px;
			}

			h2{
				margin-bottom:50px;
			}

			p{
				width:600px;
				margin:0 auto;
				margin-bottom:70px;

			}
			form{
				width:300px;
				margin:0 auto;
			}

			.containerp{
				background:orange;
			}

			.reponse{
				padding: 30px 0;
				width:90%;
				line-height: 20px
			}

			.non{
				background:red;
			}

			.ok{
				background:green;
				text-align: center;
			}

			a{
				display:block;
				text-align: center;
				background:red;
				text-decoration: none;
				padding:5px;
				position:absolute;
				top:10px;
				right:60px;
			}
			a:hover{
				color:lightblue;
			}


			input[type="submit"]{
				width:100%;
				margin-top:30px;
				margin-bottom:75px;
				background:salmon;

			}

			img{
				position:absolute;
				right:50%;
				transform:translate(50%);

			}
		</style>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	</head>

	<body>
		<div class="container">
			<a href="#">Accéder au code</a>
			<h1> Papa ? </h1>
			<h2> Je peux t'emprunter ta caisse ?</h2>

			<p>A l'aide des arguments ci dessous, trouves la combinaison qui te permettra de convaincre ton père de te prêter sa voiture</p>

			<form action="" method="get" accept-charset="utf-8" class="pure-form">

				<label for="option-un" class="pure-checkbox">
			  		<input id ="option-un" type="checkbox" name="raison1" value="trotinette" <?php if(isset($_GET['raison1'])){ echo 'checked="checked"';} ?> > ma trotinette est en réparation
	    		</label>

	    		<label for="option-deux" class="pure-checkbox">
			  		<input id ="option-deux"type="checkbox" name="raison2" value="tv" <?php if(isset($_GET['raison2'])){ echo 'checked="checked"';} ?>> je vais chercher du taf 
	    		</label>

	    		<label for="option-trois" class="pure-checkbox">
			  		<input id ="option-trois"type="checkbox" name="raison3" value="flemme" <?php if(isset($_GET['raison3'])){ echo 'checked="checked"';} ?>> j'ai vraiment la flemme
	    		</label>

	    		<label for="option-quatre" class="pure-checkbox">
			 		 <input id ="option-quatre"type="checkbox" name="raison4" value="" <?php if(isset($_GET['raison4'])){ echo 'checked="checked"';} ?>> Je te fais le plein
	    		</label>

	    		<label for="option-cinq" class="pure-checkbox">
			  		 <input id ="option-cinq"type="checkbox" name="raison5" value="Bike" <?php if(isset($_GET['raison5'])){ echo 'checked="checked"';} ?>> Je te revaudrai ça 
	    		</label>

	    		<label for="option-six" class="pure-checkbox">
			  		 <input id ="option-six" type="checkbox" name="raison6" value="Car" <?php if(isset($_GET['raison6'])){ echo 'checked="checked"';} ?>> Maman est au courant pour la voisine ?
	    		</label>

	    		<input type="hidden" name="test">


			
			  <input name="submitbutton" type="submit" class="pure-button" value="Button" />

			</form>

			<?php

			// counter
			function nbreponseok($raison1,$raison2,$raison3,$raison4,$raison5,$raison6){
					
					$compteur=0;
					if($raison1){
						$compteur++;
					}
					if($raison2){
						$compteur++;
					}
					if($raison3){
						$compteur++;
					}
					if($raison4){
						$compteur++;
					}
					if($raison5){
						$compteur++;
					}
					if($raison6){
						$compteur++;
					}

					if($compteur==0){
						return 1;
					}elseif($compteur==6){
						return 2;
					}else{
						return 3;
					}
				}

			// don't show message if no click on button
			if(!empty($_GET)){


				// Init
				// All argument are false
				$raison1 = false;
				$raison2 = false;
				$raison3 = false;
				$raison4 = false;
				$raison5 = false;
				$raison6 = false;

				// if anyone are checked
				$autreargument = "t'as même pas d'arguments !";

				
				$argumentbonus ='';


				
				// check if argument are checked
				if(isset($_GET['raison1'])){
					$raison1=true;
					$autreargument = "pour conduire tu tiens de ta mère ";
				}

				if(isset($_GET['raison2'])){
					$raison2=true;
					$autreargument = "tu ma quand même fait rire ! Tiens une gomette ";
				}

				if(isset($_GET['raison3'])){
					$raison3=true;
					$autreargument = "j'ai la flemme d'aller chercher ma clef ";
				}

				if(isset($_GET['raison4'])){
					$raison4=true;
					$autreargument = "je connais ce genre de promesses ";
				}

				if(isset($_GET['raison5'])){
					$raison5=true;
					$autreargument = "commences déja par me rendre mes 50 euros ";
				}

				if(isset($_GET['raison6'])){
					$raison6=true;
					$autreargument = "ta gueule avec cette histoire de voisine ";
				}



				// bonus sentence if only 2 argument are checked
				if(isset($_GET['raison1']) && isset($_GET['raison4']) && $raison2 == false && $raison3 == false && $raison5 == false && $raison6 == false) {
					$argumentbonus = "Vas plutôt faire le plein de ta trotinette !";
				}

				if(isset($_GET['raison2']) && isset($_GET['raison3']) &&  count($compteur == 2) && $raison1 == false && $raison4 == false && $raison5 == false && $raison6 == false) {
					$argumentbonus = "Chercher un taf et avoir la flemme c'est jamais bon !";
				}	



				// call function nbreponseok
				$accordpapa=nbreponseok($raison1,$raison2,$raison3,$raison4,$raison5,$raison6);



				// final result
				if($accordpapa == 1){
					echo "<div class='containerp non'><p class='reponse'>Tu peux rêver" . ",  " . $autreargument . " ! </p></div>";
				}
				if($accordpapa == 2){
					echo "<div class='containerp ok';><p class='reponse'>Bon ok" . " mais " . $autreargument . "! Elle est belle non ?</p></div>";
					echo "<img src='http://www.wired.com/wp-content/uploads/2014/05/088_BMW_i8-new.jpg' alt='BMW de papa'>";
				}
				if($accordpapa == 3){
					echo "<div class='containerp'><p class='reponse'>Je vais y réfléchir" . " mais " . $autreargument . "! " .  $argumentbonus . " </p></div>";
				}

			}


			?>

			
		</div>
	</body>
</html>