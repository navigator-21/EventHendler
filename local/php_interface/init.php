<?

//============================== EVENTS =====================================

//Event registration
Navigator\Events::AddEventHandler( 'main','onBefore', 'Db', "connect", function($data){        
   $data["LOGIN"] = "Petruzhka";
   $data["PASSWORD"] ="nfjsr42s5f";            
   return $data;
});
Navigator\Events::AddEventHandler( 'main','onActive', 'Db', "connect", function(&$data){   
   $data["ID"]= 236;    
});
Navigator\Events::AddEventHandler( 'main','onAfter', 'Db', "connect", function(&$data){
   $data=[
       "RESULT"=>["Some data!!!"]
   ];    
   //return $data;
});