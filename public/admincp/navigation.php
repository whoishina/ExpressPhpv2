<?php 
global $user;
?>
      <nav class="sidebar sidebar-offcanvas  " id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo $user->userAvatar ?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <a href="profile.php"><p class="profile-name"><?php echo $user->user_displayname ?></p></a>
                  <div>
                    <small class="designation text-muted"></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
                    
              <a href="add-anime.php" class="btn-block">
                  <button class="btn btn-success btn-block">Anime mới
                    <i class="mdi mdi-plus"></i>
                  </button>
            </a>
                
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi mdi-cube text-danger"></i>
              <span class="menu-title">Anime</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="anime.php">Anime</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="categories.php">Thể loại</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studios.php">Studios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="years.php">Năm sản xuất</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="schedule.php">Lịch chiếu</a>
                </li>
              </ul>
            </div>
          </li>
            
            <li class="nav-item">
            <a class="nav-link" href="fansubs.php">
              <i class="menu-icon mdi mdi-account-network text-warning"></i>
              <span class="menu-title">Fansubs</span>
            </a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="members.php">
              <i class="menu-icon mdi mdi-account-multiple-outline text-warning"></i>
              <span class="menu-title">Thành viên</span>
            </a>
          </li>
            
        </ul>
      </nav>