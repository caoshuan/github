<?php
session_start();
if(empty($_SESSION["login"]))
{
    header("Location:/login");
    exit; 
}
?>
<!DOCTYPE html>
<?php require HEART_PATH."head.class.php";?>
<!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="/home"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="/index2"><i class="fa fa-desktop"></i>index2</a>
                    </li>
                    <li>
                        <a href="/search"><i class="fa fa-search"></i>Search Articles</a>
                    </li>
                    <li>
                        <a href="/create"><i class="fa fa-qrcode"></i>New articles</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
         <div id="page-wrapper" >
            <div id="page-inner" style="background:url('/source/image4.jpg')">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="panel panel-default" style="background:url('/source/image3.jpg')">
                            <div class="panel-heading" style="background:url('/source/image3.jpg')">文章管理</div>
                            <div class="panel-body" >
                                <strong>
                                <div class="row">
                                    <div class="col-md-10"><a href="/create" class="btn btn-lg btn-primary">发表文章</a></div>
                                    <div class="col-md-1 "><a href="/loginverification/m"  class="btn btn-lg btn-info" style="margin-right:0px" name="logout">logout</a></div>
                                </div>
                                <p><font color="red" size="5"><?php echo $_SESSION['remindmessage'];?></font></p>
                                <?php
                                $eachpagetitlenum=4;
                                require(VIEW_PATH.'showindex1.php');

                                $s=new showtitle;
                                $allresult=$s->allresult();
                                $allpages=$s->comallpages($allresult,$eachpagetitlenum);
                                if(($page>$allpages)||($page<1)) {$page=1;$error='不存在页面';}
                                $page=$s->finalpage($page,$allpages);
                                $selectresult=$s->selectpart($page,$eachpagetitlenum);                   
                                echo $allpages."page<br>";

                                if(mysqli_num_rows($selectresult)&&(($page<$allpages)||($page==$allpages))) 
                                {
                                    $len=0;
                                    while($rows=mysqli_fetch_assoc($selectresult)) 
                                    {
                                        $title=$rows['title'];
                                        $body=$rows['body'];
                                        $id=$rows['id'];
                                        echo'            
                                        <hr>
                                        <div class="article">
                                            <h4>标题:'.$title.'</h4>
                                            <div class="content">
                                                <p>
                                                    内容:'.$body.'
                                                </p>
                                                <p>
                                                    id:'.$id.'
                                                </p>
                                            </div>
                                        </div>

                                        <form action="/edit" method="POST" style="display: inline;">
                                        <input type=hidden  name="title" '."value='{$title}'".'>
                                        <input type=hidden  name="body" '."value='{$body}'".'>
                                        <input type=hidden  name="id"   '."value='{$id}'".'>
                                         <input type=hidden  name="to_url"   value="/index2">
                                        <input type=hidden  name="button_name" value="return">
                                            <button type="submit" class="btn btn-info" name="index2">查看</button>
                                        </form>';

                                    }
                                }
                                else $allpages=1;
                                mysqli_close($con);

                                ?>
                                <br/><br/>
                                <div class="article">
                                <center>
                                <form method="get" action="/index2" style="display: inline;">
                                    <button type="submit" class="btn btn-danger" name="homepage" >homepage</button>
                                </form>
                                <?php
                                if($page!=1) 
                                {
                                    echo'<form method="get" action="/index1" style="display: inline;">
                                            <input type="hidden" name="previous" value="'.$page.'">
                                            <button type="submit" class="btn btn-danger"><<</button>
                                         </form>';
                                }
                                ?>
                                <form method="get" action="/index2" style="display: inline;">
                                    页码:
                                    <input type=text  name="page" style="width: 60px">共<?php echo $allpages?>页
                                    <button type="submit" class="btn btn-danger" >go</button>
                                </form>
                                <?php
                                if($page!=$allpages)
                                echo '<form method="get" action="/index2" style="display: inline;">
                                    <input type="hidden" name="next" value="'.$page.'">
                                    <button type="submit" class="btn btn-danger">>></button>
                                </form>';
                                $_SESSION['page']=$page;
                                ?>
                                <form method="get" action="/index2" style="display: inline;">
                                    <button type="submit" class="btn btn-danger" name="finalpage" >finalpage</button>
                                </form>
                                <p style="color:red;font-size:24px;" ><?php echo"$error";?></p>
                                <p style="color:black;font-size:24px;" >当前页码:<?php echo $page;?></p>
                                </center>
                                </div>
                                </strong>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>  
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
     <script src="assets/js/jquery-1.10.2.js"></script>
                                                                    
     <!-- Bootstrap Js -->                                                                   
     <script src="assets/js/bootstrap.min.js"></script>                                                                   
     <!-- Metis Menu Js -->                                                                   
     <script src="assets/js/jquery.metisMenu.js"></script>                                                                   
     <!-- Morris Chart Js -->                                                                   
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>                                                                   
     <script src="assets/js/morris/morris.js"></script>
                                                                    
     <script src="assets/js/easypiechart.js"></script>                                                                    
     <script src="assets/js/easypiechart-data.js"></script>	                                                                 
     <!-- Custom Js -->                                                               
     <script src="assets/js/custom-scripts.js"></script>                                                                  
</body>                                                               
</html>   
</html>
