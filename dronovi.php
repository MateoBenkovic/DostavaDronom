<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
?>

<?php

   if(isset($_POST['sortnaziv']))
{
    $sql="SELECT * FROM dron JOIN vrsta_drona ON dron.vrsta_drona_id=vrsta_drona.vrsta_drona_id ORDER BY dron.naziv ASC";
    $rs=izvrsiUpit($bp,$sql);
}


elseif (isset ($_POST['sortcijena'])) 
    {
		$sql="SELECT * FROM dron JOIN vrsta_drona ON dron.vrsta_drona_id=vrsta_drona.vrsta_drona_id ORDER BY cijenaPoKM DESC";
          $rs=izvrsiUpit($bp,$sql);
    }
    
   
 else {
	$sql="SELECT * FROM dron JOIN vrsta_drona ON dron.vrsta_drona_id=vrsta_drona.vrsta_drona_id ORDER BY dron_id";
        $rs=izvrsiUpit($bp,$sql);
}

	
	
	$rs=izvrsiUpit($bp,$sql);
    echo "<div id='kordiv'>";
	echo "<form name='sortiranje' action='$_SERVER[PHP_SELF]' method='post'>";
	echo "<table id='tkorisnici'>";
		echo "<caption>Lista dronova</caption>";
		echo "<tr>
		<th style=''> <input type='submit' name='sortnaziv' value='Sortiraj po nazivu'> </th>
		<th style=''> <input type='submit' name='sortcijena' value='Sortiraj po cijeni'> </th>
		</form>
		<th><a href='top5.php'>TOP 5 DRONOVA</a></th>";
		if($aktivni_korisnik_tip==0){
		echo "<th><a href='vrstedron.php'>VRSTE DRONA</a></th>
		      <th><a href='novidron.php?novidron='.$_SESSION[aktivni_korisnik_id]>DODAJ NOVI DRON</a></th>";
		} elseif($aktivni_korisnik_tip==1){
			echo "<th><a href='novidron.php?novidron='.$_SESSION[aktivni_korisnik_id]>DODAJ NOVI DRON</a></th>
				  <th></th>";
		}

		else{
			echo "<th></th>
					<th></th>";
		}
		echo "<tr>";
		
		
		echo "<tr>
		<th>Naziv</th>
		<th>Cijena po km</th>
		<th>MinKM</th>
		<th>MaxKM</th>
		<th style='width:200px'>Slika</th>
		
	</tr>";


	echo "<tbody>";
	while(list($id,$vrsta,$slika,$naslov,$vrstadrona,$naziv,$min,$max,$cijenaPoKM)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$naslov</td>
			<td>$cijenaPoKM €</td>
			<td>$min KM</td>
			<td>$max KM</td>
			<td><figure><img src='$slika' width='140' height='170' alt='$naslov'/></figure></td>";
			if($aktivni_korisnik_tip==0 || $aktivni_korisnik_tip==1) {
				echo "<td><a href='novidron.php?novidron=$id' class='mail'>UREDI</a></td>";
			}
			
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
    echo "</div>";
	

	
	
?>
<?php
	zatvoriVezuNaBazu($bp);
?>

</body>
</html>