<?php 

   include("baza.php");
   if(session_id()=="")session_start();

   $trenutna=basename($_SERVER["PHP_SELF"]);
	$putanja=$_SERVER['REQUEST_URI'];
	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	$vel_str=20;
	

    if(isset($_SESSION['aktivni_korisnik'])){
		$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		$aktivni_korisnik_id=$_SESSION["aktivni_korisnik_id"];
	}
     
?>

<!DOCTYPE html>
<html lang="hr">

   
   <head>

       <meta name="author" content="Mateo Benković">
       <meta name="datum" content="24.06.2023.">
       <meta charset="utf-8">
    
       <title>Dostava dronom</title>
       <link type="text/css" rel="stylesheet" href="index.css">

   </head>

   <body>

        <header>
             
            <h1>Dostava <br> dronom </h1>
            

            <nav>
            
            <?php
                if($aktivni_korisnik_tip==0) {
							
                                echo '<a href="index.php" class="navigacija" ';
								if($trenutna=="index.php")echo ' id="aktivna"';
								echo ">POČETNA</a>";
								echo '<a href="dronovi.php" class="navigacija"';
								if($trenutna=="dronovi.php")echo ' id="aktivna"';
								echo ">DRONOVI</a>";
								echo '<a href="dostava.php" class="navigacija" ';
								if($trenutna=="dostava.php")echo ' id="aktivna"';
								echo ">DOSTAVA</a>";
								echo '<a href="narudzbe.php" class="navigacija" ';
								if($trenutna=="narudzbe.php")echo ' id="aktivna"';
								echo ">NARUDŽBE</a>";
                                echo '<a href="korisnici.php" class="navigacija" ';
                                if($trenutna=="korisnici.php")echo ' id="aktivna"';
								echo ">KORISNICI</a>";
								echo '<a href="statistika.php" class="navigacija" ';
                                if($trenutna=="statistika.php")echo ' id="aktivna"';
								echo ">STATISTIKA</a>";
								echo '<a href="o_autoru.html" class="navigacija" ';
                                if($trenutna=="o_autoru.html")echo ' id="aktivna"';
								echo ">O AUTORU</a>";

							} elseif($aktivni_korisnik_tip==1){

								echo '<a href="index.php" class="navigacija" ';
								if($trenutna=="index.php")echo ' id="aktivna"';
								echo ">POČETNA</a>";
								echo '<a href="dronovi.php" class="navigacija"';
								if($trenutna=="dronovi.php")echo ' id="aktivna"';
								echo ">DRONOVI</a>";
								echo '<a href="dostava.php" class="navigacija" ';
								if($trenutna=="dostava.php")echo ' id="aktivna"';
								echo ">DOSTAVA</a>";
								echo '<a href="narudzbe.php" class="navigacija" ';
								if($trenutna=="narudzbe.php")echo ' id="aktivna"';
								echo ">NARUDŽBE</a>";
								echo '<a href="statistika.php" class="navigacija" ';
                                if($trenutna=="statistika.php")echo ' id="aktivna"';
								echo ">STATISTIKA</a>";
								echo '<a href="o_autoru.html" class="navigacija" ';
                                if($trenutna=="o_autoru.html")echo ' id="aktivna"';
								echo ">O AUTORU</a>";

							} elseif($aktivni_korisnik_tip==2){
								echo '<a href="index.php" class="navigacija" ';
								if($trenutna=="index.php")echo ' id="aktivna"';
								echo ">POČETNA</a>";
								echo '<a href="dronovi.php" class="navigacija"';
								if($trenutna=="dronovi.php")echo ' id="aktivna"';
								echo ">DRONOVI</a>";
								echo '<a href="dostava.php" class="navigacija" ';
								if($trenutna=="dostava.php")echo ' id="aktivna"';
								echo ">DOSTAVA</a>";
								echo '<a href="narudzbe.php" class="navigacija" ';
								if($trenutna=="narudzbe.php")echo ' id="aktivna"';
								echo ">NARUDŽBE</a>";
								echo '<a href="o_autoru.html" class="navigacija" ';
                                if($trenutna=="o_autoru.html")echo ' id="aktivna"';
								echo ">O AUTORU</a>";
							}else{

								echo '<a href="index.php" class="navigacija"';
								if($trenutna=="index.php")echo ' id="aktivna"';
								echo ">POČETNA</a>";
								echo '<a href="top5.php" class="navigacija"';
								if($trenutna=="top5.php")echo ' id="aktivna"';
								echo ">DRONOVI</a>";
								echo '<a href="o_autoru.html" class="navigacija"';
								if($trenutna=="o_autoru.html")echo ' id="aktivna"';
								echo ">O AUTORU</a>";
								
						}

					

            ?>

            </nav>
            

            <div id="prijavazaglavlje"> 
            
            <?php
            
            if($aktivni_korisnik===0){
                echo "<text><strong>Status: </strong> Neprijavljeni korisnik</text><br>";
                echo "<a class='link' href='prijava.php'>PRIJAVA</a> <br>";
            }
            else{
                echo "<text><strong>Status: </strong>Dobrodošli, $aktivni_korisnik_ime</text><br>";
				echo "<a class='link' href='prijava.php?logout=1'>Odjava</a>";
            }


            ?>
            </div>
        
        </header>


