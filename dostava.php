<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip!=0 and $aktivni_korisnik_tip!=1 and $aktivni_korisnik_tip!=2){
		header('Location:index.php');
	}
	
?>

<?php

	$aktivniKor = $_SESSION['aktivni_korisnik_id'];
	if(isset($_POST['submit'])){
		
			$dron_id= "NULL";
			$datum_dostave= "NULL";
			$napomene= "NULL";
			$cijena= "NULL";
			$id=$_POST['novi'];
			$korisnik=$_SESSION['aktivni_korisnik_id'];
			$datum_zahtjeva=date("Y-m-d H:i:s");
			$opis=$_POST['opis_posiljke'];
            $adresa_dostave=$_POST['adresa_dostave'];
            $adresa_polazista=$_POST['adresa_polazista'];
            $dostavaKM=$_POST['dostavaKM'];
            $dostavaKG=$_POST['dostavaKG'];
            $hitnost=$_POST['hitnost'];
			$status=0;
			if(isset($_POST['status'])){
				$status=$_POST['status'];
			}
			
			if (isset($_POST['dron'])) {
				$dron_id= $_POST['dron'];
			}

			if (isset($_POST['datum_dostave'])) {
				$datum_dostave= date("Y-m-d H:i:s",strtotime($_POST['datum_dostave']));
			}

			if (isset($_POST['napomene'])) {
				$napomene= $_POST['napomene'];
			}

			if (isset($_POST['ukupna_cijena'])) {
				$cijena= $_POST['ukupna_cijena'];
			}


            
			if($id==0){
				$sql="INSERT INTO dostava
				(dron_id, korisnik_id, datum_vrijeme_zahtjeva, opis_posiljke, napomene, adresa_dostave, adresa_polazista, dostavaKM, dostavaKG, hitnost, ukupna_cijena, status)
				VALUES
				($dron_id,$korisnik, \"$datum_zahtjeva\",\"$opis\",\"$napomene\",\"$adresa_dostave\",\"$adresa_polazista\",$dostavaKM,$dostavaKG,$hitnost,$cijena,0);
				";
			}
			else{
				$sql="UPDATE dostava SET
					dron_id=$dron_id,
                    korisnik_id=$korisnik,
					datum_vrijeme_dostave=\"$datum_dostave\",
					datum_vrijeme_zahtjeva=\"$datum_zahtjeva\",
					opis_posiljke=\"$opis\",
					napomene=\"$napomene\",
                    adresa_dostave=\"$adresa_dostave\",
                    adresa_polazista=\"$adresa_polazista\",
                    dostavaKM=$dostavaKM,
                    dostavaKG=$dostavaKG,
                    hitnost=$hitnost,
                    ukupna_cijena=$cijena,
                    status=$status
					WHERE dostava_id=$id";
			}
				
			izvrsiUpit($bp,$sql);
		    header("Location:dostava.php");
			
		}
	
	if(isset($_GET['dostava'])){
		$id=$_GET['dostava'];
		
		$sql="SELECT * FROM dostava WHERE dostava_id = $id";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$dron_id,$korisnik,$datum_dostave,$datum_zahtjeva,$opis,$napomene,$adresa_dostave,$adresa_polazista,$dostavaKM,$dostavaKG,$hitnost,$cijena,$status)=mysqli_fetch_array($rs);
	} else{
		$dron_id="";
		$korisnik="$_SESSION[aktivni_korisnik_id]";
		$datum_dostave="";
		$datum_zahtjeva=date("d.m.Y. H:i:s");
        $opis="";
		$napomene="";
		$adresa_dostave="";
        $adresa_polazista="";
        $dostavaKM="";
        $dostavaKG="";
        $hitnost="";
        $cijena="";
        $status="0";
	}

    
?>

