<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip!=0){
		header('Location:index.php');
	}
?>
<?php
	
	if(isset($_POST['submit'])){
            $id=$_POST['vrsta_drona_id'];
			$naziv=$_POST['naziv'];
			$minKM=$_POST['minKM'];
			$maxKM=$_POST['maxKM'];
			$cijenaPoKM=$_POST['cijenaPoKM'];
			
		
			if($id==0){
				$sql="INSERT INTO vrsta_drona
				(naziv,minKM,maxKM,cijenaPoKM)
				VALUES
				('$naziv','$minKM','$maxKM','$cijenaPoKM');
				";
			}
			else{
				$sql="UPDATE vrsta_drona SET
					naziv='$naziv',
                    minKM='$minKM',
					maxKM='$maxKM',
					cijenaPoKM='$cijenaPoKM'
					WHERE vrsta_drona_id='$id'
				";
			}
			izvrsiUpit($bp,$sql);
			header("Location:vrstedron.php");
		}
	
	if(isset($_GET['uredidron'])){
		$id=$_GET['uredidron'];
		$sql="SELECT * FROM vrsta_drona WHERE vrsta_drona_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$naziv,$minKM,$maxKM,$cijenaPoKM)=mysqli_fetch_array($rs);
	}
	else{
		$naziv="";
		$minKM="";
		$maxKM="";
        $cijenaPoKM="";
	}
?>
<form method="POST" action="<?php if(isset($_GET['uredidron']))echo "uredidron.php?uredidron=$id";else echo "uredidron.php";?>">
<div style="width:70%; margin-left:15%;">	
<table style="width:100%;">
		<caption>
			<?php
				 if(!empty($id))echo "Uredi vrstu drona";
                 else echo "Dodaj vrstu drona";
			?>
		</caption>
		<tbody>
			<tr>
				<td colspan="2" style="border:none">
					<input type="hidden" name="vrsta_drona_id" value="<?php if(!empty($id))echo $id;else echo 0;?>"/>
				</td>
			</tr>
			<tr>
				<td class="lijevi">
					<label for="naziv"><strong>Naziv vrste drona:</strong></label>
				</td>
				<td>
					<input type="text" name="naziv" id="naziv"
						
						value="<?php if(!isset($_POST['naziv']))echo $naziv; else echo $_POST['naziv'];?>" size="120" minlength="4" maxlength="50"
						placeholder="Unesite naziv vrste drona"
						required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="minKM"><strong>Minimalna kilometraža:</strong></label>
				</td>
				<td>
					<input type="number" name="minKM" id="minKM" style="width:500px" value="<?php if(!isset($_POST['minKM']))echo $minKM; else echo $_POST['minKM'];?>"
						 min="0" max="100" step="any" placeholder="Unesite minimalnu kilometražu (samo broj, bez oznake km)" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="maxKM"><strong>Maksimalna kilometraža:</strong></label>
				</td>
				<td>
					<input type="number" name="maxKM" id="maxKM" style="width:500px" value="<?php if(!isset($_POST['maxKM']))echo $maxKM; else echo $_POST['maxKM'];?>"
						 min="0" max="100" step="any" placeholder="Unesite minimalnu kilometražu (samo broj, bez oznake km)" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="cijenaPoKM"><strong>Cijena po kilometru:</strong></label>
				</td>
				<td>
					<input type="number" name="cijenaPoKM" id="cijenaPoKM" style="width:500px" value="<?php if(!isset($_POST['cijenaPoKM']))echo $cijenaPoKM; else echo $_POST['cijenaPoKM'];?>"
						 min="0" max="100" step="any" placeholder="Unesite cijenu za pređeni kilometar drona (samo broj, bez oznake €)" required="required"/>
				</td>
			</tr>

			<tr>
				<td colspan="2" style="text-align:center;">
					<?php
						echo '<input type="submit" name="submit" value="Pošalji"/>';
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</form>
<?php
	zatvoriVezuNaBazu($bp);
?>

</body>

</html>