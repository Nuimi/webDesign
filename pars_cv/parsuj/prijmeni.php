<?php
	function prijmeni($finalDocument)
	{
		include"pripojeni.php";

		$hledani_prijmeni = $db->query("SELECT prijmeni FROM prijmeni");
		$pruchod = 0;

		while($row = $hledani_prijmeni->fetch_assoc())
		{
		  	$prijmeni = mb_strtolower(($row['prijmeni']));
		  	$regular_prijmeni='/(\s'.$prijmeni.'\s)/';
		  	if(preg_match_all($regular_prijmeni, $finalDocument, $shoda_prijmeni, PREG_SET_ORDER))
		  	{
		    	//$p_hl = var_dump($shoda_prijmeni);
		    	$p = $shoda_prijmeni[0];
		    	$p_hl = $p[0];
		  	}
		  	else
		  	{
		  		$pruchod++;
		  	}

		  	if($pruchod == 284603)
			{
			    $p_hl = false;
			}
		}

		return $p_hl;
	}
?>