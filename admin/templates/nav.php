<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <i class="fas fa-hard-hat fa-2x"></i>
        <div class="sidebar-brand-text mx-3">ÇÖMÜ Yazılım</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#asd"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-book"></i>
            <span>İçerikler</span>
        </a>
        <div id="asd" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="icerik-goster.php">İçerikleri Göster</a>
                <a class="collapse-item" href="icerik-ekle.php">İçerik Ekle</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
<!--
    <li class="nav-item">
        <a class="nav-link" href="mesajlar.php">
            <i class="fas fa-comments" aria-hidden="true"></i>

            <span>Mesajlar</span></a>
    </li>


    <hr class="sidebar-divider">
-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sayfalar</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="anasayfa.php">Anasayfa</a>
                <a class="collapse-item" href="hakkimizda.php">Hakkımızda</a>
                <a class="collapse-item" href="iletisim.php">İletişim</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#islem"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-list" aria-hidden="true"></i>
            <span>İşlemler</span>
        </a>
        <div id="islem" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="menu-islem.php">Menü</a>
                <a class="collapse-item" href="slider-islem.php">Slider</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="log-islem.php">
            <i class="fas fa-address-card"></i>
            <span>Kullanıcı Logları</span></a>
    </li>
    <!--
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="slider-islem.php">
            <i class="fas fa-image" aria-hidden="true"></i>
            <span>Slider İşlemleri</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="menu-islem.php">
            <i class="fas fa-list" aria-hidden="true"></i>
            <span>Menü İşlemleri</span></a>
    </li>

-->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Ayarlar
    </div>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ayar"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Ayarlar</span>
        </a>
        <div id="ayar" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_ayar.php">Kullanıcı</a>
                <a class="collapse-item" href="genel-ayar.php">Site</a>

            </div>
        </div>

    </li>







    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>