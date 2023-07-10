
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">
<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<b><font face="Trebuchet MS" color="darkblue" size="4px">  </font></b>
<table style="width:100%;" bgcolor="#D8E7F4" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<b><font face="Trebuchet MS" color="black" size="3px">ИЗМЕНА ПОДАТАКА У ЕВИДЕНЦИЈИ</b></br>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>

<td align="center">


<!------------------------FORMA ZA UNOS ---- ACTION="studentsnimi.php" --->
<table style="width:50%;" bgcolor="#D8E7F4" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">
<form name="FormaZaUnosStudenta" action="EvidencijaIzmeni.php" METHOD="POST" enctype="multipart/form-data" >

<tr>
<td align="right" valign="bottom">     
<b><font face="Trebuchet MS" color="black" size="2px">ИД Евиденције&nbsp;&nbsp;</font></b>
</td>
<td align="left" valign="bottom">
<input name="IDEvidencije" type="text" size="50" value="<?php echo $StariIDEvidencije; ?>"  />
<input type="hidden" name="StariIDEvidencije" value="<?php echo $StariIDEvidencije; ?>">

</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Клијент&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="ImePrezimeKlijenta" type="text" size="50" value="<?php echo $StaroImePrezimeKlijenta; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Врста посла&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="VrstaPosla" type="text" size="50" value="<?php echo $StaraVrstaPosla; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Датум&nbsp;евиденције&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="DatumEvidencije" type="text" size="50" value="<?php echo $StariDatumEvidencije; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Датум&nbsp;почетка&nbsp;реализације&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="DatumPocetkaRealizacije" type="text" size="50" value="<?php echo $StariDatumPocetkaRealizacije; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Датум&nbsp;завршетка&nbsp;посла&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="DatumZavrsetkaPosla" type="text" size="50" value="<?php echo $StariDatumZavrsetkaPosla; ?>"/>
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="top">
<b><font face="Trebuchet MS" color="black" size="2px">Место&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<select name="Mesto" required TABINDEX=7>		
	<option value="">izaberite...</option>
	<?php
	// upis vrednosti iz bp - Tip vozila
		
	// PREDSTAVLJANJE U OPTION KROZ FOR CIKLUS
	if ($UkupanBrojZapisa>0) 
	{					
		for ($brojacMesta = 0; $brojacMesta < $UkupanBrojZapisa; $brojacMesta++) 
			{
				$Mesto =$MestoObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacMesta, 0);				
				$nazivMesta=$MestoObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($KolekcijaZapisa, $brojacMesta, 1);				
				echo "<option value=\"$Mesto\">$nazivMesta</option>";						
			} //for
										
	} // 
	
	?>
		
</select>
<br/>
<font face="Trebuchet MS" color="black" size="2px">Старо место: <?php echo $StaroMesto; ?></font>
<input type="hidden" name="StaroMesto" value="<?php echo $StaroMesto; ?>">

</td>
</tr>

<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
</td>
</tr>

<tr>
<td align="right" valign="bottom">
<b><font face="Trebuchet MS" color="black" size="2px">Цена&nbsp;&nbsp;</font><br/></b>
</td>
<td align="left" valign="bottom">
<input name="Cena" type="text" size="50" value="<?php echo $StaraCena; ?>"/>
</td>
</tr>

<!-------------------------- prazan red ------->
<tr>
<td align="right" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<td align="left" valign="bottom">
<font face="Trebuchet MS" color="#D8E7F4" size="2px">.</font><br/>
</td>
<tr>

<td>       
</td>
<td><input TYPE="submit" name="snimiButton" value="СНИМИ ИЗМЕНУ" TABINDEX=3/>
</td>
</form>
</table>

</td>
<td style="width:3%;">
</td>
</tr>

<tr>
<td style="width:3%;">
</td>
<td align="center">
<font color="#D8E7F4" size="1px">.</font>
</td>
<td style="width:3%;">
</td>
</tr>
</table>
</td>

<td style="width:5%;">
</td>

</tr>
</table>
<img src="images/sredinadole.jpg" width="100%" height="5" alt="" class="flt1" /> 
    