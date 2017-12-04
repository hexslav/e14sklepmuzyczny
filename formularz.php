<!DOCTYPE html>
<html>
    <head>
        <title>Sklep muzyczny</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
         
    </head>
    <body> 
  
 <header><h1> SKLEP MUZYCZNY</h1></header>
	<div id="lewy">
					<h2> NASZA OFERTA</h2>
					<ol> <li> Instrumenty muzyczne 
					<li> sprzęt audio
					<li>Płyty CD
					</ol>
	</div>
	<div id="prawy"> 
			<p><b>Dane osobowe</b></p>
			<form action="formularz.php" method="post" name="formularz">
			Imię:<br/>
			<input type="text" id="imie" name="imie"><br/>
			Nazwisko:<br/>
			<input type="text" name="nazwisko"><br/>
			Adres:<br/>
			<input type="text" name="adres"><br/>
			Telefon:<br/>
			<input type="text" name="telefon"><br/>
			<hr /><br/>
			<p>	Dane logowania:<br/></p>
				
			Login:<br/>
			<input type="text" name="login"><br/>
			Hasło:<br/>
			<input type="password" name="haslo"><br/>
			<br/>
			<input type="checkbox" name="regulamin"> Akceptuje <a href="regulamin.txt">Regulamin</a> sklepu<br/>
			<br/>
			<button id="wyczysc">WYCZYŚĆ
			<button id="rejestruj">REJESTRUJ
			</form>

	</div>
	<?php
	$imie = $_POST['imie']; 
	$nazwisko = $_POST['nazwisko']; 
	$adres = $_POST['adres']; 
	$telefon = $_POST['telefon'];
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	
	$p=@mysql_connect('localhost','root','')or Die('padl serwer');
	$b=@mysql_select_db('sklep',$p)or Die('padl baza');
	
	$zap1=@mysql_query("INSERT INTO konta SET haslo='$haslo' , login='$login'");
	$zap2=@mysql_query("INSERT INTO uzytkownicy SET adres='$adres', imie='$imie', nazwisko='$nazwisko', telefon='$telefon'");
	$zap3=@mysql_query("SELECT imie, nazwisko FROM uzytkownicy");
	
	
	if($zap2){
	echo "Konto ".$imie. " ".$nazwisko. " zostało zarejestrowane.";
	}
	
	@mysql_close($p);
	
	?>
	
   
	  
    </body>
</html>