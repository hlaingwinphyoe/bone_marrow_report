<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <span class="p-2 rounded d-flex justify-content-center align-items-center mr-2">
<!--                <i class="fas fa-user text-white h4 mb-0"></i>-->
                <img src="<?php echo $url; ?>/assets/img/logo.png" style="width: 60px" alt="">
            </span>
            <span class="font-weight-bolder h4 mb-0  text-primary ms-2">Bone Marrow Reports</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="fa fa-times text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <li class="title text-nowrap">
                <span>ICSH Guidelines</span>
            </li>

            <li class="menu-spacer"></li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/aspirate_report" class="menu-item-link">
                    <span>
                        Aspirate Report Listings
                    </span>
                    <span class="badge badge-pill bg-white rounded-pill shadow-sm text-primary">
                        <?php echo countTotal('aspirate_reports'); ?>
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/trephine_report" class="menu-item-link">
                    <span>
                        Trephine Report Listings
                    </span>
                    <span class="badge badge-pill bg-white rounded-pill shadow-sm text-primary">
                        <?php echo countTotal('trephine_reports'); ?>
                    </span>
                </a>
            </li>
            <li class="menu-spacer"></li>

            <li class="text-black-50 mb-2">
                <span>Report Setting</span>
            </li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/aspirate_report_create" class="menu-item-link">
                <span>
                    Aspirate Report
                </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/trephine_report_create" class="menu-item-link">
            <span>
                Trephine Report
            </span>
                </a>
            </li>

            <li class="menu-spacer"></li>
            <?php if ($_SESSION['user']['role'] == 0){ ?>
            <li class="text-black-50 mb-2">
                <span>Setting</span>
            </li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/profile" class="menu-item-link">
                <span>
                    Profile
                </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/users" class="menu-item-link">
                    <span>
                        Users
                    </span>
                </a>
            </li>
            <?php } ?>

            <hr>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/logout" class="btn btn-danger w-100">
                    Log out
                </a>
            </li>

        </ul>
    </div>
</div>