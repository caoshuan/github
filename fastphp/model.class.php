<?php $i=7;echo "model test!"."<br>";
class model
{
    public function connectmodel($host,$user,$pwd,$dbname)
    {
        $con = mysqli_connect("$host","$user","$pwd");
	if (!$con)
	{
            die('Could not connect: ' . mysqli_connect_error());
	}
        mysqli_select_db($con,"$dbname");
	echo "connect success!<br>";
	return $con;
    }
    