<?php
	function email($finalDocument)
	{
		$regular_email = '/[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9]{2,4}/';
		if(preg_match_all($regular_email, $finalDocument, $shoda_email,PREG_PATTERN_ORDER))
		{ 
			//$e_hl = var_dump($shoda_email);

			$e = $shoda_email[0];
			$e_hl = $e[0];
		}
		else
		{
			$e_hl = false;
		}

		return $e_hl;
	}

/*[
	{
		"email": "la1@hcdsd.cz"
	},
	{
		"email": "la2@hcdsd.cz"
	}
]

[{"e": $e_hl}]

StringBuilder pole = new StringBuilder();
pole.append("[");

for(int i = 0; i < $shoda_email[0].length/size; i++){
	String s = String.format("{\"email\": %s}", $e[0]);

	pole.append(s);
	if (i < $shoda_email[0].length/size)) pole.append(",");
}

pole.append("]");

return pole;*/

?>












