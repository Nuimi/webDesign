<?php
	include"pripojeni.php";
	include"vypisy/head.php";
	include"parsuj/Conversion.php";

	if($_POST)
	{
	  	$cesta= $_POST['cesta'];
	  	$id= $_POST['id'];
	  	$docObj = new FileConversion($cesta);
	}
	else
	{
		$cesta= "soubory/Jmeno1.docx";	
		$id= 100;  	
		$docObj = new FileConversion($cesta);
	}
	
	$docText = $docObj->convertToText();
	$document = mb_strtolower($docText);
	$finalDocument = substr($document, 0, 800);
	print_r($finalDocument);
	$ulozeni="11111";

	//titul
	require"parsuj/titul.php";
	$titul = tituly($finalDocument);

	if($titul == false)
	{
		$ulozeni[0] = 0;
	}

	//jmeno
	require"parsuj/jmeno.php";
	$jmeno = jmeno($finalDocument);
	if($jmeno == false)
	{
		$ulozeni[1] = 0;
	}

	//prijmeni
	require"parsuj/prijmeni.php";
	$prijmeni = prijmeni($finalDocument);
	if($prijmeni == false)
	{
		$ulozeni[2] = 0;
	}

	//email
	require"parsuj/email.php";
	$email = email($finalDocument);
	if($email == false)
	{
		$ulozeni[3] = 0;
	}

	//telefon
	require"parsuj/telefon.php";
	$telefon = telefon($finalDocument);
	print_r($telefon);
	if($telefon == false)
	{
		$ulozeni[4] = 0;
	}

	require"parsuj/ulozeni.php";
	uloz($ulozeni, $titul, $jmeno,$prijmeni, $email, $telefon, $cesta, $id);
?>