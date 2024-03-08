<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
?>

        <div id="opis">
            
              
              <h2>Opis aplikacije - Dostava dronom</h2>

              <p>
                 Aplikacija služi za naručivanje dostave dronom u kojoj registrirani korisnici zatražuju dostavu unosom potrebnih podataka kao što su adresa polazišta, adresa dostave, opis pošiljke, 
                 hitnost, i sl. Registrirani korisnik nakon dostavljene pošiljke u sustavu označuje dostavu kao izvršenu.
              </p>
              <br>

              <table id="korisnici">
                <tr>
                <th colspan="2">Korisnici sustava</th>
                </tr>

                <tr>
                    <td><strong>POPIS ULOGA</strong></td>
                    <td><strong>OPIS ULOGA</strong></td>
                </tr>

                <tr>
                    <td>Administrator</td>
                    <td>Unosi, ažurira i pregledava korisnike sustava te ažurira njihove tipove, unosi ažurira i pregledava vrste dronova<br> te im dodjeljuje moderatora</td>
                </tr>

                <tr>
                    <td>Moderator</td>
                    <td>Potvrđuje narudžbe, dodaje nove dronove za svoju vrstu, ažurira podatke drona, pregledava statistiku dronova</td>
                </tr>

                <tr>
                    <td>Registrirani korisnik</td>
                    <td>Zatražuje dostavu i označuje isporučenu dostavu</td>
                </tr>

                <tr>
                    <td>Anonimni korisnik</td>
                    <td>Pregledava top 5 dronova</td> 
                </tr>

              </table>
        
              <br>
              <br>

              <table id="korisnici">

                <tr>
                    <th colspan="2">Datoteke sustava</th>
                    </tr>
    
                    <tr>
                        <td><strong>POPIS DATOTEKA</strong></td>
                        <td><strong>OPIS DATOTEKA</strong></td>
                    </tr>
    
                    <tr>
                        <td>index.php</td>
                        <td>Opis aplikacije</td>
                    </tr>
    
                    <tr>
                        <td>zaglavlje.php</td>
                        <td>Sadrži zaglavlje koje se ubacuje u svaku stranicu u kojem se nalazi postavljanje sesije, navigacija i link koji vodi na prijavu </td>
                    </tr>
    
                    <tr>
                        <td>baza.php</td>
                        <td>Skripta za rad s bazom podataka</td>
                    </tr>
    
                    <tr>
                        <td>o_autoru.php</td>
                        <td>Podaci o autoru stranice</td>
                    </tr>

                    <tr>
                        <td>dostava.php</td>
                        <td>Obrazac za slanje nove dostave</td>
                    </tr>

                    <tr>
                        <td>dronovi.php</td>
                        <td>Lista svih dronova koji se mogu sortirati po cijeni i nazivu</td>
                    </tr>

                    <tr>
                        <td>index.css</td>
                        <td>CSS datoteka</td>
                    </tr>

                    <tr>
                        <td>korisnici.php</td>
                        <td>Popis korisnika sustava u kojem moderator može uređivati i dodavati nove korisnike te dodijeljivati vrstu drona moderatorima</td>
                    </tr>

                    <tr>
                        <td>korisnik.php</td>
                        <td>Obrazac za uređivanje i dodavanje novih korisnika</td>
                    </tr>

                    <tr>
                        <td>narudzbe.php</td>
                        <td>Lista zaprimljenih narudžbi i potvrđivanje narudžbi</td>
                    </tr>

                    <tr>
                        <td>novidron.php</td>
                        <td>Obrazac za uređivanje i dodavanje novog drona</td>
                    </tr>

                    <tr>
                        <td>prijava.php</td>
                        <td>Obrazac za prijavu u sustav, spremanje podataka u sesiju i odjava</td>
                    </tr>

                    <tr>
                        <td>top5.php</td>
                        <td>Lista top 5 dronova s najviše obavljenih dostava</td>
                    </tr>

                    <tr>
                        <td>uredidron.php</td>
                        <td>Obrazac za uređivanje i dodavanje nove vrste drona</td>
                    </tr>

                    <tr>
                        <td>vrstedron.php</td>
                        <td>Lista vrsta dronova</td>
                    </tr>

              </table>

        </div>

   </body>

</html>