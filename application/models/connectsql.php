<html>
<body>
<?php
    session_start();
    $_SESSION['remindmessage']="";
    if(empty($_SESSION["login"]))
    {
        header("Location:/login.php");
        exit; 
    }
    require HEART_PATH."sql.class.php";
    $title=$_POST['title'];
    $body =$_POST['body'];
    $arraytitle=array();
    $arraybody=array();
    $sql=new sql;
    $con=$sql->connectsql(DB_HOST,DB_USER,DB_PWD,DB_NAME);echo 11111;
    if(isset($_POST["create"]))
    {
        //查询数据库，若存在则返回提示信息
        $select="select * from articles where title='$title'";
        $selectresult=$sql->querysql($select,$con);
        if(!$selectresult) $_SESSION['remindmessage']="查询失败!";
        if(!mysqli_num_rows($selectresult)) 
        {
            $insert="insert into articles(title,body,user_id) values('$title','$body',2)";
            $insertresult=mysqli_query($con,$insert);
            if($insertresult) $_SESSION['remindmessage']="插入成功";
            else $_SESSION['remindmessage']="插入失败";
        }
        elseif(mysqli_num_rows($selectresult)) $_SESSION['remindmessage']="文章已经存在";
        header("location:/index1");
    }
    
    if(isset($_POST["search"]))
    {
        $select="select * from articles where title like'%$title%'";
        $selectresult=mysqli_query($con,$select);
        $i=0;
        if(mysqli_num_rows($selectresult))
        {
            while($rows=mysqli_fetch_assoc($selectresult))
            {
                    $body=$rows['body'];
                    $title=$rows['title'];
                    $arraytitle[$i]=$title;
                    $arraybody[$i]=$body;
                    $i++;
            }
            $_SESSION['body']=$arraybody;
            $_SESSION['title']=$arraytitle;
            $_SESSION['lenth']=$i;
            mysqli_close($con);
            header("location:/searchresult");
            exit;
        }
        $_SESSION['body']="not exist";
        $_SESSION['title']="not exist";
        $_SESSION['lenth']=$i;
        mysqli_close($con);
        header("location:/searchresult");
        exit;
    }
    
    if(isset($_POST['edit']))
    {
        $id=$_POST['id'];
        $update="update articles set title='$title',body='$body' where id='$id'";
        $updateresult=mysqli_query($con,$update);
        if(mysqli_affected_rows($con)>0)
        {
            $_SESSION['remindmessage']="更新成功";
        }
        else
        {
            $_SESSION['remindmessage']="更新失败";
        }
        header("location:/index1");
    }
    
    if(isset($_POST['delete']))
    {
        $id=$_POST['id'];
        $delete="delete from articles where id='$id'";
        $deleteresult=mysqli_query($con,$delete);
        if(mysqli_affected_rows($con)>0)
        {
            $_SESSION['remindmessage']="删除成功";
            header("location:/index1");
        }
        else
        {
           $_SESSION['remindmessage']="删除失败";
        }
    }
    mysqli_close($con);
?>
</body>
</html>
