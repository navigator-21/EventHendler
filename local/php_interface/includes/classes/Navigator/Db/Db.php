<?
namespace Navigator\Db;


class Db 
{
    public $config = ["HOST"=>'localhost'];

    function connect($arParams = null) 
    { 
        $arParams = $this->config;
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
?>