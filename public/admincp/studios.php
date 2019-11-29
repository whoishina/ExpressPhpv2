<?php
session_start();
include_once("config.php");

if(!isset($_SESSION['administrator']))
{
    header("location: login.php");
}

$admin = new admincp;

include_once("../system/lib/user.php");

$user = new the_user($admin->user_id);

if(!in_array($user->permission,array("Writter","Uploader","Administrator","Root"))) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Studio | <?php echo $blog->title ?></title>
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
  <?php include("nav-2.php") ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper ">
      <!-- partial:partials/_sidebar.html -->
        
        <?php include_once("navigation.php") ?>
        
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="bg-white col-12">
                    <div class="row">
                        <div class="card col-lg-12  mt-2">
                            <div class="card-header bg-dark ">
                                <h3 class="card-title p-0 text-white">Thêm Thể Loại</h3>
                               
                            </div>
                            <div class="card-body m-0">
                                <form method="POST">
                                    <div class="input-group">
                                        <span class="form-control bg-dark text-white mb-2 col-2">Thể Loại</span>
                                        <input name="name_cat" type="text" class="form-control mb-2 col-10" placeholder="Tên hiển thị Thể loại tại bài đăng ( VD: Dâm dục)">
                                    </div>
                                    <div class="input-group">
                                        <span class="form-control bg-dark text-white  mb-2 col-2">Slug { Đường dẫn }</span>
                                        <input name="slug_cat" type="text" class="form-control mb-2 col-10" placeholder="https://aniz.us/the-loai/Con-cac-cha-ba">
                                    </div>
                                    <div class="input-group">
                                        <span class="form-control bg-dark text-white mb-2 col-2">Mô tả</span>
                                        <input name="des_cat" type="text" class="form-control mb-2 col-10" placeholder="ví dụ: ĐCS là ĐẢng công sản">
                                    </div>
                                    <div class="input-group p-0 m-0">
                                        <button class="btn btn-primary btn-block" type="submit" name="submit_cat">Tạo Tags</button>
                                    </div>
                                </form>
                            </div>
                        </div>                    
                    </div>
                    
                    <hr/>
                    <div class="row">
                               
                                <div class="card col-lg-12">
                                    <div class="card-header bg-dark">
                                        <h3 class="card-title text-light">KOGA Fansub</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-striped table-valign-middle col-12">
                                            <thead>
                                                <tr>
                                                    <th>Tên Tập  </th>
                                                    <th>Người Đăng</th>
                                                    <th>Fansub</th>
                                                    <th>Công cụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                <td>
                                                Kantai Collection: KanColle [BD] </td>
                                                <td>1</td>
                                                <td>
                                                KOGA Fansub </td>
                                                <td>
                                                <a href="edit-episode.php?action=edit&amp;post_id=4651&amp;episode=95126&amp;fansub=1" ới="" class="text-muted ml-1"><button class=" btn btn-primary btn-sm"><i class="mdi mdi-pen mr-2"></i>Edit</button></a>
                                                <a href="edit-episode.php?action=del&amp;episode=&amp;fansub=1&amp;post_id=4651&amp;episode=95126" class="text-muted ml-1"><button class=" btn btn-primary btn-sm"><i class="mdi mdi-cube mr-2"></i>Xóa</button></a>
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="edit-episode.php?action=add&amp;post_id=4651&amp;fansub=15" class="btn w-90 btn-primary m-2 text-white"><i class="mdi mdi-plus"></i> Thêm tập mới cho fansub này</a>
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