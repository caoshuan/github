<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php
require APP_PATH."fastphp/sql.class.php";
$sql=new sql;
//开始会话
session_start();

//logout实现
if(isset($_POST["logout"])) 
{   	 
    unset($_session["login"]);
    session_unset();
    session_destroy();
    header("location:/login");
    exit;
}
//验证码
$str=$_SESSION["codes"]; 
session_unset();
session_destroy();

//验证规则
$nameErr = $emailErr = $codesErr = $passwordErr = "";
$name = $email = $codes = $comment = $password = "";
$flag=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "姓名是必填的";$flag=1;
   } else {
     $name = test_input($_POST["name"]);
     // 检查姓名是否包含字母和空白字符
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "只允许字母和空格"; $flag=1;
     }
   }

   if (empty($_POST["email"])) {
     $emailErr = "电邮是必填的";$flag=1;
   } else {
     $email = test_input($_POST["email"]);
     // 检查电子邮件地址语法是否有效
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailErr = "无效的 email 格式"; $flag=1;
     }
   }
   
    if (empty($_POST["password"]))
    {
     	$passwordErr="密码是必填的";$flag=1;
    } 
    else 
    {
     	$password = $_POST["password"];
    }
   
   if (empty($_POST["codes"])) {
     $codesErr = "验证码是必填的";$flag=1;
   } 
   else 
   {
     $codes = test_input($_POST["codes"]);
     if($codes!=$str)
     {
	$codesErr = "验证码输入错误";$flag=1;
     }
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
echo DB_HOST;
if($flag==0)
{
        $con=$sql->connectsql(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        $pasword=$_POST["password"];
	$select="select * from login where name='$name' and email='$email' and password='$password'";
        $fetchid=$selresults=$sql->querysql($select,$con);
        echo DB_HOST;
        if (mysqli_num_rows($selresults))
	{
            $array=mysqli_fetch_row($fetchid);
            $id=$array[3];
            echo $password;
            echo "11111111111";
	    session_start();//开启session
    	    $_SESSION["login"] = $_POST["name"];//将登录名保存到session中
            $_SESSION["id"]=$id;
	    header("Location:/home");
	    exit();
	}
        else
        {
	    $nameErr="用户不存在或密码邮箱错误";
	}
        mysqli_close($con);  
}
header("Location:/login?nameErr=$nameErr & emailErr=$emailErr & codesErr=$codesErr");
?>
</script>  
</body>
</html>
