<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?= base_url('public/assets/img/logo_bpbd.png') ?>" height="40px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">BPBD</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="<?= base_url() ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase" <?= (session()->get('level')!='kepala')?'':'hidden' ?>>
            <span class="menu-header-text">Kejadian</span>
        </li>
        <li class="menu-item" <?= (session()->get('level')!='kepala')?'':'hidden' ?>>
            <a href="<?= base_url('admin/kategori') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Kategori</div>
            </a>
            <a href="<?= base_url('admin/lokasi') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Lokasi</div>
            </a>
            <a href="<?= base_url('admin/kejadian') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Kejadian</div>
            </a>

        </li>
        <li class="menu-header small text-uppercase" <?= (session()->get('level')!='admin')?'hidden':'' ?>>
            <span class="menu-header-text">Bantuan</span>
        </li>
        <li class="menu-item" <?= (session()->get('level')!='admin')?'hidden':'' ?>>
            <a href="<?= base_url('admin/jenisbantuan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Jenis Bantuan</div>
            </a>
            <a href="<?= base_url('admin/bantuan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Bantuan</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase" <?= (session()->get('level')!='admin')?'hidden':'' ?>>
            <span class="menu-header-text">Akun</span>
        </li>
        <li class="menu-item" <?= (session()->get('level')!='admin')?'hidden':'' ?>>
            <a href="<?= base_url('admin/user') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">User</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase" <?= (session()->get('level')!='relawan')?'':'hidden' ?>>
            <span class="menu-header-text">Laporan</span>
        </li>
        <li class="menu-item" <?= (session()->get('level')!='relawan')?'':'hidden' ?>>
            <a href="<?= base_url('admin/user') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Cetak Laporan</div>
            </a>
        </li>
    </ul>
</aside>