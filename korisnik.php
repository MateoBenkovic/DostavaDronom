<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip!=0){
		header('Location:index.php');
	}
?>
<?php
	
	if(isset($_POST['submit'])){
		
		
			$id=$_POST['novi'];
			$tip=$_POST['tip'];
			$kor_ime=$_POST['kor_ime'];
			$lozinka=$_POST['lozinka'];
			$ime=$_POST['ime'];
			$prezime=$_POST['prezime'];
			$email=$_POST['email'];
			
			if ($_POST['vrsta_drona_id'] == "") {
				$vrstadrona= "NULL";
			} else {
				$vrstadrona= $_POST['vrsta_drona_id'];
			}
            
			if($id==0){
				$sql="INSERT INTO korisnik
				(tip_korisnika_id,vrsta_drona_id,korime,lozinka,ime,prezime,email)
				VALUES
				('$tip',$vrstadrona,'$kor_ime','$lozinka','$ime','$prezime','$email');
				";
			}
			else{
				$sql="UPDATE korisnik SET
					tip_korisnika_id='$tip',
                    vrsta_drona_id=$vrstadrona,
					ime='$ime',
					prezime='$prezime',
					lozinka='$lozinka',
					email='$email',
                    korime='$kor_ime'
					WHERE korisnik_id='$id'
				";
			}
			izvrsiUpit($bp,$sql);
		    header("Location:korisnici.php");
		}
	
	if(isset($_GET['korisnik'])){
		$id=$_GET['korisnik'];
		$sql="SELECT * FROM korisnik WHERE korisnik_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$tip,$vrstadrona,$kor_ime,$email,$lozinka,$ime,$prezime)=mysqli_fetch_array($rs);
	}
	else{
		$tip=2;
		$vrstadrona="";
		$kor_ime="";
		$email="";
        $lozinka="";
		$ime="";
		$prezime="";
	}
	

?>
<form method="POST" action="<?php if(isset($_GET['korisnik']))echo "korisnik.php?korisnik=$id";else echo "korisnik.php";?>">
<div style="width:70%; margin-left:15%;">
	<table style="width:100%;">
		<caption>
			<?php
				 if(!empty($id))echo "Uredi korisnika";
                 else echo "Dodaj korisnika";
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
					<label for="kor_ime"><strong>Korisničko ime:</strong></label>
				</td>
				<td>
					<input type="text" name="kor_ime" id="kor_ime"
						
						value="<?php if(!isset($_POST['kor_ime']))echo $kor_ime; else echo $_POST['kor_ime'];?>" size="120" minlength="4" maxlength="50"
						placeholder="Korisničko ime ne smije sadržavati praznine, treba uključiti minimalno 4 znaka i započeti malim početnim slovom"
						required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="ime"><strong>Ime:</strong></label>
				</td>
				<td>
					<input type="text" name="ime" id="ime" value="<?php if(!isset($_POST['ime']))echo $ime; else echo $_POST['ime'];?>"
						size="120" minlength="3" maxlength="50" placeholder="Ime treba započeti velikim početnim slovom" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="prezime"><strong>Prezime:</strong></label>
				</td>
				<td>
					<input type="text" name="prezime" id="prezime" value="<?php if(!isset($_POST['prezime']))echo $prezime; else echo $_POST['prezime'];?>"
						size="120" minlength="3" maxlength="50" placeholder="Prezime treba započeti velikim početnim slovom" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="lozinka"><strong>Lozinka:</strong></label>
				</td>
				<td>
					<input <?php if(!empty($lozinka))echo "type='text'"; else echo "type='password'";?>
						name="lozinka" id="lozinka" value="<?php if(!isset($_POST['lozinka']))echo $lozinka; else echo $_POST['lozinka'];?>"
						size="120" minlength="6" maxlength="50"
						placeholder="Lozinka treba sadržati minimalno 6 znakova"
						required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="email"><strong>E-mail:</strong></label>
				</td>
				<td>
					<input type="email" name="email" id="email" value="<?php if(!isset($_POST['email']))echo $email; else echo $_POST['email'];?>"
						size="120" minlength="5" maxlength="50" placeholder="Ispravan oblik elektroničke pošte je nesto@nesto.nesto" required="required"/>
				</td>
			</tr>
			
			<tr>
				<td><label for="tip"><strong>Tip korisnika:</strong></label></td>
				<td>
					<select id="tip" name="tip">
						<?php
							if(isset($_POST['tip'])){
								echo '<option value="0"';if($_POST['tip']==0)echo " selected='selected'";echo'>Administrator</option>';
								echo '<option value="1"';if($_POST['tip']==1)echo " selected='selected'";echo'>Moderator</option>';
								echo '<option value="2"';if($_POST['tip']==2)echo " selected='selected'";echo'>Registrirani korisnik</option>';
							}
							else{
								echo '<option value="0"';if($tip==0)echo " selected='selected'";echo'>Administrator</option>';
								echo '<option value="1"';if($tip==1)echo " selected='selected'";echo'>Moderator</option>';
								echo '<option value="2"';if($tip==2)echo " selected='selected'";echo'>Registrirani korisnik</option>';
							}
						?>
					</select>
				</td>
			</tr>




			<tr>
				<td><label for="vrsta_drona_id"><strong>Vrsta dodijeljenog drona:</strong></label></td>
				<td>
					<select id="vrsta_drona_id" name="vrsta_drona_id">
						<?php

							$upit = "SELECT vrsta_drona_id, naziv FROM vrsta_drona";
							$vrsta = izvrsiUpit($bp,$upit);

							echo "<option value=''>Unosi se registrirani korisnik/admin</option>";

							while(list($vrsta_id, $naziv) = mysqli_fetch_array($vrsta)) {
								if ($vrstadrona == $vrsta_id) {
									echo "<option selected value='$vrsta_id'>$naziv</option>";
								} else {
									echo "<option value='$vrsta_id'>$naziv</option>";
								}
							}

							?>
							</select>
						</td>
						</tr>

			<tr>
				<td colspan="2" style="text-align:center;">
					<input type="submit" name="submit" value="Pošalji" id="submit"/>
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