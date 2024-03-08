<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip == 2){
		header('Location:index.php');
	}
	
?>

<?php
		
				$sql="SELECT d.dron_id, d.naziv, SUM(do.dostavaKM) as brojDostava FROM dostava as do, dron as d  WHERE d.dron_id=do.dron_id GROUP BY d.dron_id;";
				$rs=izvrsiUpit($bp,$sql);
				$row=mysqli_fetch_array($rs, MYSQLI_ASSOC);
				echo "<table id='kordiv'>";
					echo "<caption>Statistika</br></caption>";
					echo "<thead><tr>
					<th>Dron ID</th>
					<th>Naziv drona</th>
					<th>Ukupan broj kilometara</th>
				</tr></thead>";
				echo "<tbody>";
				$ukupni_broj=0;
				while(list($dron_id, $naziv_drona, $brojDostava)=mysqli_fetch_array($rs)){
					echo
					"<tr>
                    <td>$dron_id</td>
                    <td>$naziv_drona</td>
                    <td>$brojDostava</td>
					</tr>"; 
                }
				echo "</tbody>";
				echo "</table>";
			echo "<br/>";
			
	zatvoriVezuNaBazu($bp);
?>
