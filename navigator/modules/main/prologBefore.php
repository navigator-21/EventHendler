<?   
   $includeFilesList = [
      $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/includes/defined.php',
      $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/functions.php',
      $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/includes/autoload.php',	
   ];
   foreach ($includeFilesList as $fileToInclude) {
      if (file_exists($fileToInclude)) {
         include_once($fileToInclude);
      }
   }
   require_once(PATH_ROOT."/local/php_interface/init.php");


?>