<?php

include "included.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cài đặt website - <?php echo bloginfo('title'); ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
  <?php include_once("nav-2.php") ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper ">
      <!-- partial:partials/_sidebar.html -->
        
        <?php include_once("navigation.php") ?>
        
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row card bg-white">
                <div class="card-body p-0">
                        <div class="pt-2">
               <div class="card-body mt-0 pt-0">
                  <h4 class="card-title">Cài đặt Website</h4>
                        <form method="get">
                            
                            <p class="text-success">Tên Website : </p>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo bloginfo('title'); ?>" name="title" />
                            </div>
                            
                            <p class="text-success">Mô tả Website : </p>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo bloginfo('description'); ?>" name="description" />
                            </div>
                            
                            <p class="text-success">Favicon: </p>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo bloginfo('favicon'); ?>" name="description" />
                            </div>
                            
                            <p class="text-success">Tài khoản  : </p>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="1">
                                Cho phép người dùng đăng ký
                              </label>
                            </div>
                            <p class="text-success">Số Anime trang chủ : </p>
                           <div class="form-group">
                                <input class="form-control" value="25" type="number" name="description" />
                            </div>
                            
                            <div class="form-group">
                                <select name="home" class="form-control">
                                    <option value="1" selected >Trang chủ</option>
                                    <option value="0"  >Bảo trì</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-info btn-block btn-fw btn-sm">Lưu</button>
                            </div>
                            
                        </form>
   
                </div>
                            
                        </div>
                </div>
                    
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>