<?  
    require_once($_SERVER["DOCUMENT_ROOT"]."/navigator/application/prologBefore.php");
    use Navigator\Db;

    //Running functions
    $db = new Db();
    $db->connect();

   $APPLICATION->includeComponent(
        "navigator:my.component",
        "",
        array(),            
    );
  