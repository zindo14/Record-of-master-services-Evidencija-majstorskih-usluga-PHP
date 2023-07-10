<?php
class DBMesto extends Tabela 
{
//Sluzi da omoguci funkciju za citanje podataka iz tabele mesto
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $PTT;
public $NazivMesta; 
public $Kilometraza;

// METODE

// konstruktor

public function UcitajKolekcijuSvihMesta()
{
$SQL = "select * from `mesto` ORDER BY NazivMesta ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
}

public function DajKilometrazu($Mesto)
{
	//Vraca datum rodjenja kojeg cita iz entiteta pacijent za zeljeni Broj istorije bolesti 
	$SQL = "select * FROM `mesto` WHERE PTT='$Mesto'";
    $this->UcitajSvePoUpitu($SQL);
	$this->PrebaciKolekcijuUListu($this->Kolekcija);
	if ($this->BrojZapisa>0)
	{
		// postoji zapis
		foreach ($this->ListaZapisa as $VrednostCvoraListe)
		{
			$Kilometraza=$VrednostCvoraListe[2];
			
		}
	}  			
	else 
	{
		$Kilometraza='Nema zapisa';
	}
	return $Kilometraza;
}

}
?>