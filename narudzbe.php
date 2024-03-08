<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip!=0 and $aktivni_korisnik_tip!=1 and $aktivni_korisnik_tip!=2){
		header('Location:index.php');
	}
?>
<?php	
		$sql="SELECT * FROM dostava ORDER BY hitnost DESC";
		$rs=izvrsiUpit($bp,$sql);
		
		if(isset($_GET['datum_od']) and isset($_GET['datum_do']) and (!empty($_GET['datum_od']) and !empty($_GET['datum_do']))){
			$datum_od = $_GET['datum_od'];
			$datum_do = $_GET['datum_do'];
			
			$sql = "SELECT * FROM dostava WHERE datum_vrijeme_zahtjeva BETWEEN '$datum_od' AND '$datum_do'";
			$rs=izvrsiUpit($bp,$sql);
		}

		if (isset($_GET['potvrdaDostave'])) {
			$sql="UPDATE dostava d SET d.status = 2 WHERE dostava_id =".$_GET['potvrdaDostave'];
		    $result=izvrsiUpit($bp,$sql);
			}


	echo 	"<div id='kordiv'>

				<form action='' method='GET'>

					<label>Datum od:</label>
					<input type='text' placeholder='dd/mm/gggg H:i:s' name='datum_od'>

					<label>Datum do:</label>
					<input type='text' placeholder='dd/mm/gggg H:i:s' name='datum_do'>

					<input type='submit' value='Filtriraj'>
				</form>
			 </div>";
    
    echo "<div id='kordiv'>";

	echo "<table id='tkorisnici'>";
	echo "<caption>Popis narudžbi</caption>";
	echo "<thead><tr>
		<th>Dron</th>
		<th>Korisnik</th>
		<th>Datum i vrijeme dostave</th>
		<th>Datum i vrijeme zahtjeva</th>
        <th>Opis pošiljke</th>
		<th>Napomene</th>
		<th>Adresa dostave</th>
        <th>Adresa polazišta</th>
        <th>Udaljenost dostave</th>
        <th>Težina pošiljke</th>
        <th>Hitnost</th>
        <th>Cijena</th>
        <th>Status</th>
		<th></th>";
	echo "</tr></thead>";

    echo "<tbody>";
	while(list($id,$dron,$korisnik,$datum_dostave,$datum_zahtjeva,$opis,$napomene,$adresa_dostave,$adresa_polazista,$dostavaKM,$dostavaKG,$hitnost,$cijena,$status)=mysqli_fetch_array($rs)){
		if($korisnik === $_SESSION['aktivni_korisnik_id']){
		$datum_vrijeme_dostave = date("d.m.Y. H:i:s",strtotime($datum_dostave));
		$datum_zahtjeva = date("d.m.Y. H:i:s",strtotime($datum_zahtjeva));
		$trenutni_datum = date("d.m.Y. H:i:s");
		echo "<tr>
			<td>$dron</td>
			<td>$korisnik</td>";
		echo "<td>$datum_vrijeme_dostave</td>
			<td>$datum_zahtjeva</td>
            <td>$opis</td>
            <td>$napomene</td>
            <td>$adresa_dostave</td>
            <td>$adresa_polazista</td>
            <td>$dostavaKM</td>
            <td>$dostavaKG</td>
            <td>$hitnost</td>
            <td>$cijena</td>
            <td>$status</td>"
            ;
			if($aktivni_korisnik_tip==0 or $aktivni_korisnik_tip==1)echo "<td><a class='mail' href='dostava.php?dostava=$id'>UREDI</a></td>";
			else if($aktivni_korisnik_tip==2 && $status < 2 && $datum_vrijeme_dostave < $trenutni_datum) echo '<td><a href="narudzbe.php?potvrdaDostave='.$id.'">POTVRDI DOSTAVU</a></td>';
			
		echo "</tr>";
		}
		
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