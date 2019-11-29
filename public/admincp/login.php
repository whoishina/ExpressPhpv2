<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include "../config.inc.php";
    session_start();


    if(isset( $_POST['username'] ) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != '')
    {
        $exist_user = DB::query("SELECT * FROM users WHERE user_login = %s AND user_lv > 3", $_POST['username']);
        if( password_verify( $_POST['password'],$exist_user[0]['user_pass']))
        {
          $_SESSION['userlogin'] = $_POST['username'];
          app::go('./');
        }


    }
    if( isset($_GET['logout']) )
    {
      unset($_SESSION['userlogin']);
      app::go('./');
    }

    if(isset($_SESSION['userlogin']))
    {
      app::go("./");
    }

  ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Đăng nhập vào tài khoản | Ani4VN</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
         .login-block{
         background: #DE6262;  /* fallback for old browsers */
         background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
         background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
         float:left;
         width:100%;
         padding : 50px 0;
         height: 100% !important;
         position: absolute;
         }
         .banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:100%; border-radius: 0 10px 10px 0; padding:0;}
         .container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
         .carousel-inner{border-radius:0 10px 10px 0;}
         .carousel-caption{text-align:left; left:5%;}
         .login-sec{padding: 50px 30px; position:relative;}
         .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
         .login-sec .copy-text i{color:#FEB58A;}
         .login-sec .copy-text a{color:#E36262;}
         .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
         .login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
         .btn-login{background: #DE6262; color:#fff; font-weight:600;}
         .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
         .banner-text h2{color:#fff; font-weight:600;}
         .banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
         .banner-text p{color:#fff;}
      </style>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         // window.alert = function(){};
         // var defaultCSS = document.getElementById('bootstrap-css');
         // function changeCSS(css){
         //     if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
         //     else $('head > link').filter(':first').replaceWith(defaultCSS);
         // }
      </script>
   </head>
   <body>
      <div class="login-block h-100">
         <div class="container">
         <div class="row">
            <div class="col-md-4 login-sec">
               <h2 class="text-center">Đăng Nhập</h2>
               <form class="login-form" method="post">
                  <div class="form-group">
                     <label for="exampleInputEmail1" class="text-uppercase">Tài khoản</label>
                     <input type="text" name="username" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu</label>
                     <input type="password" name="password" class="form-control" placeholder="">
                  </div>
                  <div class="form-check">
                     <label class="form-check-label">
                     <input type="checkbox" name="keeplogin" class="form-check-input">
                     <small>Giữ đăng nhập</small>
                     </label>
                     <button type="submit" class="btn btn-login float-right">Submit</button>
                  </div>
               </form>
               <div class="copy-text">Ani4VN.Com <i class="fa fa-heart"></i> </div>
            </div>
            <div class="col-md-8 banner-sec">
               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                     <div class="carousel-item active">
                        <img class="d-block img-fluid" src="https://i.ytimg.com/vi/gpV48sIOBfw/maxresdefault.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                           <div class="banner-text">
                              <h2>Xin chào</h2>
                              <p>Nếu bạn là admin vui lòng đăng nhập bằng tài khoản đã được Quản lý cấp còn bạn là member thì đây có lẽ không phải nơi dành cho bạn !</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
