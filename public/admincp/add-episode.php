<?php

include_once("admin.inc.php");
if(isset($_GET['update'])&& isset($_GET['anime']) && isset($_GET['fs']))
{

  $anime = DB::query("SELECT post_id FROM posts WHERE post_name = %s",$_GET['anime'])[0]['post_id'];
  DB::insert('episodes',[
    'episode_title' => $_GET['title'],
    'episode_name' => strtolower($_GET['title']),
    'sources'=> '{"sources":{"animetvn":"'.$_GET['animetvn'].'","facebook":"'.$_GET['server_fb'].'","catbox":"'.$_GET['catbox'].'","iframe":"'.$_GET['iframe'].'"},"thumbnail":"'.$_GET['thumbnail'].'"}',
    'object_id' => $anime,
    'author_id' => $user->user_id,
    'episode_date' => date("Y-m-d"),
    'episode_modify' => date("Y-m-d H:i:s"),
    'term_id' => $_GET['fs'],
    'views'=>1
  ]);

  DB::update('posts',[
    'post_modify' => date("Y-m-d")
  ], 'post_id=%i',$anime);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Thêm Tập Mới | <?php echo $blog->title ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/player.css">
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

              <?php
               ?>
                    <nav aria-label="breadcrumb" >
                      <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="../admin/anime.php">Danh Sách Anime</a></li>
                      <li class="breadcrumb-item">
                        <a href="../admin/edit-anime.php?anime=<?= $_GET['anime'] ?>" >
                          <?= DB::query("SELECT post_title FROM posts WHERE post_name = %s",$_GET['anime'])[0]['post_title']; ?>
                        </a>
                      </li>
                      <li class="breadcrumb-item"><a href="../admin/episodes.php?anime=<?php echo $_GET['id'] ?>">Danh Sách Tập</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Thêm Tập Mới</li>
                      </ol>
                    </nav>
                    <div class="card">
                      <div class="card-header">
                        <span>Thông tin cơ bản</span>
                      </div>
                    <div class="card-body">

                      <form method="get">
                        <input name="anime" value="<?php echo $_GET['anime'] ?>" type="hidden" />
                        <input name="fs" value="<?php echo $_GET['fs'] ?>" type="hidden" />
                          <div class="row">
                            <div class="col-lg-8">

                            <div class="form-group">
                <label for="title" >Tên tập</label>
                <input name="title" placeholder="Đây là tập gì ?" class="form-control" />

                            </div>
                            <div class="form-group">
                              <label>Upload Server Facebook</label>
                              <iframe src="../admin/upload.php" frameborder="0" width="100%" height="70"></iframe>
                            </div>
                            <div class="form-group">
                              <?php //print_r($ep) ?>
                              <label for="server_fb" >URL Server Facebook </label>
                              <input name="server_fb" class="form-control url" value="https://www.facebook.com/www.aniz.us.upload/videos/"  placeholder="Link video facebook">
                            </div>
                            <div class="form-group" >
                              <label for="catbox" >URL server <a target="_blank" href="//catbox.moe">Catbox.moe</a> </label>
                              <input name="catbox" placeholder="Link Video Server Catbox.moe" class="form-control" />
                            </div>
                            <p>Lưu ý : Khi mới upload xong và thêm tập thì sẽ mất vài phút để sever xử lý video !</p>

                            <div class="form-group">
                <label for="leech_data" >Leech AnimeTVN - AniVN</label>
                              <input name="animetvn" placeholder="Link này nhặt từ AnimeTVN hoặc AniVN.net "class="form-control" />
                            </div>
                            <div class="form-group" >
                <label for="leech_data" >Ảnh Thumbnail</label>
                              <input name="thumbnail" placeholder="Link này nhặt từ AnimeTVN hoặc AniVN.net "class="form-control" />
                            </div>
                            <div class="form-group" >
                                <label for="iframe" >iframe</label>
                              <input name="iframe" placeholder="Đây là iframe code của một số nơi upload như là openload,hydrax,..."class="form-control" />
                            </div>

                            </div>
                            <div class="col-lg-4 text-center">
                              <span>Hướng dẫn UPLOAD</span>

                <video controls>
                  <source src="https://files.catbox.moe/vlzonb.mp4" type="video/mp4">
                </video>

                <div class="form-group mt-2">
                                <button name="update" class="btn btn-fw btn-sm btn-block btn-primary"><i class="mdi mdi-cloud-upload" ></i>Thêm Tập</button>
                              </div>
                            </div>
                          </div>

                      </form></div>
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
  <script src="js/player.js"></script>
<script>plyr.setup();</script>
  <!-- End custom js for this page-->
</body>

</html>
