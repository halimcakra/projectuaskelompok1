<section class="home-section">
    <nav>
      <div class="text">
        <p><?php echo $judul?></p>
      </div>
        <div class="navbar">
          <div class="notif">
            <div class="icon_wrap">
              <i class='bx bx-bell'></i>
            </div>
            <div class="notification_dd" >
              <ul class="notification_ul">
                <li class="Succes">
                  <div class="notify_icon">
                    <i class='bx bx-check'></i>
                  </div>
                  <div class="notify_data">
                    <div class="title">Transaksi Berhasil</div>
                    <div class="sub_title">Lorem ipsum dolor sit amet.</div>
                  </div>
                  <div class="notify_status">
                    <p>Success</p>
                  </div>
                </li>
                <li class="Failed">
                  <div class="notify_icon">
                    <i class='bx bxs-x-circle'></i>
                  </div>
                  <div class="notify_data">
                    <div class="title">Transaksi Gagal</div>
                    <div class="sub_title">Lorem ipsum dolor sit amet.</div>
                  </div>
                  <div class="notify_status">
                    <p>Failed</p>
                  </div>
                </li>
              </ul>

            </div>
          </div>
          <div class="pesan">
            <div class="icon_wrap">
              <i class='bx bx-chat' ></i>
            </div>
            <div class="notification_dd">
              <ul class="notification_ul">
                <li class="Succes">
                  <div class="notify_icon">
                    <i class='bx bx-check'></i>
                  </div>
                  <div class="notify_data">
                    <div class="title">John</div>
                    <div class="sub_title">Lorem ipsum dolor sit amet.</div>
                  </div>
                </li>
                <li class="Failed">
                  <div class="notify_icon">
                    <i class='bx bxs-x-circle'></i>
                  </div>
                  <div class="notify_data">
                    <div class="title">Robert</div>
                    <div class="sub_title">Lorem ipsum dolor sit amet.</div>
                  </div>
                </li>
              </ul>

            </div>
          </div>
          <div class="akun_profil">
            <div class="icon_wrap">
              <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" >
              <span class="name"><?= $user['name']; ?></span>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <div class="profile_dd">
              <ul class="profile_ul">
                <li class="profile_li"><a class="profile" href="<?= site_url('User/profil') ?>"><span class="picon"><i class='bx bx-user' ></i>
                </span> My Profile</a>
                </li>
                <li><a class="logout" href="<?= site_url('Auth/logout') ?>" onclick="return confirm('Apakah anda yakin Log out?')"><span class="picon"><i class='bx bx-log-out'></i></span> Log Out </a></li>
              </ul>
            </div>
          </div>
        </div>
    </nav>

  <!--Halaman content-->
  <div class="content">
