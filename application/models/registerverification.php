<?php
$nameErr = $emailErr = $confirmErr = $websiteErr = "";
$name = $email = $gender = $confirm = $password = "";
$flag=0;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["name"])) {
     $nameErr = "姓名是必填的";$flag=1;
   } else {
     $name = test_input($_POST["name"]);
     // 检查姓名是否包含字母和空白字符
     if (!preg_match("/^[a-zA-Z ]*$/",$name))
     {
       $nameErr = "只允许字母和空格";$flag=1; 
     }
   }
   
   if (empty($_POST["email"])) 
   {
     $emailErr = "电邮是必填的";$flag=1;
   } 
   else 
   {
     $email = test_input($_POST["email"]);
     // 检查电子邮件地址语法是否有效
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
     {
       $emailErr = "无效的 email 格式"; $flag=1;
     }
   }
  
   if (!isset($_POST["password"])) 
   {
	   $password = "";
   } 
   else 
   {
	   $password = $_POST["password"];
   }

   if (!isset($_POST["confirm"])) 
   {
	   $confirm = "";
   } 
   else 
   {
	   $confirm = $_POST["confirm"];
	   if($confirm!=$password)
	   {
                $confirmErr="两次密码不相同";$flag=1;
	   }
   }

    //检查输出格式没有错误则连接数据库检查输入
    if($flag==0)
    {
	$con = mysqli_connect("localhost","root","1");
	if (!$con)
	{
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($con,"my_db");
       //检查邮箱与用户名的唯一性
        $selectname="select * from login where name='$name'";
        $selectmail="select * from login where email='$email'";
        $queryresultmail=$con->query($selectmail);
        $queryresultname=$con->query($selectname);
        $checkname=mysqli_num_rows($queryresultname);
        $checkmail=mysqli_num_rows($queryresultmail);
        if($checkname||$checkmail)
        {
	    if($checkname) $nameErr="用户已存在!";
            if($checkmail) $emailErr="邮箱已存在";
        }
        else
	{
	    $sql="insert into login(name,email,password,id) values ('$name','$email','$password',2)";
	    if ($con->query("$sql"))
	    {
		echo "TABLE login created <br>";
	    }
	    else
	    {
		echo "Error creating table: " . mysqli_error($con);
	    }
	}
        mysqli_close($con);
    }
    
}

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<meta http-equiv="refresh" content="0.2;url=<?php echo "/register?nameErr=$nameErr & emailErr=$emailErr & confirmerr=$confirmErr "?>" >
