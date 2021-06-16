<?  


class Db 
{
    public $dbName = ["HOST"=>'localhost'];

    function connect($arParams = null) 
    { 

        $arParams = $this->dbName;
        echo "<pre>";print_r($arParams);echo "</pre>";

        echo "Start!"; 
        $result = Events::doEvent("main",'onBefore',__CLASS__, __FUNCTION__, $arParams);
        if($result) $arParams = $result;
        echo "<pre>";print_r($arParams);echo "</pre>";

        echo "Middle!";       
        $result = Events::doEvent("main",'onActive',__CLASS__, __FUNCTION__, $arParams);
        if($result) $arParams = $result;
        echo "<pre>";print_r($arParams);echo "</pre>";

        echo "End!";
        $result = Events::doEvent("main",'onAfter',__CLASS__, __FUNCTION__, $arParams);
        if($result) $arParams = $result;   
        echo "<pre>";print_r($arParams);echo "</pre>";
    }
}

//==============================================================================

//Event registration
Events::AddEventHandler( 'main','onBefore', 'Db', "connect", function(&$data){
        
    $data["LOGIN"] = "Petruzhka";
    $data["PASSWORD"] ="nfjsr42s5f";            
    //return $data;
});
Events::AddEventHandler( 'main','onActive', 'Db', "connect", function(&$data){   
    $data["ID"]= 236;
    //return $data;
});
Events::AddEventHandler( 'main','onAfter', 'Db', "connect", function(&$data){
    $data=[
        "RESULT"=>["Какието данные!!!"]
    ];    
    //return $data;
});

//==============================================================================

//Running functions
$db = new Db();
$db->connect();

   
?>