<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip!=0){
		header('Location:index.php');
	}
?>
<?php
$sql="SELECT COUNT(*) FROM korisnik";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str);

    $sql="SELECT * FROM korisnik ORDER BY korisnik_id LIMIT ".$vel_str;
	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna = 1;
    
    $rs=izvrsiUpit($bp,$sql);

    echo "<div id='kordiv'>";

	echo "<table id='tkorisnici'>";
	echo "<caption>Popis korisnika sustava</caption>";
	echo "<thead><tr>
		<th>Korisničko ime</th>
		<th>Ime</th>
		<th>Prezime</th>
		<th>E-mail</th>
		<th>Lozinka</th>
		<th></th>";
	echo "</tr></thead>";

    echo "<tbody>";
	while(list($id,$tip_id,$vrsta_drona,$korime,$email,$lozinka,$ime,$prezime)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$korime</td>
			<td>$ime</td>";
		echo "<td>$prezime</td>
			<td>$email</td>
			<td>$lozinka</td>";
			if($aktivni_korisnik_tip==0)echo "<td><a class='mail' href='korisnik.php?korisnik=$id'>UREDI</a></td>";
			else if(isset($_SESSION["aktivni_korisnik_id"]) && $_SESSION["aktivni_korisnik_id"]==$id) echo '<td><a href="korisnik.php?korisnik='.$_SESSION["aktivni_korisnik_id"].'">UREDI</a></td>';
			else echo "<td></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
    echo "</div>";

    echo '<div id="paginacija">';
	
	if($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a href='korisnici.php?stranica=".$prethodna."'>&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a ";
		if($aktivna==$i)echo " id='aktivna'"; 
		echo "' href='korisnici.php?stranica=".$i."'>$i</a>";
	}
	
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a href='korisnici.php?stranica=".$sljedeca."'>&gt;</a>";
	}
	echo "<br/>";
	if($aktivni_korisnik_tip==0) echo '<a class="mail" href="korisnik.php">DODAJ KORISNIKA</a>';
	echo '</div>';
?>

<?php
	zatvoriVezuNaBazu($bp);
?>

</body>

</html>