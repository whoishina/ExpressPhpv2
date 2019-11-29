<?php
include_once("admin.inc.php");
if( isset($_GET['action']) && $_GET['action'] === 'delete' )
{
  DB::delete('episodes','episode_id=%i',$_GET['id']);
  header("location: episodes.php?anime={$_GET['anime']}");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sửa Thông Tin Tập | <?php echo $blog->title ?></title>
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
            <?php if( true ){

              if(isset($_REQUEST['update']))
              {

              }

         ?>


                 <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../admin/anime.php">Danh Sách Anime</a></li>
            <li class="breadcrumb-item">
              <a href="../admin/edit-anime.php?id=<?php echo $_GET['pid'] ?>">
                <?php

                ?>
              </a>
            </li>
            <li class="breadcrumb-item"><a href="../admin/episodes.php?id=<?php echo $_GET['pid'] ?>">Danh Sách Tập</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa Thông Tin Tập</li>
            </ol>
          </nav>
                 <div>
                   <div class="card">
                     <div class="card-header">
                       <span >Thông tin cơ bản</span>
                     </div>
                     <div class="card-body">

                      <form method="get">
                        <input name="id" value="<?php echo $_GET['id'] ?>" type="hidden" />
                        <input name="pid" value="<?php echo $_GET['pid'] ?>" type="hidden" />
                        <input name="action" value="<?php echo $_GET['action'] ?>" type="hidden" />

                          <div class="row">
                            <div class="col-lg-9">

                            <div class="form-group">
                <label for="title" >Tên tập</label>
                              <input name="title" value="" placeholder="Đây là tập gì ?" class="form-control" />
                            </div>
                             <div class="form-group">
                <iframe src="../admin/upload.php" frameborder=0 width=100% height=70 ></iframe>

                            </div>
                            <div class="form-group">
                              <?php //print_r($ep) ?>
                <label for="server_fb" >URL Server Facebook</label>
                              <input name="server_fb" class="form-control url" value=""  placeholder="Link facebook !">

                            </div>

                            <div class="form-group" >
                            <label for="server_at" >URL server <a target="_blank" href="//catbox.moe">Catbox.moe</a> </label>
                              <input name="server_at" value="" placeholder="Server Catbox.moe" class="form-control" />
                            </div>
                            <div class="form-group">
                <label for="leech_data" >Leech AnimeTVN - AniVN</label>
                              <input name="leech_data" placeholder="Link này nhặt từ AnimeTVN hoặc AniVN.net " value="" class="form-control" />
                            </div>

                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                <button name="update" class="btn btn-fw btn-sm btn-block btn-primary"><i class="mdi mdi-cloud-upload" ></i>Cập nhật</button>
                              </div>
                            </div>
                          </div>

                      </form>
<form method="POST" class="forms"  enctype="multipart/form-data" >
<label>Upload Server Facebook Limmit 50mb</label>
<div class="row">
<input class="form-control col-lg-9" type="file" name="file" class="f">
<button class="xxx form-control col-lg-3 btn btn-primary" type="button">UPLOAD</button>
</div>
</form>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script type="text/javascript">
   $(document).ready(function () {

        $(".xxx").click(function (event) {

            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var form = $('.forms')[0];

            // Create an FormData object
            var data = new FormData(form);

            // disabled the submit button
            //$(".xxx").prop("disabled", true);

            $.ajax({
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                url: "../admin/upload.php",
                processData: false,
                contentType: false,
                success: function (data) {
                    $(".url").val("https://www.facebook.com/www.aniz.us.upload/videos/"+data+"/");
                }
            });

        });

    });
</script>
                     </div>
                   </div>

                 </div>

            <?php } ?>
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
