<?php
 	function uloz($ulozeni, $t_hl, $j_hl,$p_hl, $e_hl, $tel_hl, $cesta, $id)
 	{	
 		include"pripojeni.php";

 		switch ($ulozeni) 
 		{
		  	case '00000':
				$update = $db->query("UPDATE soubory SET pars = 'FALSE' WHERE id = '".$id."'");
		    break;

			case '00001':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '00010':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$e_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '00011':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '00100':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,prijmeni) 
		                           		VALUES ('".$cesta."',
		                                   		'".$p_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '00101':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,prijmeni,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$p_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '00110':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,prijmeni,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '00111':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,prijmeni,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01000':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno) 
		                           		VALUES ('".$cesta."',
		                                   		'".$j_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01001':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$j_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01010':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$j_hl."',
		                                   		'".$e_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01011':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$j_hl."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01100':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno,prijmeni) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',)");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01101':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno,prijmeni,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01110':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno,prijmeni,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '01111':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,jmeno,prijmeni,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE' WHERE id = '".$id."'");
			break;

			case '10000':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '10001':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '10010':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$e_hl."',)");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '10011':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '10100':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,prijmeni) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$p_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '10101':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,prijmeni,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$p_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '10110':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,prijmeni,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '10111':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,prijmeni,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11000':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11001':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11010':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$e_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11011':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11100':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno,prijmeni) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',)");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11101':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno,prijmeni,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11110':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno,prijmeni,email) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE1' WHERE id = '".$id."'");
			break;

			case '11111':
				$vlozeni = $db->query("INSERT INTO vystupparsovani(cesta,titul,jmeno,prijmeni,email,telefon) 
		                           		VALUES ('".$cesta."',
		                                   		'".$t_hl."',
		                                   		'".$j_hl."',
		                                   		'".$p_hl."',
		                                   		'".$e_hl."',
		                                   		'".$tel_hl."')");
				$update = $db->query("UPDATE soubory SET pars = 'TRUE' WHERE id = '".$id."'");
			break;

		  	default:
		    	echo("chyba, neni pole");
		    break;
		}
 	}
?>