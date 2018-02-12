<?php
  include "pripojeni.php";
  include"vypisy/head.php";
  echo$head;
?>
  <body>
    <div class="black">

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <?php
            echo($xml);
          ?>
          
          <br>
          <br>
          <div class="inner cover">
            <h1 class="cover-heading">Výstup po parsování</h1>
            <?php
              $i = 1;
              $zobraz=$db->query("SELECT cesta, titul, jmeno, prijmeni, email, telefon FROM vystupparsovani");
              if($zobraz->num_rows> 0)
              echo('<div class="scroll" >
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <td>Číslo</td>
                          <td>Jmeno</td>
                          <td>Příjmení</td>
                          <td>Email</td>
                          <td>Telefon</td>
                          <td>Cesta</td>
                        </tr>
                      </thead>
                      ');

              while($row = $zobraz -> fetch_assoc())
              {
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
                  $i++;
                } 
                echo'<thead>
                        <tr>
                          <td >Č</td>
                          <td ></td>
                          <td ></td>
                          <td ></td>
                          <td ></td>
                          <td></td>
                        </tr>
                      </thead>
                     </table>
                     </div>';                        
            ?>
          </div>

          <?php
            echo($footer);
          ?>

        </div>

      </div>

    </div>
    </div>

<?php
  echo($end);
?>
