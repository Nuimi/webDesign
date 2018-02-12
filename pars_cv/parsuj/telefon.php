<?php
	function telefon($finalDocument)
	{
		$regular_telefon = '/\s?(\+420)?\s?[1-9][0-9]{2}\s?[0-9]{3}\s?[0-9]{3}/us';

		if(preg_match_all($regular_telefon, $finalDocument, $shoda_telefon, PREG_SET_ORDER, 0))
		{
			//$t_hl = var_dump($shoda_telefon);
			$t = $shoda_telefon[0];
			$t_hl = $t[0];
		}
		else
		{
			$t_hl = false;
		}

		return $t_hl;
	}
?>