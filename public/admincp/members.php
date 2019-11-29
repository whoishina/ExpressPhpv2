<?php
include_once("admin.inc.php");
                           
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản lý Thành viên | <?php echo $blog->title ?></title>
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
                  <h4 class="card-title">Danh Sách Member</h4>

                  <div class="table-responsive">
                    
                      <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Tên hiển thị</th>
                          <th>Tên đăng nhập</th> 
                          <th>Email</th>
                          <th>Quyền</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form method="get" >
                               <div class="input-group ">
                                   <span class="form-control col-3 col-lg-2">Tìm Kiếm Thành Viên :</span>
                                    <input class="form-control col-9 col-lg-10" type="text" value="<?php echo $_GET['s'] ?>" placeholder="Tên Đăng Nhập..." name="s" /> 
                               </div>
                           </form>
                          <form>

                          <!-- Begin Foreach -->
                        <?php
                          $data = DB::query("SELECT * FROM users");
                          foreach ($data as $key => $value) 
                          {

                        ?>
                        <tr>
                          <td>
                              <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
                              <img src="<?= $value['user_avatar'] ?>">
                                <a href="../admin/profile.php?edit&id=<?= $value['user_id'] ?>">
                                <?= $value['user_displayname'] ?>
                                </a>
                            <i class="input-helper"></i></label>
                          </div>
                          </td>
                          <td class="text-success">
                            <?= $value['user_login'] ?>
                          </td>
                          <td class="text-success">
                              <?= $value['user_email'] ?>
                          </td>
                          <td>
                              <?php switch ($value['user_lv']) {                                
                                case 0  :
                                  echo "Banned";
                                  break;
                                case 1  :
                                  echo "Register ";
                                  break;
                                case 2  :
                                  echo "Premium Account ";
                                  break;

                                case 3  :
                                  echo "Premium Account";
                                  break;
                                case 5  :
                                  echo "Uploader & Fixer";
                                  break;
                                case 4  :
                                  echo "Writter & Fixer";
                                  break;
                                case 6  :
                                  echo "Administrator";
                                  break;
                                case 9 :
                                  echo "Administrator ";
                                  break;
                                case 10 :
                                  echo "Root User ";
                                  break;
                              } ?>
                          </td>
                        </tr>
                      <?php } ?>
                        </form>
                          <!-- ./ End Foreach -->
                      </tbody>
                    </table>
                  </div>
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