<?php
class Upis extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
// METODE

// konstruktor nasledjuje od bazne klase Tabela

public function DaLiSeNaplacujePutniTrosak($kilometraza)
{

	//Uzima danasnji datum i datum prosledjen parametrom funkcije, formatira ih, a zatim poredi razliku izmedju godina
//Nakon toga preuzima parametar u kome se nalazi broj godina i poredi ga sa prethodno dobijenom vrednoscu
$putniTrosak="NE";
$put = $kilometraza;
$xml=simplexml_load_file(dirname(__DIR__)."/klase/ParametarKilometraza.xml") or die("Ne moze da se ucita XML fajl");
$parametarKilometraza = $xml->kilometri;

if($put<$parametarKilometraza){
     return $putniTrosak="NE";
                            }
else{
    return $putniTrosak="DA";
    }
}

}
?>