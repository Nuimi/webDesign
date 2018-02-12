<?php
	class FileConversion
	{
		private $filename;

		public function __construct($filePath) 
		{
			$this->filename = $filePath;
		}

		private function read_pdf()
		{
			include('class.pdf2text.php');
			$a = new PDF2Text();
			$a->setFilename($this->filename); 
			$a->decodePDF();
			return $a->output(); 
		}

		private function read_docx()
		{
			$vypis = '';
			$obsah = '';

			$zip = zip_open($this->filename);

			if (!$zip || is_numeric($zip)) 
			{
				return false;
			}

    		while ($zip_entry = zip_read($zip)) 
    		{

        		if (zip_entry_open($zip, $zip_entry) == FALSE) 
        		{
        			continue;
        		}

        		if (zip_entry_name($zip_entry) != "word/document.xml") 
        		{
        			continue;
        		}

        		$obsah .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

        		zip_entry_close($zip_entry);
    		}

    		zip_close($zip);

	    

		    $obsah = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $obsah);
		    $obsah = str_replace('</w:r></w:p>', "\r\n", $obsah);
		    $obsah = str_replace('</w:t>', " ", $obsah);
		    $obsah = preg_replace('<wp:.*>', " ", $obsah);

		    $vypis = strip_tags($obsah);

    		return $vypis;
		}

		public function convertToText() 
		{

		    if(isset($this->filename) && !file_exists($this->filename)) 
		    {
		      return "Soubor neexistuje";
		    }

		    $fileArray = pathinfo($this->filename);
		    $file_ext  = $fileArray['extension'];
					     
		    switch ($file_ext) 
		    {
			   	case "docx": 
			    	return $this->read_docx();
			  	break;
					      
			  	case "DOCX": 
			   		return $this->read_docx();
			  	break;
				case "pdf": 
			    	return $this->read_pdf();
			  	break;
					      
			  	case "PDF": 
			   		return $this->read_pdf();
			  	break;  
			  	default:
			   	    return "Špatný typ souboru";
			  	break;
			}
		}
	}
?>