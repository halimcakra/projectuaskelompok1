<!-- SIDEBAR -->
        <div class="sidebar">
          <div class="logo-details">
            <i class='bx bxs-cube-alt icon'></i>
              <div class="logo_name">B I S T I R</div>
              <i class='bx bx-menu' id="btn" ></i>
          </div>
          <ul class="nav-list">
            <li>
                <i class='bx bx-search' ></i>
               <input type="text" placeholder="Search...">
               <span class="tooltip">Search</span>
            </li>
            <li>
              <a href="<?php echo base_url() . 'User'; ?>">
                <i class='bx bxs-dashboard'></i>
                <span class="links_name">Dashboard</span>
              </a>
               <span class="tooltip">Dashboard</span>
            </li>
            <li>
             <a href="<?php echo base_url() . 'Crud'; ?>">
               <i class='bx bxs-calendar' ></i>
               <span class="links_name">Jadwal</span>
             </a>
             <span class="tooltip">Jadwal</span>
           </li>
           <li>
             <div class="icon-link">
               <a href="<?php echo base_url() . 'Crud_peserta'; ?>">
                 <i class='bx bxs-group' ></i>
                 <span class="links_name">Data Data</span>
               </a>
               <span class="tooltip">Data Peserta</span>
             </div>
           </li>
           <li>
             <a href="<?php echo base_url() . 'Crud_instruktur'; ?>">
               <i class='bx bxs-group' ></i>
               <span class="links_name">Data Instruktur</span>
             </a>
             <span class="tooltip">Data Instuktur</span>
           </li>
           <li>
             <a href="#">
               <i class='bx bx-cog' ></i>
               <span class="links_name">Setting</span>
             </a>
             <span class="tooltip">Setting</span>
           </li>
           <li class="profile">
               <div class="profile-details">
                 <div class="name_job">
                   <div class="name">Log Out</div>
                   <a  href="<?= site_url('Auth/logout') ?>" onclick="return confirm('Apakah anda yakin Log out ?')">
                     <i class='bx bx-log-out' id="log_out" ></i>
                  </a>
                 </div>
               </div>

           </li>
          </ul>
        </div>


            <!--Right Side-->
