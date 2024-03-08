<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
?>

<?php


$sql = "SELECT d.dron_id, dr.naziv AS naziv_drona, v.naziv AS naziv_vrste, v.minKM, v.maxKM, v.cijenaPoKM, dr.poveznica_slika, COUNT(*) AS broj_dostava
FROM dostava d
INNER JOIN dron dr ON d.dron_id = dr.dron_id
INNER JOIN vrsta_drona v ON dr.vrsta_drona_id = v.vrsta_drona_id
GROUP BY d.dron_id
ORDER BY broj_dostava DESC
LIMIT 5";
$rs=izvrsiUpit($bp,$sql);

if ($rs->num_rows > 0) {
     echo "<h2>Top 5 dronova s najviše dostava</h2>";
    while ($row = $rs->fetch_assoc()) {
        $dron_id = $row["dron_id"];
        $naziv_drona = $row["naziv_drona"];
        $naziv_vrste = $row["naziv_vrste"];
        $min_km = $row["minKM"];
        $max_km = $row["maxKM"];
        $cijena_km = $row["cijenaPoKM"];
        $broj_dostava = $row["broj_dostava"];
        $slika = $row["poveznica_slika"];

       

        echo "<div id=top>";
           echo "<img src=$slika alt=Slika drona width='350px' height='300px'> <br>";
           echo "<strong>Naziv:</strong> " . $naziv_drona . "<br>";
           echo "<strong>Naziv vrste:</strong> " . $naziv_vrste . "<br>";
           echo "<strong>Min. kilometara:</strong> " . $min_km . "<br>";
           echo "<strong>Max. kilometara:</strong> " . $max_km . "<br>";
           echo "<strong>Cijena po kilometru:</strong> " . $cijena_km . "<br>";
           echo "<strong>Broj dostava:</strong> " . $broj_dostava . "<br>";
        echo "</div>";
    }
} 

?>


<?php
	zatvoriVezuNaBazu($bp);
?>

</body>

</html>