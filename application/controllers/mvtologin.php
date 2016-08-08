<?php 
require APP_PATH."fastphp/controllers.class.php";  
class controller extends controllers
{
    public function showview($name)
    {
        $s=new controller;
        $s->requireview($name);
    }
     public function welcome()
    {
 	require VIEW_PATH.'welcome.php';
    }
     
    public function connectsql()
    {
        
 	require MODEL_PATH.'connectsql.php';
    }
     public function registerverification()
    {
       
 	require MODEL_PATH.'registerverification.php';
    }
    public function loginverification()
    {
        
 	require MODEL_PATH.'loginverification.php';
    }
}
