<?php
session_start();
include_once("config.php");

if(!isset($_SESSION['administrator']))
{
    header("location: login.php");
}

$admin = new admincp;

include_once("../system/lib/user.php");

//if( ) $admin->user_id
if( isset($_GET['id']) && $_GET['id'] != null )
  {
    if( !in_array($user->permission,array("Administrator","Root")) )
    {
      $the_ID = $_GET['id'];
    }else{
      $the_ID = $admin->user_id;
    }
  }else{
    $the_ID = $admin->user_id;
  }


  //   header("location: index.php");
  // }else if( isset($_GET['id']) ) {
  //   $the_ID = $_GET['id'];
  // }else if( !isset($_GET['id']) ) {
  //   $the_ID = $admin->user_id;
  // }


$user = new the_user($the_ID);

     if(isset($_POST['update']))
    {
        $lvdf = NULL;
        switch ($user->permission)
        {
            case "Writter":
                $lvdf = 5 ;
                break;
            case "Uploader":
                $lvdf = 4;
                break;
            case "Member":
                $lvdf = 2 ;
                break;
            case "Premium Member":
                $lvdf = 3 ;
                break;

        };

        $id = $user->user_id;

        $update = new the_user($id,true);

        $update->display_name = $_POST['displayname'];
        $update->password = $_POST['password'];
        $update->permission = (isset($_POST['permission'])) ? $_POST['permission']: $lvdf;
        $update->location = $_POST['address'];
        $update->email = $_POST['email'];
        $update->avatar = $_POST['avatar'];

        $update->update();
        header("location: profile.php");

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tài khoản <?php echo $user->display_name ." - ". $blog->title ?></title>
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
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#20c997">
  <meta name="apple-mobile-web-app-title" content="Ani4VN">
  <meta name="application-name" content="Ani4VN">
  <meta name="msapplication-TileColor" content="#20c997">
  <meta name="msapplication-TileImage" content="/mstile-144x144.png">
  <meta name="theme-color" content="#20c997">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
 <?php include("nav-2.php") ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper ">
      <!-- partial:partials/_sidebar.html -->
        
        <?php include_once("navigation.php") ?>
        
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row card bg-white">
                <div class="card-header">
                    Thông tin người dùng
                </div>

                        <p class="text-white bg-danger p-3 rounded">Đăng nhập bằng Facebook sẽ có tài khoản là Email và Mật khẩu mặc định là ngẫu nhiên !</p>
                <div class="card-body row">
                    <div class="col-lg-3 row border-right" sstyle="border-right:1px solid rgba(0,0,0,.20)">
                        
                            <div class="col-4">
                              <img width="60px" height="60px" style="border-radius:100%" src="<?php echo $user->avatar ?>" alt="profile image">
                            </div>
                            <div class="col-8 pl-3">
                              <a href="profile.php"><p class="profile-name"><?php echo $user->display_name ?></p></a>
                              <div>
                                <small class="designation text-muted"><?php echo $user->permission ?></small>
                                <span class="status-indicator online"></span>
                              </div>
                                
                        
                            </div>
                        <p></p>
                        </div>                                
                        <div class="col-lg-9 pl-4">
                            
                            <?php                                 
                                if(!isset($_GET['edit']))
                                {
                            ?>
                            <div class="m-0 p-0">
                                <p class="text-success"><i class="mdi mdi-map-marker mr-2"></i>Address : <?php echo $user->location ?></p>
                                <p class="text-success"><i class="mdi mdi-email-outline mr-2"></i>E-Mail: <?php echo $user->email ?> </p>
                                
                            </div>
                            <div class="mb-2">
                                <a href="?edit"><button type="button" class="btn btn-danger btn-fw">
                                  <i class="mdi mdi-cloud-download"></i>Sửa thông tin người dùng</button></a>
                            </div>
                            
                            <?php }else{
                            ?>
                                <form method="post" >
                                    <div class="m-0 p-0">
                                        <p class="text-white bg-danger p-3 rounded">Sau khi bấm cập nhật vui lòng F5 lại trang để lấy dữ liệu mới</p>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-success">
                                                <span class="input-group-text bg-transparent  text-white">
                                                  <i class="mdi mdi-monitor mr-2"></i>Tên hiển thị :
                                                </span>
                                              </div>
                                            <input class="form-control" name="displayname" value="<?php echo $user->display_name ?>"/>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-success">
                                                <span class="input-group-text bg-transparent text-white">
                                                  <i class="mdi mdi-account-key mr-2"></i>Mật khẩu :
                                                </span>
                                              </div>
                                            <input class="form-control" name="password" type="password" value="<?php echo $user->password ?>" />
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-success">
                                                <span class="input-group-text bg-transparent text-white">
                                                  <i class="mdi mdi-email-outline mr-2"></i>E-mail :
                                                </span>
                                              </div>
                                            <input class="form-control" name="email" value="<?php echo $user->email ?>" />
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-success">
                                                <span class="input-group-text bg-transparent text-white">
                                                  <i class="mdi mdi-account-location mr-2"></i>Địa chỉ :
                                                </span>
                                              </div>
                                            <input class="form-control" name="address" value="<?php echo $user->location ?>" />
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-success">
                                                <span class="input-group-text bg-transparent text-white">
                                                  <i class="mdi mdi-emoticon-happy mr-2"></i>URL Avatar :
                                                </span>
                                              </div>
                                            <input class="form-control" name="avatar" value="<?php echo $user->avatar ?>" />
                                        </div>
                                       
                                    </div>
                                    <?php
                                          $lv = $user->permission;
                                          if( in_array($lv,array("Root","Administrator")) ){
                                      ?>
                                      <div class="input-group">
                                          <div class="input-group-prepend bg-success">
                                              <span class="input-group-text bg-transparent text-white">
                                                <i class="mdi mdi-shield-outline mr-2"></i>Quyền :
                                              </span>
                                            </div>
                                          <select name="permission" class="form-control">
                                              <option value="1">Member</option>
                                              <option value="3">Premium Member</option>
                                              <option value="4">Writter</option>
                                              <option value="5">Uploader</option>
                                              <option value="6" selected>Administrator</option>
                                          </select>
                                      </div>
                                      <?php  } ?>
                                      <hr>
                                     <div class="input-group">
                                            <button type="submit" name="update" class="btn btn-primary btn-fw"><i class="mdi mdi-cloud-upload"></i>Cập nhật thông tin</button>
                                        </div>
                                        
                                   
                                </form>
                            
                            <?php }?>
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