<?
function wordEndings($num=1, $words){
	if ($num < 0) $num = (-1) * $num;
   $num = $num % 100;
   if ($num > 19) {
	  $num = $num % 10;
   }
   switch ($num) {
	  case 1: {
			return($words[0]);
	  }
	  case 2: case 3: case 4: {
			return($words[1]);
	  }
	  default: {
			return($words[2]);
	  }
   }
}	

function prin ($arParam = "")
{
   echo '<div style="font-size: 15px; color:#000;">';
   if(empty($arParam)){
      echo '<div style="color:red;">';
      echo "NULL";
      echo "</div>";
      return;
   }
   if(is_array($arParam) || is_object($arParam))
   {					
      echo '<div style=""><pre>';
      print_r($arParam);
      echo "</pre></div>";
   }else {
      echo '<div style="color:blue;"><pre>';
      var_dump($arParam);
      echo "</pre></div>";
   }	
   echo "</div>";

}