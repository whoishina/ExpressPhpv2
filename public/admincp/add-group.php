<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thêm nhóm dịch mới</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Include Quill stylesheet -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />
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
            <li class="breadcrumb-item active">Thêm nhóm dịch mới</li>
          </ol>

<!-- edit code trong đây !!!! -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Thông tin nhóm</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-9">
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Tên nhóm</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Tên của nhóm" >
                    </div>
                    
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Tên khác</span>
                      </div>
                      <input type="text" class="form-control" name="another_title" placeholder="Tên khác của nhóm">
                    </div>  
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">https://manga.ani4vn.com/group/</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Cài đặt đường dẫn cho nhóm">
                    </div>
                    <div class="w-100 mb-3">
                      <div id="standalone-container">
                        <div id="toolbar-container" style="border-radius: .2rem .2rem 0 0;background-color: #e9ecef;">
                          <span class="ql-formats">
                            <select class="ql-font"></select>
                            <select class="ql-size"></select>
                          </span>
                          <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button>
                          </span>
                          <span class="ql-formats">
                            <select class="ql-color"></select>
                            <select class="ql-background"></select>
                          </span>
                          <span class="ql-formats">
                            <button class="ql-script" value="sub"></button>
                            <button class="ql-script" value="super"></button>
                          </span>
                          <span class="ql-formats">
                            <button class="ql-header" value="1"></button>
                            <button class="ql-header" value="2"></button>
                            <button class="ql-blockquote"></button>
                            <button class="ql-code-block"></button>
                          </span>
                          <span class="ql-formats">
                            <button class="ql-list" value="ordered"></button>
                            <button class="ql-list" value="bullet"></button>
                            <button class="ql-indent" value="-1"></button>
                            <button class="ql-indent" value="+1"></button>
                          </span>
                          <span class="ql-formats">
                            <button class="ql-direction" value="rtl"></button>
                            <select class="ql-align"></select>
                          </span>
                          <span class="ql-formats">
                            <button class="ql-link"></button>
                            <button class="ql-image"></button>
                            <button class="ql-video"></button>
                            <button class="ql-formula"></button>
                          </span>
                          <span class="ql-formats">
                            <button class="ql-clean"></button>
                          </span>
                        </div>
                        <div id="editor-container" style="border-radius: 0 0 .2rem .2rem;height: 20rem"></div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <p class="card-title w-100">Thể loại yêu thích :</p>
                      <div class="row m-0 border rounded w-100">
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                        <div class="custom-control custom-checkbox m-2">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Lolicon</label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="card-title">Thông tin liên lạc : </div>
                    
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Số điện thoại</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Số điện thoại của nhóm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Email của nhóm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Website</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Website của nhóm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Facebook</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Facebook của nhóm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Twitter</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Twitter của nhóm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Google+</span>
                      </div>
                      <input type="text" class="form-control" name="title" placeholder="Google+ của nhóm" >
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <img class="preview border mb-2 rounded" src="/wb-admin/images/preview.jpg" width="100%">
                    <div class="input-group mb-2">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input">
                        <label class="custom-file-label">Chọn ảnh bìa 1x1</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-sm btn-block" type="button">Upload ảnh bìa</button>
                    <a href="#" class="btn btn-success btn-sm btn-block">Lưu lại thông tin</a>
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

    <!-- Include the Quill library -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Initialize Quill editor -->
    <script>
    var quill = new Quill('#editor-container', {
      modules: {
        syntax: true,
        toolbar: '#toolbar-container'
      },
      placeholder: 'Nội dung tóm tắt tiểu sử nhóm....',
      theme: 'snow'  // or 'bubble'
    });
    </script>
  </body>

</html>
