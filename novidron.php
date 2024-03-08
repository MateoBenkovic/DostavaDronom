<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
    if($aktivni_korisnik_tip!=0 and $aktivni_korisnik_tip!=1){
		header('Location:index.php');
	}
?>
<?php
	
	if(isset($_POST['submit'])){
		
			$id=$_POST['novi'];
			$vrstadrona=$_POST['vrstadrona'];
			$naziv=$_POST['naziv'];
			$slika=$_POST['slika'];

			if($id==0){
				$sql="INSERT INTO dron
				(dron_id,vrsta_drona_id,naziv,poveznica_slika)
				VALUES
				('$id','$vrstadrona','$naziv','$slika');
				";
			}
			else{
				$sql="UPDATE dron SET
					vrsta_drona_id='$vrstadrona',
					poveznica_slika='$slika',
                    naziv='$naziv'
					WHERE dron_id='$id'
				";
			}
			izvrsiUpit($bp,$sql);
			header("Location:dronovi.php");
		}

	if(isset($_GET['novidron'])){
		$id=$_GET['novidron'];
		$sql="SELECT * FROM dron WHERE dron_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$vrstadrona,$slika,$naziv)=mysqli_fetch_array($rs);
	}
	else{
		$vrstadrona="";
		$slika="";
        $naziv="";
	}
?>
<form method="POST" action="<?php if(isset($_GET['novidron']))echo "novidron.php?novidron=$id";else echo "novidron.php";?>">
	<div id="kordiv">
    <table id="tkorisnici">
		<caption>
			<?php
				if(!empty($id))echo "Uredi dron";
				else echo "Dodaj dron";
			?>
		</caption>
		<tbody>
			<tr>
				<td colspan="2" style="border:none">
					<input type="hidden" name="novi" value="<?php if(!empty($id))echo $id;else echo 0;?>"/>
				</td>
			</tr>
			
			<tr>
				<td class="lijevi">
					<label for="vrstadrona"><strong>Vrsta drona:</strong></label>
				</td>
				<td>
				<select id="vrstadrona" name="vrstadrona">
				<?php

$upit = "SELECT vrsta_drona_id, naziv FROM vrsta_drona";
$vrsta = izvrsiUpit($bp,$upit);

while(list($vrsta_id, $nazivvrste) = mysqli_fetch_array($vrsta)) {
	if ($vrstadrona == $vrsta_id) {
		echo "<option selected value='$vrsta_id'>$nazivvrste</option>";
	} else {
		echo "<option value='$vrsta_id'>$nazivvrste</option>";
	}
}

				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="naziv"><strong>Naziv drona:</strong></label>
				</td>
				<td>
					<input type="text" name="naziv" id="naziv" value="<?php if(!isset($_POST['naziv']))echo $naziv; else echo $_POST['naziv'];?>"
						size="120" minlength="1" maxlength="50" placeholder="Upišite naziv drona" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="slika"><strong>Poveznica slike:</strong></label>
				</td>
				<td>
					<input type="text" name="slika" id="slika" value="<?php if(!isset($_POST['slika']))echo $slika; else echo $_POST['slika'];?>"
						size="120" minlength="1" maxlength="500" placeholder="Unesite link slike" required="required"/>
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2" style="text-align:center;">
					
						<input type="submit" name="submit" value="Pošalji">
					
				</td>
			</tr>
		</tbody>
	</table></div>
</form>
<?php
	zatvoriVezuNaBazu($bp);
?>

</body>

</html>
