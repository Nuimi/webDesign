<?php
  include "pripojeni.php";
  include"vypisy/head.php";
  echo$head;
?>
<div class="black">

  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <div class="cover-container">

          <?php
            echo($index);
          ?>

          <div class="inner cover">
            <h1 class="cover-heading">Nahraj soubory na parsování</h1>

            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
              <p class="lead"> Vyberte soubory pro nahrání (Doc, Docx, Pdf, Rtf)</p>
              <input type="file" id="file" name="files[]" multiple="" accept="file_extension" />
              <div style="text-align: center;"><button type="submit" class="btn btn-primary">Pridej</button></div>
            </form>
          </div>

          <?php
            $valid_formats = array("doc", "docx", "pdf", "rtf","DOC", "DOCX", "PDF", "RTF");
            $max_file_size = 2048*1000; 
            $path = "soubory/"; 
            $count = 0;
            $nahrano = FALSE;
            $pocet = 0;

            if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
            {
              // ciklus na nahrávání
              foreach ($_FILES['files']['name'] as $f => $name) 
              {     
                $pocet++;

                if ($_FILES['files']['error'][$f] == 4) 
                {
                  echo('<div class="alert">
                          <span class="closebtn">×</span>  
                            Nalezena chyba.'.$name.'
                        </div>');
                  continue; // Přeskočí soubor pokud je nalezena chyba
                }        
                
                if ($_FILES['files']['error'][$f] == 0) 
                {            
                  if ($_FILES['files']['size'][$f] > $max_file_size) 
                  {
                    echo('<div class="alert">
                            <span class="closebtn">×</span>  
                            Příliš velký soubor.
                          </div>'); 
                    continue; // Přeskočí velké soubory
                  }
                  elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) )
                  {
                    echo('<div class="alert">
                            <span class="closebtn">×</span>  
                            Špatný formát.
                          </div>'); 
                    continue; // Přeskočí nekorektní formáty
                  }
                  else
                  { 
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
                    {
                      $track = $path.$name;
                      $nahrano = TRUE;
                      $count++; 

                      $info = pathinfo($name);
                      $pripona = $info['extension'];
                      $jmeno = $info['filename'];

                      if($pripona == "DOC" || $pripona == "doc" ||$pripona == "RTF" || $pripona == "rtf")
                      {                                      
                        $comand2 = "soffice  --headless --convert-to docx --outdir soubory/ ".$track."";

                        exec($comand2);
                        unlink($track);

                        $pripona = "docx";
                        $track = $path.$jmeno.".".$pripona;
                      }

                      $nahraj= $db->query("INSERT INTO soubory(cesta, nazev, pripona, pars) 
                                           VALUES ('".$track."', '".$jmeno."', '".$pripona."', 'FALSE')");

                    }
                  }
                }
              }
            }

            if($nahrano == TRUE)
            {
              echo('<div class="alert">
                      <span class="closebtn">×</span>  
                      '.$count.'/'.$pocet.' souborů bylo nahráno.
                    </div>');
            }

            echo($footer);
          ?>

        </div>

      </div>

    </div>
    </div>


<?php
  echo($end);
?>
