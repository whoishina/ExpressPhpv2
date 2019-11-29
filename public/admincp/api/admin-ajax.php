<?php
include_once("config.php");

import("UTF-8");
import("TOKEN");

if($_GET['token'] != $_SESSION['aniz_lg_token']) die("NULL");

if (isset($_GET['char']) )
    
    echo clean(convert_char(convert_vi($_GET['char']),'HTML')) ;


if (isset($_GET['user_form'])){
    
    # Lấy thư viện users
    
    import("USER");
    import("UI");
    import("POST");
    
   $id = $_SESSION['uid'] = 1;
    
    $fansub = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM aniz_fansub"))[0];
?>
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="http://file.vforum.vn/hinh/2016/10/avatar-anime-dang-yeu-cho-zalo-3.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo get_usermeta($id,'displayname'); ?></h3>
                <span class=""><?php echo $_SESSION['aniz_lg_token']; ?></span>

                <p class="text-muted text-center"><?php  echo whois($id); ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Anime</b> <a class="float-right"><?php echo get_anime_count($id) ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Episodes</b> <a class="float-right"><?php echo get_episode_count($id) ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Fansub </b> <a class="float-right"><?php echo $fansub ?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Sửa</b></a>
              </div>
              <!-- /.card-body -->
            </div>
<?php
}
