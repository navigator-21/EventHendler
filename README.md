# EventHendler
An example of creating events in a PHP executable

Это простой пример создания обработчика событий в исполняемых функций на PHP.

Колличество событий не ограничено. Однако в приведенном примере расмотрим только три базовых.
[
   "onBefore"=> "Before processing input parameters.",        
   "onActive"=>"After processing the input parameters just before executing the main code.",
   "onAfter" => "After executing all the code, before returning the parameters.",
]

Пример создания события в нутри исполняемого кода.
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


// если в передоваймой функции есть деректива return, то обработчик вернет значение 
$result = Events::doEvent("main",'onBefore',__CLASS__, __FUNCTION__, $arParams); // может возвращать значение
if($result) $arParams = $result; // Проверка на возвращение результата


Пример регестрации события: 

   1.) Через сылку на параметры (&):

         Events::AddEventHandler( 'main','onBefore', 'Db', "connect", function(&$data){        
            $data["LOGIN"] = "Petruzhka";
            $data["PASSWORD"] ="nfjsr42s5f";  
         });


   2.) Через return: 

         Events::AddEventHandler( 'main','onActive', 'Db', "connect", function($data){   
            $data["ID"]= 236;
            return $data;
         });

========================================================================================         