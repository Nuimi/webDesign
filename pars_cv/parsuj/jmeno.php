<?php
	function jmeno($finalDocument)
	{
		include"pripojeni.php";

		$hledani_jmeno = $db->query("SELECT jmeno FROM svatky");
		$pruchod_j = 0;

		while($row = $hledani_jmeno->fetch_assoc())
		{
		  $jmeno = mb_strtolower(($row['jmeno']));
		  $regular_jmeno='/(\s'.$jmeno.'\s)/';
		  if(preg_match_all($regular_jmeno, $finalDocument, $shoda_jmeno, PREG_SET_ORDER))
		  {
		    //$j_hl = var_dump($shoda_jmeno);
		    $j = $shoda_jmeno[0];
		    $j_hl = $j[0];
		  }
		  else
		  {
		    $pruchod_j++;

		    if ($pruchod_j == 375) 
			{
			  $hledani_jmeno = $db->query("SELECT jmeno FROM jmena");
			  $pruchod_j2 = 0;

			  while($row = $hledani_jmeno->fetch_assoc())
			  {
			    $jmeno = mb_strtolower(($row['jmeno']));
			    $regular_jmeno='/(\s'.$jmeno.'\s)/'; 

			    if(preg_match_all($regular_jmeno, $finalDocument, $shoda_jmeno))
			    {
			      	//$j_hl = var_dump($shoda_jmeno);
			      	$j = $shoda_jmeno[0];
		    		$j_hl = $j[0];
			    }
			    else
			    {
			      $pruchod_j2++;
			    }
			  }

			  if($pruchod_j2 == 69536)
			  {
			    $j_hl = false;
			  }
			}
		  }
		}

		return $j_hl;
	}
?>