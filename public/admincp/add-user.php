<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thêm thành viên mới</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>

  <body id="page-top">
       <!-- Navbar -->
      <?php include 'navbar.php';?>
    <div id="wrapper">

      <!-- Sidebar -->
      <?php include 'sidebar.php';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Thêm thành viên mới</li>
          </ol>

<!-- edit code trong đây !!!! -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Thông tin thành viên</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-9">
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Tên thành viên</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Tên của thành viên" >
                    </div>
                    
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Tên khác</span>
                      </div>
                      <input type="text" class="form-control" name="another_title" placeholder="Tên khác của thành viên">
                    </div>  
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">https://manga.ani4vn.com/user/</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Cài đặt đường dẫn cho thành viên">
                    </div>
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input">
                        <label class="custom-file-label">Chọn ảnh bìa của thành viên tỉ lệ 1x1</label>
                      </div>
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Tải lên</button>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <span>Chọn thể loại yêu thích của thành viên:</span>
                      <div class="row m-0">
                        <div class="form-check col-lg-2">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label">
                            Hành động
                          </label>
                        </div>
                        <div class="form-check col-lg-2">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label">
                            Hành động
                          </label>
                        </div>
                        <div class="form-check col-lg-2">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label">
                            Hành động
                          </label>
                        </div>
                        <div class="form-check col-lg-2">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label">
                            Hành động
                          </label>
                        </div>
                        <div class="form-check col-lg-2">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label">
                            Hành động
                          </label>
                        </div>
                        <div class="form-check col-lg-2">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label">
                            Hành động
                          </label>
                        </div>
                        <div class="form-check col-lg-2">
                          <input class="form-check-input" type="checkbox" value="">
                          <label class="form-check-label">
                            Hành động
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Giới thiệu thành viên</span>
                      </div>
                      <textarea class="form-control" placeholder="Nội dung tóm tắt tiểu sử thành viên."></textarea>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <img src="/wb-admin/images/404.png" width="100%">
                    <a href="#" class="btn btn-primary btn-sm btn-block">Lưu lại</a>
                  </div>
                </div>
              </div>
            </div>
<!-- edit code trong đây !!!! -->

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Manga.Ani4VN.com 2019</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng để rời đi?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên hiện tại của mình.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
            <a class="btn btn-primary" href="/?logout">Đăng xuất !</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </body>

</html>
