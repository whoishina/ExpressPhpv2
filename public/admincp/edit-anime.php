<?php
include "admin.inc.php";

if( isset( $_GET['delete'] ) && is_numeric($_GET['delete']) )
{
  DB::delete( 'posts', 'post_id=%i',$_GET['delete'] );
  app::go('./anime.php');
}

app::use(anime);

anime::$name = $_GET['anime'];
anime::get();
if( isset($_GET['absolute']) )
{
  DB::update( 'posts', [
      'post_modify' => date("Y-m-d"),
  ],'post_name=%s',$_GET['anime']);
}
if( isset( $_POST['content'] ) )
{
    # Thêm thông tin cơ bản cho bài đăng
    DB::update( 'posts', [
        'post_title' => $_POST['title'],
        'post_name' => $_POST['permalink'],
        'post_json' => '{"epdata":"'. $_POST['episode'] .'"}',
        'post_modify' => date("Y-m-d"),
        'author_id' => 1,
        'post_content'=> $_POST['content']
    ],'post_name=%s',$_GET['anime']);

    # lấy ID bài đăng
    $pid = anime::$id;


    # Thêm hình nền
    DB::update('postmeta',[
        'meta_key' => 'thumbnail',
        'meta_value' => $_POST['thumbnail']
    ],'post_id=%i',$pid);




}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sửa Anime <?= anime::$title ?> - Ani4VN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
    <?php include("nav-2.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper ">
      <!-- partial:partials/_sidebar.html -->

        <?php include("navigation.php") ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row card bg-white">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../admin/anime.php">Danh Sách Anime</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm anime mới</li>
                      </ol>

                    </nav>
                </div>
                <div class="card-body  ">
                    <div class="form-group">
                        <form method="POST" class="forms"  enctype="multipart/form-data" >
                            <label class="text-success">Upload Image</label>
                            <div class="row">
                            <input class="form-control col-lg-9" type="file" name="file" class="f">
                            <button class="xxx form-control col-lg-3 btn btn-primary">UPLOAD</button>
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
                                            enctype: 'multipart/form-data',
                                            url: "../imgur.php",
                                            data: data,
                                            processData: false,
                                            contentType: false,
                                            cache: false,
                                            timeout: 600000,
                                            success: function (data) {
                                                $(".imgur").val(data);

                                            }
                                        });

                                    });

                                });
                            </script>
                    </div>
                    <form method="post" class="row" >
                        <div class="col-lg-9 pl-4">

                            <div class="form-group mt-1">
                                <label class="text-success">Ảnh đại diện</label>
                                <input  class="form-control imgur" type="text" name="thumbnail" value="<?= anime::$thumbnail ?>" >
                            </div>
                                <div class="form-group">
                                    <label class="text-success" >Tên Anime :</label>
                                    <input class="form-control title-ff" name="title" placeholder="Tên Anime..."  value="<?= anime::$title ?>"/>
                                </div>


                                <div class="input-group">
                                    <input class="form-control" value=" " disabled />
                                    <input class="form-control link " name="permalink" value="<?= anime::$name ?>" />
                                    <input class="form-control" value="-{post-id}.html" disabled />
                                </div>
                                 <p class="text-success p-0 m-0 mt-5">Thông tin Taxonomy : </p>
                                <div class="row m-0 p-0">

                                    <div class="input-group my-2 p-1 col-lg-4">
                                        <span class='form-control col-5' >Số tập: </span>
                                        <input class='form-control col-7' name='episode' type='text' placeholder='số tập ' value='??'  />
                                    </div>

                                    <div class="input-group my-2 p-1 col-lg-4">
                                        <span class='form-control col-5' >Tình trạng: </span>
                                        <select name="tinh-trang" class="form-control col-7">
                                        <?php foreach(DB::query("SELECT * FROM terms WHERE term_parent = 44") as $a => $i){ ?>
                                            <option value="<?php echo $i['term_id'] ?>"><?php echo $i['term_name'] ?></option>
                                        <?php } ?>

                                        </select>
                                    </div>

                                    <div class="input-group my-2 p-1 col-lg-4">
                                        <span class='form-control col-5' >Kiểu Anime: </span>
                                        <select name="kieu-anime" class="form-control col-7">
                                        <?php foreach(DB::query("SELECT * FROM terms WHERE term_parent = 5") as $a => $i){ ?>
                                            <option value="<?php echo $i['term_id'] ?>"><?php echo $i['term_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="input-group my-2 p-1 col-lg-4">
                                        <span class='form-control col-5' >Studio: </span>
                                        <select name="studio" class="form-control col-7">
                                        <?php foreach(DB::query("SELECT * FROM terms WHERE term_parent = 46") as $a => $i){ ?>
                                            <option value="<?php echo $i['term_id'] ?>"><?php echo $i['term_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="input-group my-2 p-1 col-lg-4">
                                        <span class='form-control col-5' >Mùa Anime: </span>
                                        <select name="season" class="form-control col-7">
                                        <?php foreach(DB::query("SELECT * FROM terms WHERE term_parent = 45") as $a => $i){ ?>
                                            <option value="<?php echo $i['term_id'] ?>"><?php echo $i['term_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>


                                    <div class="input-group my-2 p-1 col-lg-4">
                                        <span class='form-control col-5' >Lịch chiếu: </span>
                                        <select name="lich-chieu" class="form-control col-7">
                                        <?php foreach(DB::query("SELECT * FROM terms WHERE term_parent = 47") as $a => $i){ ?>
                                            <option value="<?php echo $i['term_id'] ?>"><?php echo $i['term_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                </div>

                            <div class="form-group mt-1">
                                <label class="text-success">Ảnh bìa</label>
                                <input  class="form-control" type="text" name="background" value="<?= anime::$thumbnail ?>" >
                            </div>

                            <div class="form-group mt-1">
                                <label class="text-success">Thể loại</label>
                                <style>
                                a.tags-item::after {
                                    content: "X";
                                    background: #007bff;
                                    position: absolute;
                                    color: #fff;
                                    margin-left: 7px;
                                    padding: 7px 9px;
                                    margin-top: -7px;
                                    border-bottom-right-radius: 3px;
                                    border-top-right-radius: 3px;
                                    cursor: pointer;
                                }
                                    .tags_content {
                                        width: 100%;
                                        float: left;
                                        margin-bottom: 10px;
                                    }
                                    a.tags-item {
                                        float: left;
                                        font-size: 12px;
                                        padding: 7px 5px;
                                        background: #aeaeae;
                                        color: #fff !important;
                                        border-radius: 2px;
                                        padding-right: 27px;
                                        margin-right: 10px;
                                    }
                                </style>
                                <div class="tags_content">
                                    <div class="tag_list row ">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group mt-1">
                                <label class="text-success">Nội dung Anime</label>
                                <textarea class="form-control" name="content" style="min-height:250px"  ><?= anime::$content ?></textarea>
                            </div>


                        </div>

                        <div class="col-lg-3 border-left" sstyle="border-right:1px solid rgba(0,0,0,.20)">
                            <a href="?anime=<?= $_GET['anime'] ?>&absolute" class="btn btn-block btn-warning mb-2"><i class="mdi mdi-cloud-upload"></i> Đưa lên top</a>
                            <button type="submit" name="update" class="btn btn-block btn-primary mb-2"><i class="mdi mdi-cloud-upload"></i> Update Anime</button>
                            <a href="episodes.php?anime=<?= anime::$name ?>&id=<?= anime::$id ?>"class="btn btn-block btn-success mb-2"><i class="mdi mdi-plus"></i> Thêm Tập</a>
                            <a href="edit-anime.php?delete=<?= anime::$id ?>"class="btn btn-block btn-danger mb-2"><i class="mdi mdi-recycle"></i> Xóa Anime này</a>




                        </div>

                    </form>

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
  <!-- End custom js for this page-->                           <script type="text/javascript">
                                $(document).ready(function()
                                {
                                    function xoa_dau(str) {
                                    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
                                    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
                                    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
                                    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
                                    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
                                    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
                                    str = str.replace(/đ/g, "d");
                                    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
                                    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
                                    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
                                    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
                                    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
                                    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
                                    str = str.replace(/Đ/g, "D");
                                    return str;
                                }
                                    $(".title-ff").keydown().keypress().keyup(function(){
                                        $(".link").attr('value',(
                                            xoa_dau(
                                                $(".title-ff").val().toLowerCase().replace( /[&\/\\#,+()$~%.'":*?<>{}\[\]\=\! ]/g, '-')
                                            ).replace(/--/g,'-').replace(/--/g,'-')
                                        ));
                                    });
                                    $(".link").blur(
                                    ()=>{
                                            $(".link").attr('value',(
                                                xoa_dau(
                                                    $(".link").attr('value').toLowerCase().replace( /[&\/\\#,+()$~%.'":*?<>{}\[\]\=\!\!\#\$\%\^\&\^\*\^\@]/g, '-')
                                                ).replace(/--/g,'-').replace(/--/g,'-')
                                            ));
                                        }
                                    );
                                });

                            </script>
                            <script type="text/javascript">
                                $(document).ready(
                                    ()=>{

                                        var the_loai = <?php echo json_encode(
                                            DB::query("SELECT term_name as tag_name , term_slug as tags_href , term_id as id FROM terms WHERE term_parent = 43"),true
                                            ) ?>;

                                            the_loai.forEach((elm)=>
                                            {
                                                $(".tag_list").append('<div class="form-check col-lg-2 col-md-4 col-sm-3 col-3"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="the-loai[]" value="'+elm.id+'" >'+elm.tag_name+'<i class="input-helper"></i></label></div>');   });
                                            $('.tagclick').click(
                                                ($elm)=>{
                                                    alert($elm.attr('class'));
                                                }
                                            );
                                        });

                            </script>
                            <style type="text/css">
                                .tagx{
                                    width: 113px;
                                    border: 1px solid;
                                    margin: 5px;
                                    padding: 9px 8px;
                                    float: left;
                                    color: #007bff;
                                    border-radius: 3px;
                                    text-align: left;
                                }
                            </style>
</body>

</html>
