 <?php
        
		//session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   //$IDEvidencijekorisnika=$_SESSION["IDEvidencijekorisnika"];
	   
	      // -------------------------------------
	   
	   // preuzimanje vrednosti sa forme
	   $IDEvidencije=$_POST['IDEvidencije'];
	   $ImePrezimeKlijenta=$_POST['ImePrezimeKlijenta'];
	   $VrstaPosla=$_POST['VrstaPosla'];
	   $DatumEvidencije=$_POST['DatumEvidencije'];
	   $DatumPocetkaRealizacije=$_POST['DatumPocetkaRealizacije'];;
	   $DatumZavrsetkaPosla=$_POST['DatumZavrsetkaPosla'];
	   $Mesto=$_POST['Mesto'];
	   $Cena=$_POST['Cena'];
	   
	   //KONEKCIJA KA SERVERU
	
// koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->connect();
	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
    {

    	require "klase/DBMesto.php";
		$MestoObject = new DBMesto($KonekcijaObject, 'mesto');
		$Kilometraza=$MestoObject->DajKilometrazu($Mesto);

    	// provera poslovne logike
		require "klase/Upis.php";
		$UnosObject = new Upis($KonekcijaObject, 'evidencijausluge');
		echo $Kilometraza;
		$dozvoljenUpis=$UnosObject->DaLiSeNaplacujePutniTrosak($Kilometraza);

		if ($dozvoljenUpis=="DA")
			{

		$xml=simplexml_load_file(dirname(__DIR__)."/EvidencijaMajstorskihUslugaFinal/ParametarTrosak.xml") or die("Ne moze da se ucita XML fajl");
        $parametarTrosak = $xml->trosak;

		//echo "USPESNA KONEKCIJA";
		require "klase/BaznaTransakcija.php";
		$TransakcijaObject = new Transakcija($KonekcijaObject);
		$TransakcijaObject->ZapocniTransakciju();
		
		require "klase/DBEvidencijaSP.php";
		$EvidencijaObject = new DBEvidencija($KonekcijaObject, 'evidencijausluge');
		$EvidencijaObject->IDEvidencije=$IDEvidencije;
		$EvidencijaObject->ImePrezimeKlijenta=$ImePrezimeKlijenta;
		$EvidencijaObject->VrstaPosla=$VrstaPosla;
		$EvidencijaObject->DatumEvidencije=$DatumEvidencije;
		$EvidencijaObject->DatumPocetkaRealizacije=$DatumPocetkaRealizacije;
		$EvidencijaObject->DatumZavrsetkaPosla=$DatumZavrsetkaPosla;
		$EvidencijaObject->Mesto=$Mesto;
		$EvidencijaObject->Cena=$Cena+$parametarTrosak;
		$greska1=$EvidencijaObject->DodajEvidencijuUsluge();
		
		
		
		// zatvaranje transakcije
		//$UtvrdjenaGreska=$greska1 or $greska2;
		$UtvrdjenaGreska=$greska1.$greska2;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);
		}
			else
			{
				//echo "USPESNA KONEKCIJA";
		require "klase/BaznaTransakcija.php";
		$TransakcijaObject = new Transakcija($KonekcijaObject);
		$TransakcijaObject->ZapocniTransakciju();
		
		require "klase/DBEvidencijaSP.php";
		$EvidencijaObject = new DBEvidencija($KonekcijaObject, 'evidencijausluge');
		$EvidencijaObject->IDEvidencije=$IDEvidencije;
		$EvidencijaObject->ImePrezimeKlijenta=$ImePrezimeKlijenta;
		$EvidencijaObject->VrstaPosla=$VrstaPosla;
		$EvidencijaObject->DatumEvidencije=$DatumEvidencije;
		$EvidencijaObject->DatumPocetkaRealizacije=$DatumPocetkaRealizacije;
		$EvidencijaObject->DatumZavrsetkaPosla=$DatumZavrsetkaPosla;
		$EvidencijaObject->Mesto=$Mesto;
		$EvidencijaObject->Cena=$Cena;
		$greska1=$EvidencijaObject->DodajEvidencijuUsluge();
		
		
		
		// zatvaranje transakcije
		//$UtvrdjenaGreska=$greska1 or $greska2;
		$UtvrdjenaGreska=$greska1.$greska2;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);
			}
		} // od if db selected

      // ZATVARANJE KONEKCIJE KA DBMS
	  $KonekcijaObject->disconnect();
	
	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska) {
	echo "Greska $UtvrdjenaGreska";	
     }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:EvidencijaLista.php');		
	 }
		
	  
      ?>

