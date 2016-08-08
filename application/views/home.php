<?php
session_start();
if(empty($_SESSION["login"]))
{
    header("Location:/login");
    exit; 
}
if(isset($_SESSION["login"])&&($_SESSION["id"]<7))
{
    header("Location:/index2");
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
                        <a class="active-menu" href="/home"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="/index1"><i class="fa fa-desktop"></i>Management</a>
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
        <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Homepage <small>please choose for following options</small>
                </h1>
            </div>
        </div> 
        <!-- /. ROW  -->


        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dashboard
                    </div>        

                    <div class="panel-body"> 
                        <a href="/index1" class="btn btn-lg btn-success col-xs-12">管理文章</a><br><br><br><br>

                        <a href="/search" class="btn btn-lg btn-success col-xs-12">文章查找</a><br><br><br><br>
                        <form method="post" action="/loginverification/m">
                            <button class="btn btn-lg btn-success col-xs-12" name="logout"> logout</button>
                        </form>
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