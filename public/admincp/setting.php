<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cài đặt hệ thống</title>
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
            <li class="breadcrumb-item active">Cài đặt hệ thống</li>
          </ol>

<!-- edit code trong đây !!!! -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Cài đặt hệ thông WB-Admin</h4>
              </div>
              <div class="card-body">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="name">Tiêu đề Website</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Tiêu đề website" >
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Mô tả website</span>
                  </div>
                  <textarea class="form-control" placeholder="Mô tả của website"></textarea>
                </div>
                <div class="input-group mb-2">
                  <input type="text" class="form-control" placeholder="Email của website" >
                  <div class="input-group-append">
                    <span class="input-group-text" id="email">@ani4vn.com</span>
                  </div>
                </div>                
                <div class="input-group mb-2">
                  <select class="custom-select" id="ssl">
                    <option selected value="1">http://</option>
                    <option value="2">https://</option>
                  </select>
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="ssl">Manga.Ani4Vn.com</label>
                  </div>
                </div>
                <div class="input-group form-check mb-2">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                  <label class="form-check-label" for="defaultCheck2">
                    Cho phép thành viên đăng kí
                  </label>
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="name">Favicon</span>
                  </div>
                  <input type="text" class="form-control" placeholder="" >
                </div>
                <hr>
                <a href="#" class="btn btn-primary btn-block">Lưu lại</a>
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
