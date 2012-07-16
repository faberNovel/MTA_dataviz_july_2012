<?PHP
 // Define the path to file
 $file = 'img/faber_logo_blue.png';
 
 if(!file)
 {
     // File doesn't exist, output error
     die('file not found');
 }
 else
 {
     // Set headers
     header("Cache-Control: public");
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=$file");
     header("Content-Type: application/zip");
     header("Content-Transfer-Encoding: binary");
    
     // Read the file from disk
     readfile($file);
 }
 ?>