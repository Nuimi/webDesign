<?php
	include"../pripojeni.php";

	$zobraz=$db->query("SELECT prijmeni FROM prijmeni ");
    $i = 1;
    while($row = $zobraz -> fetch_assoc())
    {
        $zmen = $db->query("UPDATE prijmeni SET idP= '".$i."' WHERE prijmeni = '".$row['prijmeni']."'");
        $i++;
    } 
?>