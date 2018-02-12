<?php
  include "pripojeni.php";
  include"vypisy/head.php";
  echo$head;
?>
<script type="text/javascript" >
  function parsuj()
  {   
    $(document).ready(function()
    {
      $("#parsuj").modal("show");
    });
    document.getElementById("stav").innerHTML="Parsuji";

    $.ajax({type: "POST",
            cache: false,        
            url: 'parsuj.php',
            data: {cesta:cesta,
                   id:id},
            success: function(data) 
            {
              pruchod++;
              if(pocet == pruchod)
              {
                document.getElementById("stav").innerHTML="Doparsováno";
                setTimeout(function()
                { 
                  $("#parsuj").modal("hide"); 
                  setTimeout(function(){ window.open("xml.php","_blank"); }, 3000);
                  
                }, 5000);
              }
            },
            error: function (data)
            {
                  
            }
          });
      }
    </script>
  <body>
    <div id="parsuj" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content" style="color: black; text-shadow: none;">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"  id="myModalLabel" style="font-weight: bold;">
              Parsování životopisů
            </h4>
          </div>

          <div class="modal-body">
            <p>
              Stav: <span id="stav"></span>
            </p>         
          </div>

        </div>
      </div>
    </div>
    
    <div class="black">

      <div class="site-wrapper">

        <div class="site-wrapper-inner">

          <div class="cover-container">

            <?php
              echo($pars);
            ?>

            <br>
            <br>
            <br>
            
            
            
            <h1 class="cover-heading">Vyber soubory na parsování</h1>
            <div class="inner cover">
            
              <form method="POST" action="">
                
                <button style="z-index:110" type="submit" name="smaz" class="btn btn-primary">Smaž</button>
                <button style="z-index:110" type="submit" name="parsuj" class="btn btn-primary">Parsuj</button>
                
                <div class="scroll">
                  
                  <table class="table table-hover">
                    
                    <thead>
                       
                      <tr>
                        <td>Číslo</td>
                        <td>Název</td>
                        <td>Přípona</td>
                        <td onclick="check()" style="cursor:pointer">Parsuj</td>
                      </tr>
                    </thead>

                    <?php

                      $i = 1;
                      $zobraz=$db->query("SELECT id,cesta, nazev, pripona FROM soubory WHERE pars = 'FALSE'");
                      while($row = $zobraz -> fetch_assoc())
                      {
                        echo ('<tr >
                                  <td>'.$i.'</td>
                                  <td>
                                    '. $row['nazev'] .'
                                    <input type="hidden" name="cesta" value="'. $row['cesta'] .'">
                                  </td>
                                  <td>
                                    '. $row['pripona'] .'
                                  </td>
                                  <td>
                                    <div class="checkbox" >
                                      <label>
                                        <input  id="check" name="check[]" type="checkbox" value="'. $row['id'] .'" checked>
                                      </label>
                                    </div>
                                  </td>
                                </tr>'); 
                          $i++;
                        } 
                    ?>
                    
                  </table>
                
                </div>

              </form>
              
              <?php
                
                if (isset($_POST['smaz'])) 
                {  
                  $check = $_POST['check'];
                  require"parsovani/smaz.php";
                  if(smaz($check))
                  {
                    echo('<script>alert("Záznamy byly smazány");
                                        window.location.href="parsovani.php";</script>');
                    
                  }
                    
                }

                if (isset($_POST['parsuj'])) 
                {  
                  $check = $_POST['check'];
                          
                  for($i=0;$i<count($check);$i++)
                  { 
                    $id = $check[$i];

                    $dotaz = $db->query("SELECT cesta FROM soubory WHERE id ='".$id."' ");

                    while($row = $dotaz ->fetch_assoc())
                    {
                      $cesta_souboru = $row['cesta'];
                    }
                    
                    echo('<script>
                            var cesta = "'.$cesta_souboru.'";
                            var pocet = "'.count($check).'";
                            var id = "'.$id.'";
                            var pruchod = 0;
                            parsuj();
                          </script>'
                        );
                    }
                }
                          
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
