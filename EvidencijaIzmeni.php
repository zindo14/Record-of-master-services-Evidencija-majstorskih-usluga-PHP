 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   

	      // -------------------------------------

	   // preuzimanje vrednosti sa forme
	   $StariIDEvidencije=$_POST['StariIDEvidencije'];
	   $IDEvidencije=$_POST['IDEvidencije'];
	   $ImePrezimeKlijenta=$_POST['ImePrezimeKlijenta'];
	   $VrstaPosla=$_POST['VrstaPosla'];
	   $DatumEvidencije=$_POST['DatumEvidencije'];
	   $DatumPocetkaRealizacije=$_POST['DatumPocetkaRealizacije'];
	   $DatumZavrsetkaPosla=$_POST['DatumZavrsetkaPosla'];
	   $Mesto=$_POST['Mesto'];
	   $Cena=$_POST['Cena'];

	   if (isset($_POST['Mesto']))
	   {
		$Mesto=$_POST['Mesto'];
	   }
	   else // ako nije nista promenjeno
	   {
		$StaraCena=$_POST['StaraCena'];
		$Mesto=$StaraCena;
	   }
	  
	   // koristimo klasu za poziv procedure za konekciju
		require "klase/BaznaKonekcija.php";
		require "klase/BaznaTabela.php";
		$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
		$KonekcijaObject->connect();
		if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
		{	
			require "klase/DBEvidencija.php";
			$EvidencijaObject = new DBEvidencija($KonekcijaObject, 'evidencijausluge');
			$greska=$EvidencijaObject->IzmeniEvidencijuUsluga($StariIDEvidencije, $IDEvidencije, $ImePrezimeKlijenta,$VrstaPosla, $DatumEvidencije ,$DatumPocetkaRealizacije,$DatumZavrsetkaPosla,$Mesto, $Cena);
		}
		else
		{
			echo "Nije uspostavljena konekcija ka bazi podataka!";
		}
		
    $KonekcijaObject->disconnect();
	   
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:EvidencijaLista.php');	
		
	  
      ?>

