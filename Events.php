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