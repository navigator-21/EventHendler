<?
namespace Navigator;
class Application
{
   protected $dir_base = PATH_ROOT."/navigator/components/";
   protected $dir_local = PATH_ROOT."/local/components/";

   /**
    * @ array {*}
    */
   public function _constructor($arParams = [])
   {
      //code...
   }

   /**
 * @ sring $path "name.directoring:name.component"
   * @ string $template "name.template"
   * @ array $arParams [*]
   * @ string $flag 
   * ! return echo html
   */
   public function includeComponent($path = null, $templaite = null, $arParamsm = [], $flag = null)
   {
      $objPath = new class{};

      if ($arPath = explode(':', $path)) 
      {
         $objPath->nameSpasePath = trim($arPath[0]);
         $objPath->nameComponent = trim($arPath[1]);
      }       
      
      $dir_base = $this->dir_base.$objPath->nameSpasePath."/".$objPath->nameComponent."/";
      $dir_local = $this->dir_local.$objPath->nameSpasePath."/".$objPath->nameComponent."/";
           
      if(is_dir($dir_local))
      {        
         $objPath->componentPath = $dir_local;
         $objPath->templaitePath = !empty($templaite) ? $dir_local."templaite/".$templait."/": $dir_local."templaite/.default/"; 
      }
      else if(is_dir($dir_base))
      {        
         $objPath->componentPath = $dir_base;
         $objPath->templaitePath = !empty($templaite) ? $dir_base."templaite/".$templait."/": $dir_base."templaite/.default/";
      }
      else
      {      
         return   "None component!";
      }    
      
      $objPath->description = $objPath->componentPath.".description.php";
      $objPath->parameters =  $objPath->componentPath.".parameters.php";
      $objPath->class =  $objPath->componentPath."class.php";
      $objPath->ajax =  $objPath->componentPath."ajax.php";
      $objPath->script = $objPath->componentPath."script.php";
      $objPath->templates = new class($objPath)
      {   
         public function __construct($objPath)
         {           
            $this->parameter = $objPath->templaitePath.".parameters.php"; 
            $this->template = $objPath->templaitePath."template.php";
            $this->css = $objPath->templaitePath."css.php";
            $this->script = $objPath->templaitePath."script.php";
            $this->ajax = $objPath->templaitePath."ajax.php";          
         }                 
      };   
        
      
      prin($objPath);


      // foreach($objPath as $k=>$v){
      //    prin($objPath->{$k});
      //    //prin($v);
      // }




      
   }
}