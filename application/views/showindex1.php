<?php require HEART_PATH."sql.class.php";
session_start();
if(!isset($_SESSION['page']))
{ $page=1;}
 if(isset($_GET['page'])) 
{
    $page=$_GET['page'];                     
}
if(empty($_GET['page'])) { $page=1;}
if(isset($_GET['homepage'])) { $page=1;}
if(isset($_GET['previous'])) {$page=$_GET['previous'];$page-=1; }
if(isset($_GET['next'])) {$page=$_GET['next'];echo $page."br";$page+=1;}
$error='';
class showtitle
{
    public function allresult()
    {
        $sql=new sql;
        $con=$sql->connectsql("localhost","root","1","my_db");
        $sqli="select * from articles";
        $allresult=$sql->querysql($sqli,$con);
        return $allresult;
    }
    public function selectpart($nowpages,$eachpagetitlenum)
    {
        $begin=($nowpages-1)*$eachpagetitlenum;
        $sql=new sql;
        $con=$sql->connectsql("localhost","root","1","my_db");
        $sqli="select * from articles limit $begin,$eachpagetitlenum";
        $selectresult=$sql->querysql($sqli,$con);
        return $selectresult;
    }
    public function comallpages($allresult,$eachpagetitlenum)
    {
        $titlenum=mysqli_num_rows($allresult);
        $allpages=ceil($titlenum/$eachpagetitlenum);
        return $allpages;
    }
    public function finalpage($page,$allpages)
    {
        if(isset($_GET['finalpage'])) {$page=$allpages;}
        return $page;
    }
}


