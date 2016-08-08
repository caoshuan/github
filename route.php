<?php 
class routes
{
    
    function runroute()
    {
        $url=$_SERVER['REQUEST_URI'];
        $urlArray = explode('/', $url);
    
        
        if(($urlArray[0]==NULL)&&($urlArray[1]==NULL)) 
        {
            require("application/controllers/mvtologin.php");
            $login=new controller;
            $login->welcome();
        }
        //show view without solve logical problems
        if(($urlArray[2]==NULL)&&($urlArray[1]!='loginverification/m')&&($urlArray[1]!='registerverification/m'))
        {
            $name=$urlArray[1];
            if(preg_match("/.+\?.+/",$urlArray[1]))
            {
                $urlwithnum=explode('?', $urlArray[1]);
                $name=$urlwithnum[0];
                
            }
            require("application/controllers/mvtologin.php");
            $newclass=new controller;
            $newclass->showview($name);
           
        }
       
        if($url=='/loginverification/m')
        {
            require ("application/models/loginverification.php");
            $login=new controller;
            $login->loginverification();
            
        }
      
        if($url=='/registerverification/m')
        {
            require ("application/models/registerverification.php");
            $login=new controller;
            $login->registerverification();
            
        }
        if($url=='/connectsql/m')
        {
            require ("application/models/connectsql.php");
            $login=new controller;
            $login->connectsql();
        }
         if($url=='/index1')
        {
            require("application/controllers/mvtologin.php");
            $login=new login;
            $login->requireindex1();
        }
       
       
    }
}