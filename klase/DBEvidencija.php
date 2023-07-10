<?php
class DBEvidencija extends Tabela 
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

public function DajKolekcijuSvihevidencijausluge()
{
$SQL = "select * from `evidencijausluge` ORDER BY IDEvidencije ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

public function UcitajEvidencijuUslugaPoIDEvidencije($IDParametar)
{
$SQL = "select * from `evidencijausluge` where `IDEvidencije`='".$IDParametar."'";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
// raspolazemo sa:
// $Kolekcija;
//  $
}

public function DodajEvidencijuUsluge()
{
	$SQL = "INSERT INTO `evidencijausluge` (IDEvidencije, ImePrezimeKlijenta, VrstaPosla, DatumEvidencije, DatumPocetkaRealizacije, DatumZavrsetkaPosla, Mesto, Cena) VALUES ('$this->IDEvidencije','$this->ImePrezimeKlijenta', '$this->VrstaPosla', '$this->DatumEvidencije', '$this->DatumPocetkaRealizacije',, '$this->DatumZavrsetkaPosla', '$this->Mesto', '$this->Cena')";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}



public function ObrisiEvidencijuUsluga($IdZaBrisanje)
{
	$SQL = "DELETE FROM `evidencijausluge` WHERE IDEvidencije='".$IdZaBrisanje."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// TO DO
public function IzmeniEvidencijuUsluga($StariIDEvidencije, $IDEvidencije, $ImePrezimeKlijenta, $VrstaPosla, $DatumEvidencije, $DatumPocetkaRealizacije, $DatumZavrsetkaPosla, $Mesto, $Cena)
{
	$SQL = "UPDATE `evidencijausluge` SET IDEvidencije='".$IDEvidencije."', ImePrezimeKlijenta='".$ImePrezimeKlijenta."', VrstaPosla='".$VrstaPosla."', DatumEvidencije='".$DatumEvidencije."', DatumPocetkaRealizacije='".$DatumPocetkaRealizacije."', DatumZavrsetkaPosla='".$DatumZavrsetkaPosla."', Mesto='".$Mesto."', Cena='".$Cena."' WHERE IDEvidencije='".$IDEvidencije."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// ostale metode 




}
?>