
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">

<tr>
<td style="width:5%;">
</td>

<td>
<font face="Trebuchet MS" color="darkblue" size="4px">
<b>СПИСАК ИЗ ЕВИДЕНЦИЈЕ ИЗВРШЕНИХ РАДОВА МАЈСТОРА ЗА КУЋУ</br> </font>
<form action="" method="GET">
Врста посла: <input type="text" name="filter" />
<input type="submit" name="filtriraj" value="FILTRIRAJ" />
<input type="submit" name="svi" value="SVI" />

</form>


</td>

<td style="width:5%;">
</td>
</tr>


<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<font face="Trebuchet MS" color="darkblue" size="4px">

<?php
// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

if ($EvidencijaViewObject->BrojZapisa==0)
	{
		echo "НЕМА ЗАПИСА У ТАБЕЛИ!";
	}
else
	{
	echo "УКУПАН БРОЈ ЗАПИСА:".$EvidencijaViewObject->BrojZapisa;
		// ------------ zaglavlje ----------------
		echo "<table style=\"width:100%; padding:0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\"  bgcolor=\"#D8E7F4\">";
		echo "<tr>";

		echo "<td style=\"width:15%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ИД Евиденције</font><br/>";
		echo "</td>";

		echo "<td style=\"width:15%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Клијент</font><br/>";
		echo "</td>";

		echo "<td style=\"width:15%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Врста посла</font><br/>";
		echo "</td>";

		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Место</font><br/>";
		echo "</td>";

		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Цена</font><br/>";
		echo "</td>";

		echo "<td style=\"width:10%;>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">IZMENA</font><br/>";
		echo "</td>";
		echo "<td style=\"width:10%;>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">BRISANJE</font><br/>";
		echo "</td>";
		echo "</tr>";

		for ($RBZapisa = 0; $RBZapisa < $EvidencijaViewObject->BrojZapisa; $RBZapisa++) 
		{
							
		// CITANJE VREDNOSTI IZ MEMORIJSKE KOLEKCIJE $RESULT I DODELJIVANJE PROMENLJIVIM
		$IDEvidencije=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 0);
		$ImePrezimeKlijenta=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 1);
		$VrstaPosla=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 2);
		$Mesto=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 3);
		$Cena=$EvidencijaViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($EvidencijaViewObject->Kolekcija, $RBZapisa, 4);

		// CRTANJE REDA TABELE SA PODACIMA
		echo "<tr>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$IDEvidencije</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$ImePrezimeKlijenta</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$VrstaPosla</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Mesto</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Cena</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<form ACTION=\"EvidencijaIzmeniForm.php\" METHOD=\"POST\">";
		echo "<input type=\"hidden\" name=\"IDEvidencije\" value=\"$IDEvidencije\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\"><input TYPE=\"submit\" name=\"izmeniStudenta\" value=\"IZMENI\" /></font></b>";
		echo "</form>";
		echo "</td>";
		echo "<td>";
		echo "<form ACTION=\"EvidencijaObrisi.php\" METHOD=\"POST\">";
		echo "<input type=\"hidden\" name=\"IDEvidencije\" value=\"$IDEvidencije\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\"><input TYPE=\"submit\" name=\"obrisiStudenta\" value=\"OBRISI\"  onclick=\"return confirm('Da li ste sigurni da zelite da obrisete zapis?')\"/></font></b>";
		echo "</form>";
		echo "</td>";
		echo "</tr>";

		}  //za for 
		echo "</table>";
		echo "<br/>";
		echo "<br/>";
	}
$KonekcijaObject->disconnect();

?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    