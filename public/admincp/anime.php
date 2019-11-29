<?php
require("admin.inc.php");
/**
* Get List Anime
**/
if( isset($_GET['s']) )
{
$listAnime = DB::query("SELECT DISTINCT *, (SELECT user_displayname FROM users WHERE user_id = posts.author_id) as author FROM posts WHERE post_title LIKE %ss OR post_content LIKE %ss ORDER BY post_id DESC LIMIT 15",$_GET['s'],$_GET['s']);
}else{
$listAnime = DB::query("SELECT DISTINCT *, (SELECT user_displayname FROM users WHERE user_id = posts.author_id) as author FROM posts ORDER BY post_id DESC LIMIT 15");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Anime | <?php echo $blog->title ?></title>
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
  <?php include_once("nav-2.php") ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper ">
      <!-- partial:partials/_sidebar.html -->

        <?php include_once("navigation.php") ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="card bg-white">
                <div class="card-header row m-0">
					<h4 class="card-title col-lg-2">Danh Sách Anime</h4>
					<form method="get" class="col-lg-10">
                       <div class="input-group ">
                           <span class="form-control col-3 col-lg-2">Tìm Kiếm Anime :</span>
                            <input class="form-control col-9 col-lg-10" type="text" value="" placeholder="Tên Anime..." name="s" />
                       </div>
                   </form>
				</div>
               <div class="card-body p-0">

                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Anime</th>
                          <th>Số Tập</th>
                          <th>Season</th>
                          <th>Tình trạng</th>
                          <th>Người Đăng</th>
                        </tr>
                      </thead>
                      <tbody>
                          <form>
                          <!-- Begin Foreach -->
                          <?php
                          foreach ($listAnime as $value) {
                          ?>
                          <tr>
                            <td><a href="<?php echo "edit-anime.php?anime={$value['post_name']}" ?>"><?php echo $value['post_title'] ?></a></td>
                            <td><?= DB::query("SELECT * FROM episodes WHERE object_id = %i ORDER BY episode_id DESC LIMIT 1" ,$value['post_id'])[0]['episode_title'] ?>/??</td>
                            <td></td>
                            <td></td>
                            <td><?php echo $value['author'] ?></td>
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