<form method="POST" action="<?php if(isset($_GET['dostava']))echo "dostava.php?dostava=$id"; else echo "dostava.php";?>">
<div style="width:70%; margin-left:15%">
	<table style="width:100%">
		<caption>
			<?php
				 if(!empty($id))echo "Potvrda narudžbe";
                 else echo "Naruči dostavu";
			?>
		</caption>
		<tbody>
			<tr>
				<td colspan="2" style="border:none">
					<input type="hidden" name="novi" id="novi" value="<?php if(!empty($id))echo $id;else echo 0;?>"/>
				</td>
			</tr>

			<?php if($aktivni_korisnik_tip!=2){
            echo "<tr>
                <td>
					<label for='dron'><strong>Dron:</strong></label>
				</td>	
				<td>
                    <select id='dron' name='dron'>";
                        
							
								
								

								if(isset($_GET['dostava'])) {
								
								$upit = "SELECT d.* FROM dron as d, vrsta_drona as vd, korisnik as k 
								WHERE k.vrsta_drona_id=vd.vrsta_drona_id 
								AND d.vrsta_drona_id=vd.vrsta_drona_id 
								AND k.korisnik_id=$aktivniKor";
								
							} 

							$nazivdron = izvrsiUpit($bp,$upit);

							while(list($dronId, $vrstaDronaId, $poveznica, $naziv) = mysqli_fetch_array($nazivdron)) {
								echo "<option value='$dron_id'>$naziv</option>";
							}


                        
                        echo "</select>
                </td>
            </tr>";
						}
			?>
            
			<?php if($aktivni_korisnik_tip!=2){
			echo "<tr>
				<td>
					<label for='korisnik'><strong>ID korisnika:</strong></label>
				</td>
				
				<td>
					<input type='number' name='korisnik' id='korisnik'
						
					value='"; if(!isset($_POST['korisnik']))echo $korisnik; echo "' min='1' max='100' placeholder='ID-korisnika' required='required'/>
				</td>
			</tr>";

				}

				if($aktivni_korisnik_tip!=2){
			echo "<tr>
				<td>
					<label for='datum_dostave'><strong>Datum i vrijeme dostave:</strong></label>
				</td>
				<td>
					<input type='text' name='datum_dostave' id='datumdostave' value='"; if(!isset($_POST['datum_dostave'])) echo date("d.m.Y. H:i:s",strtotime($datum_dostave));
						echo "' size='120' minlength='3' maxlength='50' placeholder='Upisait datum i vrijeme dostave u obliku dd.mm.gggg. hh:mm:ss'/>
				</td>
			</tr>";
				}
			?>
			<tr>
				<td>
					<label for="datum_vrijeme_zahtjeva"><strong>Datum i vrijeme zahtjeva:</strong></label>
				</td>
				<td>
					<input <?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?> type="text" name="datum_zahtjeva" id="datum_zahtjeva" value="<?php if(!isset($_POST['datum_zahtjeva']))echo date("d.m.Y. H:i:s",strtotime($datum_zahtjeva));?>"
						size="120" minlength="3" maxlength="50" readonly/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="opis_posiljke"><strong>Opis pošiljke:</strong></label>
				</td>
				<td>
					<input <?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?> type="text" name="opis_posiljke" id="opis_posiljke" value="<?php if(!isset($_POST['opis_posiljke']))echo $opis; else echo $_POST['opis_posiljke'];?>"
						size="120" minlength="3" maxlength="200" placeholder="Opisati što se šalje pošiljkom" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="napomene"><strong>Napomene:</strong></label>
				</td>
				<td>
					<input 
					<?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?>
						type=text
						name="napomene" id="napomene" value="<?php if(!isset($_POST['napomene']))echo $napomene; else echo $_POST['napomene'];?>"
						size="120" minlength="3" maxlength="50"
						placeholder="Napomena ukoliko je ima"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="adresa_dostave"><strong>Adresa dostave:</strong></label>
				</td>
				<td>
					<input 
					<?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?>
						type="text" name="adresa_dostave" id="adresa_dostave" value="<?php if(!isset($_POST['adresa_dostave']))echo $adresa_dostave; else echo $_POST['adresa_dostave'];?>"
						size="120" minlength="5" maxlength="100" placeholder="Adresa na koju se šalje pošiljka" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="adresa_polazista"><strong>Adresa polazišta:</strong></label>
				</td>
				<td>
					<input <?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?> type="text" name="adresa_polazista" id="adresa_polazista" value="<?php if(!isset($_POST['adresa_polazista']))echo $adresa_polazista; else echo $_POST['adresa_polazista'];?>"
						size="120" minlength="5" maxlength="100" placeholder="Adresa sa koje se šalje pošiljka" required="required"/>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="dostavaKM"><strong>Udaljenost dostave:</strong></label>
				</td>
				<td>
		
					
					<input <?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?> type="number" name="dostavaKM" id="dostavaKM" style="width:420px" value="<?php if(!isset($_POST['dostavaKM']))echo $dostavaKM; else echo $_POST['dostavaKM'];?>"
						size="120" min="0" max="35" step="0.1" placeholder="Udaljenost između adrese polazišta i adrese dostave" />
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="dostavaKG"><strong>Težina pošiljke:</strong></label>
				</td>
				<td>
		
					
					<input <?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?> type="number" name="dostavaKG" id="dostavaKG" style="width:420px" value="<?php if(!isset($_POST['dostavaKG']))echo $dostavaKG; else echo $_POST['dostavaKG'];?>"
						size="120" min="0" max="35" step="0.1" placeholder="Unijeti težinu pošiljke" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="hitnost"><strong>Hitnost:</strong></label>
				</td>
				<td>
		
					
					<input <?php if($aktivni_korisnik_tip != 0) echo 'readonly' ?> type="number" name="hitnost" id="hitnost" style="width:420px" value="<?php if(!isset($_POST['hitnost']))echo $hitnost; else echo $_POST['hitnost'];?>"
						size="120" min="0" max="1" placeholder="1 - hitno, 0 - nije hitno" />
				</td>
			</tr>
            
			<?php 
			if($aktivni_korisnik_tip!=2){ 
				echo "<tr>
				<td>
					<label for='ukupna_cijena'><strong>Cijena:</strong></label>
				</td>
				<td>
		
					
					<input readonly type='number' name='ukupna_cijena' id='ukupna_cijena' style='width:420px' value='"; if(!isset($_POST['ukupna_cijena']))echo $cijena; else echo $_POST['ukupna_cijena']; echo "'
						size='120' min='0' max='100' step='any'/>
				</td>
			</tr>";
			}
			if($aktivni_korisnik_tip!=2){
			echo "<tr>
				<td>
					<label for='status'><strong>Status dostave:</strong></label>
				</td>
				<td>
		
					
					<input type='number' name='status' id='status' style='width:420px' value='"; if(!isset($_POST['status']))echo $status; else echo $_POST['status']; echo "';
						size='120' min='0' max='2'/>
				</td>
			</tr>";

			 
			
}
?>
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