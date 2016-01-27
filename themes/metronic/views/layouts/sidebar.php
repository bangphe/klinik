<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="<?= ($this->ID=="site" || $this->ID=="default") ? "nav-item start active" : "nav-item start"; ?>">
                <?= CHtml::link('<i class="icon-home"></i><span class="title"> Dashboard</span><span class="selected"></span>',array('/admin'), array('class'=>'nav-link nav-toggle'));?>
            </li>
            <!-- <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li> -->
            <li class="<?= ($this->ID=="pasien") ? "nav-item active" : "nav-item"; ?>">
                <?= CHtml::link('<i class="icon-user"></i><span class="title"> Manajemen Pasien</span><span class="selected"></span>',array('/admin/pasien'), array('class'=>'nav-link nav-toggle'));?>
            </li>
            <li class="<?= ($this->ID=="order") ? "nav-item active" : "nav-item"; ?>">
                <?= CHtml::link('<i class="icon-user"></i><span class="title"> Manajemen Order</span><span class="selected"></span>',array('/admin/order'), array('class'=>'nav-link nav-toggle'));?>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Data Master</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Bootstrap Form
                                <br>Controls</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls_md.html" class="nav-link ">
                            <span class="title">Material Design
                                <br>Form Controls</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_validation.html" class="nav-link ">
                            <span class="title">Form Validation</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_validation_states_md.html" class="nav-link ">
                            <span class="title">Material Design
                                <br>Form Validation States</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?= ($this->ID=="user") ? "nav-item active" : "nav-item"; ?>">
                <?= CHtml::link('<i class="icon-users"></i><span class="title"> Manajemen User</span><span class="selected"></span>',array('/admin/user'), array('class'=>'nav-link nav-toggle'));?>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-book-open"></i>
                    <span class="title">Rekap</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Keuangan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Penjualan Kacamata
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Penjualan Obat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Penjualan Obat Resep
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Pembelian Obat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Pembelian Lensa
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Penjualan Kacamata
                            </span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Pembelian Gagang
                            </span>
                        </a>
                    </li>
                    
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">Laporan Pembelian Obat
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>