<?  

class Events 
{

    static public $arEventsList = array(
        "onBefore"=> "Before processing input parameters.",        
        "onActive"=>"After processing the input parameters just before executing the main code.",
        "onAfter" => "After executing all the code, before returning the parameters.",
    );

    static public $arEvents = array();

    //Registers events (callback functions).
    static function AddEventHandler($module, $event,$class,$method, $fun)
    {
        $classOn = mb_convert_case(trim($class), MB_CASE_TITLE, 'UTF-8');
        $methodOn = mb_convert_case(trim($method), MB_CASE_TITLE, 'UTF-8');        
        self::$arEvents[trim($module)][trim($event).$classOn.$methodOn] = $fun;       
    }

    //Handles events
    static function doEvent($module, $event, $class,$method, array &$data = null)
    {       
        $eventsMod = self::$arEvents[trim($module)];
        $doEvent = trim($event);
        $doClass = mb_convert_case(trim($class), MB_CASE_TITLE, 'UTF-8');
        $doMethod = mb_convert_case(trim($method), MB_CASE_TITLE, 'UTF-8');
        $strEvent = $doEvent.$doClass.$doMethod; 
        
        foreach ($eventsMod as $k=>$f)
        {               
            if ($strEvent == $k)
            {
                if (!is_callable ($f))
                {
                    throw new Exception("The callback function is not callable!"); 
                }                    
                //$result = call_user_func($fun, $data);
                $result =$f($data);
                if (isset($result))return $result;                
            }
        }
    }
}

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