<?php
	function vypis($zobraz)
	{
		while($row = $zobraz -> fetch_assoc())
              {
              	$results[] = $result;  
                echo ('<tr >
                          <td>'.$i.'</td>
                          <td>
                            '. $row['jmeno'] .'
                          </td>
                          <td>
                            '. $row['prijmeni'] .'
                          </td>
                          <td>
                            '. $row['email'] .'
                          </td>
                          <td>
                            '. $row['telefon'] .'
                          </td>
                          <td>
                            '. $row['cesta'] .'
                          </td>
                        </tr>'); 
                } 
                return $result;
	}
?>