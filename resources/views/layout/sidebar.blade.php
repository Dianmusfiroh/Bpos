        <aside class="navbar-aside" id="offcanvas_aside">
            <div class="aside-top">
                <a href="<?=url('/')?>" class="brand-wrap">
                    <img src="{{ asset('assets/imgs/brands/Logo Bpos.png')}}" class="logo" alt="Bpos" />
                </a>
                <div>
                    <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
                </div>
            </div>
            <nav>
                <ul class="menu-aside">
                    <li class="menu-item active">
                        <a class="menu-link" href="<?=url('/')?>">
                            <i class="icon material-icons md-home"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a class="menu-link" href="<?=url('booth')?>">
                            <i class="icon material-icons md-format_list_bulleted"></i>
                            <span class="text">List Booth</span>
                        </a>

                    <li class="menu-item ">
                        <a class="menu-link" href="<?=url('fee')?>">
                            <i class="icon material-icons md-settings "></i>

                            <span class="text">Pengaturan Fee</span>
                        </a>

                    </li>
                    <li class="menu-item ">
                        <a class="menu-link" href="<?=url('biodata') ?>">
                            <i class="icon material-icons md-store"></i>
                            <span class="text">Form Registrasi</span>
                        </a>
                    </li>
                </ul>
                </ul>
                <br />
                <br />
            </nav>
        </aside>
        <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
        {{--  <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>  --}}
        {{--  <script src="assets/js/vendors/select2.min.js"></script>  --}}
        {{--  <script src="assets/js/vendors/perfect-scrollbar.js"></script>  --}}
        {{--  <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>  --}}
        {{--  <script src="assets/js/vendors/chart.js"></script>  --}}
        <!-- Main Script -->
        <script src="assets/js/main.js?v=1.0" type="text/javascript"></script>
        <script src="assets/js/custom-chart.js" type="text/javascript"></script>


