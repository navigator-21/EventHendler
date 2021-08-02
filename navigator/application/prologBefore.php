<?  
   define("PATH_ROOT",$_SERVER["DOCUMENT_ROOT"]); 

   include_once(PATH_ROOT . '/navigator/application/autoload.php');   
   include_once(PATH_ROOT . "/navigator/php_interface/includes/defined.php");
   include_once(PATH_ROOT . "/navigator/php_interface/includes/function.php");	      
   include_once(PATH_ROOT . "/navigator/php_interface/init.php");	      	      
   include_once(PATH_ROOT . "/local/php_interface/init.php");	
   include_once(PATH_ROOT . '/navigator/application/lib/application.php');

   $arParamsApplication = array();
   $APPLICATION = new Navigator\Application($arParamsApplication);
   
  
