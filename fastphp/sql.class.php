<?php
class sql
{
    public function connectsql($host,$user,$pwd,$dbname)
    {
        $con = mysqli_connect("$host","$user","$pwd");
	if (!$con)
	{
            die('Could not connect: ' . mysqli_connect_error());
	}
        mysqli_select_db($con,"$dbname");
	//echo "connect success!<br>";
	return $con;
    }
    
    public function querysql($sql,$con)
    {
        return $con->query("$sql");
    }
    
    public function loginindetify($tbmane,$con,$name,$email,$pwd)
    {
        $sql="select * from $tbname where name='$name' and email='$email' and password='$pwd'";
        return $con->query("$sql");
    }
    
    public function queryone($tbname,$dbname,$colname,$value)
    {
        $sql="select * from $tbname where name='$name' and email='$email' and password='$pwd'";
        return $dbname->query("$sql");
    }
}
