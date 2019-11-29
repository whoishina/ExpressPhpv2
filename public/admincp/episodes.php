<?php
include_once("admin.inc.php");

$fs = DB::query("SELECT DISTINCT episodes.term_id, terms.term_name,terms.term_id FROM `episodes` INNER JOIN terms ON `terms`.`term_id` = `episodes`.`term_id` JOIN `posts` ON `posts`.`post_id` = `episodes`.`object_id` WHERE `posts`.`post_name` = %s",$_GET['anime']);
$list = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Danh Sách Tập| <?php echo $blog->title ?></title>
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
          <nav aria-label="breadcrumb" class="col-lg-8">
            <ol class="breadcrumb" >
            <li class="breadcrumb-item"><a href="../admin/anime.php">Danh Sách Anime</a></li>
            <li class="breadcrumb-item">
              <a href="../admin/edit-anime.php?id=<?= $_GET['anime'] ?>" >
                <?= DB::query("SELECT post_title FROM posts WHERE post_name = %s",$_GET['anime'])[0]['post_title']; ?>
              </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Danh Sách Tập</li>
            </ol>
          </nav>
                        <form method="get" action="add-episode.php" class="col-lg-4">
                            <div class="input-group mb-2">
                                <input type="hidden" name="anime" value="<?php echo $_GET['anime'] ?>">
                                <select name="fs" class="form-control col-8">
                                        <?php foreach(DB::query("SELECT * FROM terms WHERE term_parent = 66") as $a => $i){ ?>
                                            <option value="<?php echo $i['term_id'] ?>"><?php echo $i['term_name'] ?></option>
                                        <?php } ?>
                                </select>
                                <button class="btn btn-info form-control col-4">Thêm Fansub</button>
                            </div>
                        </form>
                    </div>

                    <?php

                        foreach($fs as $item => $article)
                        {
                        ?>
<!-- Begin Fansub -->
                                <div class="card">
                                    <div class="card-header">
                                      <div class="row">
                                        <h3 class="col-8"><?php echo $article['term_name'] ?></h3>
                                        <a href="add-episode.php?fs=<?= $article['term_id'] ?>&anime=<?= $_GET['anime'] ?>" class="btn col-4 btn-primary"><i class="mdi mdi-plus"></i> Thêm tập mới cho fansub này</a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tiêu đề</th>
                                                    <th>Người Đăng</th>
                                                    <th>Lượt Xem</th>
                                                    <th>Công cụ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                          <?php
                                          $items = DB::query("SELECT * FROM `episodes` INNER JOIN terms ON `terms`.`term_id` = `episodes`.`term_id` JOIN `posts` ON `posts`.`post_id` = `episodes`.`object_id` WHERE `posts`.`post_name` = %s AND terms.term_id = %i",$_GET['anime'],$article['term_id']);

                                          foreach ($items as $item =>$key) { ?>
                                                <tr>
                                                  <td><?php echo $key['episode_title'] ?></td>
                                                  <td><?php echo DB::query("SELECT user_displayname FROM users WHERE user_id = %i",$key['author_id'])[0]['user_displayname'] ?></td>
                                                  <td><?php echo $key['views'] ?></td>
                                                  <td>
                                                    <a href="edit-episode.php?action=edit&id=<?php echo $key['episode_id'] ?>" class="ml-1 btn btn-primary btn-sm"><i class="mdi mdi-pen mr-2"></i>Sửa</a>
                                                    <a href="edit-episode.php?action=delete&id=<?php echo $key['episode_id'] ?>&anime=<?= $_GET['anime'] ?>" class=" ml-1 btn btn-primary btn-sm"><i class="mdi mdi-cube mr-2"></i>Xóa</a>
                                                  </td>
                                                </tr>
<?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
<!-- ./ End Fansub -->
<?php

}

 ?>


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
