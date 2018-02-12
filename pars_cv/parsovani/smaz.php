<?php
 function smaz($check)
 {
 	include"pripojeni.php";
 	for($i=0;$i<count($check);$i++)
    { 
        $id = $check[$i];

        $dotaz = $db->query("SELECT cesta FROM soubory WHERE id ='".$id."' ");

        while($row = $dotaz ->fetch_assoc())
        {
            unlink($row['cesta']);
        }

        $smaz = $db->query("DELETE FROM soubory WHERE id = '".$id."'");
    }

    return TRUE;
 }
 
?>