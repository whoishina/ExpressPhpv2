<?php

include_once("admin.inc.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản lý Fansub | <?php echo $blog->title ?></title>
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
                  <h4 class="card-title">Danh Sách Fansub</h4>
                   <form method="post" action="fansubs.php">
                       <?php
                            if(true){
                       ?>
                       <p>Thêm Fansub mới</p>
                       <div class="input-group my-2 rounded">
                           
                           <i class="mdi mdi-cube form-control col-2 text-danger"> Tên Fansub</i>
                            <input class="form-control" type="text" placeholder="Ani4VN tổng hợp" name="name" /> 
                       </div>
                       <div class="input-group my-2 rounded">
                           
                           <i class="mdi mdi-cube form-control col-2 text-danger"> Địa chỉ Facebook</i>
                            <input class="form-control" type="text" placeholder="https://facebook.com/Ani4VN" name="fburl" /> 
                       </div>
                       <div class="input-group my-2 rounded">
                           
                           <i class="mdi mdi-cube form-control col-2 text-danger"> Địa chỉ website</i>
                            <input class="form-control" type="text" placeholder="https://Ani4VN.com" name="ws" /> 
                       </div>
                       
                       <div class="input-group my-2 rounded">
                           <button class="btn btn-fw btn-primary btn-block" name="new">Tạo Fansub</button>
                       </div>
                       <?php } else{
                
            
                       ?>
                       <p>Sửa thông tin Fansub</p>
                       <input type='hidden' name="id" value="<?php echo $_GET['id'] ?>"/>
                       <div class="input-group my-2 rounded">
                           
                           <i class="mdi mdi-cube form-control col-2 text-danger"> Tên Fansub</i>
                            <input class="form-control" type="text" placeholder="Ani4VN tổng hợp" value="<?php echo $fs->name ?>" name="name" /> 
                       </div>
                       <div class="input-group my-2 rounded">
                           
                           <i class="mdi mdi-cube form-control col-2 text-danger"> Địa chỉ Facebook</i>
                            <input class="form-control" type="text" placeholder="https://facebook.com/ani4vn" value="<?php echo $fs->fburl ?> "name="fburl" /> 
                       </div>
                       <div class="input-group my-2 rounded">
                           
                           <i class="mdi mdi-cube form-control col-2 text-danger"> Địa chỉ website</i>
                            <input class="form-control" type="text" placeholder="https://ani4vn.com" value="<?php echo $fs->website ?>" name="ws" /> 
                       </div>
                       
                       <div class="input-group my-2 rounded">
                           <button class="btn btn-fw btn-primary btn-block" name="update">Cập nhật Fansub</button>
                       </div><?php }?>
                   </form>
                  <div class="table-responsive">
                    <?php
                      if(!isset($_GET['id'])){       
                      ?>
                      <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Tên Fansub</th>
                          <th>Số Anime</th>
                          <th>Mạng xã hội </th>
                        </tr>
                      </thead>
                      <tbody>
                          <form>
                          <!-- Begin Foreach -->
                      <?php foreach(DB::query("SELECT * FROM terms WHERE term_parent = 66") as $a => $i){ ?>


                        <tr>
                          <td>
                              <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input"> <a href="fansubs.php?id=<?php echo $i['term_id'] ?>"><?php echo $i['term_name'] ?></a>
                            <i class="input-helper"></i></label>
                          </div>
                              </td>
                          <td class="text-success"> <?= DB::query("SELECT COUNT(DISTINCT object_id) as count FROM episodes WHERE term_id = %i",$i['term_id'])[0]['count'] ?>
                          </td>
                          <td>
                            <a class="btn btn-outline-primary text-primary btn-primary" href="/anime/fansub/<?= $i['term_slug']?>" ><i class="mdi mdi-facebook"></i></a>
                            <a class="btn btn-outline-primary text-primary btn-primary" href="<?php echo $ani[4] ?>" ><i class="mdi mdi-firefox"></i></a>
                          </td>
                        </tr>
                        <?php }
                              ?>
                        </form>
                          <!-- ./ End Foreach -->
                      </tbody>
                    </table>
                      <?php }?>
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