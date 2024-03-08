<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip!=0){
		header('Location:index.php');
	}
?>

<?php

    $sql="SELECT * FROM vrsta_drona ORDER BY vrsta_drona_id";
    $rs=izvrsiUpit($bp,$sql);

    echo "<div id='kordiv'>";

	echo "<table id='tkorisnici'>";
	echo "<caption>Vrste drona</caption>";
	echo "<thead><tr>
		<th>Naziv vrste drona</th>
		<th>Minimalna kilometraža</th>
		<th>Maksimalna kilometraža</th>
		<th>Cijena po kilometru</th>";
	echo "</tr></thead>";

    echo "<tbody>";
	while(list($id,$naziv,$minKM,$maxKM,$cijena)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$naziv</td>
			<td>$minKM</td>
		    <td>$maxKM</td>
			<td>$cijena</td>";
			echo "<td><a class='mail' href='uredidron.php?uredidron=$id'>UREDI</a></td>";
			
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
    echo "</div>";
    echo "<div id='paginacija'>";
    echo "<a href='uredidron.php'>DODAJ VRSTU DRONA</a>";
    echo "</div>"
?>


<?php
	zatvoriVezuNaBazu($bp);
?>

</body>

</html>