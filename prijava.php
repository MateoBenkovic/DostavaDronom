<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
?>

<?php
	if(isset($_GET['logout'])){
		unset($_SESSION["aktivni_korisnik"]);
		unset($_SESSION['aktivni_korisnik_ime']);
		unset($_SESSION["aktivni_korisnik_tip"]);
		unset($_SESSION["aktivni_korisnik_id"]);
		session_destroy();
		header("Location:index.php");
	}

    $greska= "";
	if(isset($_POST['submit'])){
		$korime=mysqli_real_escape_string($bp,$_POST['korisnicko_ime']);
		$lozinka=mysqli_real_escape_string($bp,$_POST['lozinka']);

		if(!empty($korime) && !empty($lozinka)){
			$sql="SELECT korime,lozinka,prezime,ime,korisnik_id,tip_korisnika_id FROM korisnik WHERE korime='$korime' AND lozinka='$lozinka'";
			$rs=izvrsiUpit($bp,$sql);
			if(mysqli_num_rows($rs)==0)$greska="Ne postoji korisnik s navedenim korisničkim imenom i lozinkom";
			else{
				list($korime,$lozinka,$prezime,$ime,$aktivni_korisnik_id,$aktivni_korisnik_tip)=mysqli_fetch_array($rs);
				$_SESSION['aktivni_korisnik']=$korime;
				$_SESSION['aktivni_korisnik_ime']=$ime." ".$prezime;
				$_SESSION['aktivni_korisnik_id']=$aktivni_korisnik_id;
				$_SESSION['aktivni_korisnik_tip']=$aktivni_korisnik_tip;
				header("Location:index.php");
			}
		}
		else $greska = "Molim unesite korisničko ime i lozinku";
	}
?>

<form id="prijava" name="prijava" method="POST" action="prijava.php">

<div id="kordiv">
<table>
		<caption>Prijava u sustav</caption>
		<tbody>
			<tr>
					<td colspan="2" style="text-align:center; border:none">
						<label class="greska"><?php if($greska!="")echo $greska; ?></label>
					</td>
			</tr>
			<tr>
				<td class="lijevi">
					<label for="korisnicko_ime"><strong>Korisničko ime:</strong></label>
				</td>
				<td>
					<input name="korisnicko_ime" id="korisnicko_ime" type="text" size="120"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="lozinka"><strong>Lozinka:</strong></label>
				</td>
				<td>
					<input name="lozinka" id="lozinka" type="password" size="120"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<input name="submit" type="submit" value="Prijavi se"/>
				</td>
			</tr>
		</tbody>
	</table>
</form> 
</div>

<?php
	zatvoriVezuNaBazu($bp);
?>

</body>

</html>