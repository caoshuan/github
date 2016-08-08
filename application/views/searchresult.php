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
                        <a href="/index1"><i class="fa fa-desktop"></i>Management</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="/search"><i class="fa fa-search"></i>Search Articles</a>
                    </li>
                    <li>
                        <a href="/create"><i class="fa fa-qrcode"></i>New articles</a>
                    </li>
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
         <div id="page-wrapper" >
            <div id="page-inner">                           
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="background:url('/source/image3.jpg')">
                <div class="panel-heading" style="background:url('/source/image3.jpg')">search result</div>
                <div class="panel-body">
                    <?php
                    $lenth=$_SESSION['lenth'];
                    if(isset($_POST['index'])) 
                    {
                        $title=$_POST['tltle'];
                        $body=$_POST['body'];
                    }
                    if($lenth>0)
                    {
                        $title=$_SESSION['title'];
                        $body=$_SESSION['body'];
                    }
                    elseif(($lenth==0))
                    {
                        $title[0]=$_SESSION['title'];
                        $body[0]=$_SESSION['title'];
                        $lenth++;
                    }
                    echo '<form action="/home" method="POST" style="display: inline;">';
                    for($i=0;$i<$lenth;$i++)
                    {
                       
                        echo'
                            <br>
                            <input type="text" name="title" class="form-control" required="required"'."value='{$title[$i]}'".'>
                            <br>
                            <textarea name="body" rows="10" class="form-control" required="required" >'."$body[$i]".'</textarea>
                            <br>';      
                    }
                    echo '<button class="btn btn-lg btn-info" name="edit">return</button><br></form>'; 
                    ?>
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
 


