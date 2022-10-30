<!DOCTYPE html>
<html lang="en">
    <link rel="shortcut icon" href="../assets/icons/logo.png">k
<?php session_start() ?>
<?php 
    if (!isset($_SESSION['logged_in_lm']) && $_SESSION['user_id_lm'] != true) 
    {
        header("location: ../../login.php");
    } 
    include 'header.php';
?>
    <body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse py-5 px-1" style="overflow: hidden;">
    <div class="wrapper" >
        <?php include 'topbar.php' ?>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: calc(3rem + 1px);">
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body text-white">
            </div>
        </div>
        <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
        <!-- Content Header (Page header) -->
        
        <!-- /.content-header -->
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" >
            <?php 
                $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                include $page.'.php';
                ?>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
        <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body">
            <div id="delete_content"></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><b>&times;</b></span>
            </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height  modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fa fa-arrow-right"></span>
            </button>
            </div>
            <div class="modal-body">
            </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                    <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                    <img src="" alt="">
            </div>
        </div>
        </div>
        </div>
        <!-- /.content-wrapper -->
        
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        
        <!-- Main Footer -->
        <footer class="footer">
        <strong style="margin-left: 15px;">Copyright &copy; 2022 <a href="https://www.sourcecodester.com/" style="color:black;">Pic-SellPlanet.com</a>.</strong>
        All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
        
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <!-- Bootstrap -->
    <?php include 'footer.php' ?>
    </body>
</html>
