<?php

function tituly($finalDocument)
{
	include"pripojeni.php";

	$hledani_jmeno = $db->query("SELECT titul FROM tituly");
	$pruchod_t = 0;
	while($row = $hledani_jmeno->fetch_assoc())
	{
	  $titul = mb_strtolower($row['titul']);
	  $regular_titul='/(\s'.$titul.'\s)/'; 
	  
	  if(preg_match_all($regular_titul, $finalDocument, $shoda_titul))
	  {
	    //$t_hl = var_dump($shoda_titul);
	    $t = $shoda_titul[0];
	    $t_hl = $t[0];
	  }
	  else
	  {
	    $pruchod_t++;
	    
	    if($pruchod_t == 33)
		{
	  		$t_hl = false;
		}
	  }
	}

	

	return $t_hl;

}

?>