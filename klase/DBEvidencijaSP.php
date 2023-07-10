<?php
class DBEvidencija extends Tabela 
// rad sa stored procedurom za snimanje novog studenta
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $IDEvidencije;
public $ImePrezimeKlijenta;
public $VrstaPosla;
public $DatumEvidencije;
public $DatumPocetkaRealizacije;
public $DatumZavrsetkaPosla;
public $Mesto;
public $Cena;

// METODE

// konstruktor

public function DodajEvidencijuUsluge()
{
	//$SQL = "INSERT INTO `student` (IDEvidencije, ImePrezimeKlijenta, Ime, DatumEvidencije, NazivFajlaFotografije) VALUES ('$this->IDEvidencije','$this->ImePrezimeKlijenta', '$this->Ime', '$this->DatumEvidencije', '$this->NazivFajlaFotografije')";
	//$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	
		$GreskarezultatPar1 = $this->IzvrsiAktivanSQLUpit ("SET @IDEvidencijeParametar='".$this->IDEvidencije."'");
		
		$GreskarezultatPar2 = $this->IzvrsiAktivanSQLUpit ("SET @ImePrezimeKlijentaParametar='".$this->ImePrezimeKlijenta."'");
		
		$GreskarezultatPar3 =  $this->IzvrsiAktivanSQLUpit ("SET @VrstaPoslaParametar='".$this->VrstaPosla."'");
		
		$GreskarezultatPar4 = $this->IzvrsiAktivanSQLUpit (  "SET @DatumEvidencijeParametar='".$this->DatumEvidencije."'");
		
		$GreskarezultatPar5 = $this->IzvrsiAktivanSQLUpit (  "SET @DatumPocetkaRealizacijeParametar='".$this->DatumPocetkaRealizacije."'");

		$GreskarezultatPar6 = $this->IzvrsiAktivanSQLUpit (  "SET @DatumZavrsetkaPoslaParametar='".$this->DatumZavrsetkaPosla."'");

		$GreskarezultatPar7 = $this->IzvrsiAktivanSQLUpit (  "SET @MestoParametar='".$this->Mesto."'");

		$GreskarezultatPar8 = $this->IzvrsiAktivanSQLUpit (  "SET @CenaParametar='".$this->Cena."'");
		
		$GreskarezultatCall = $this->IzvrsiAktivanSQLUpit ( "CALL `DodajEvidencijuUsluge`(@IDEvidencijeParametar,@ImePrezimeKlijentaParametar,@VrstaPoslaParametar,@DatumEvidencijeParametar,@DatumPocetkaRealizacijeParametar, @DatumZavrsetkaPoslaParametar, @MestoParametar, @CenaParametar);");
		
	
	$greska=$GreskarezultatPar1.$GreskarezultatPar2.$GreskarezultatPar3.$GreskarezultatPar4.$GreskarezultatPar5.$GreskarezultatPar7.$GreskarezultatPar8.$GreskarezultatCall;
	return $greska;
}


}
?>