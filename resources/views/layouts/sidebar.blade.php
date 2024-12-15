<aside class="main-sidebar sidebar-dark-navy elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <img src="/assets/img/nh.jpeg" alt="AdminLTE Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">PP Nurul Huda</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}"
                        class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item" id="profile-menu">
                    <a href="#"
                        class="nav-link has-dropdown d-flex align-items-center {{ $activeMenu == 'profile' ? 'active' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#profile"
                        aria-expanded="{{ $activeMenu == 'profile' ? 'true' : 'false' }}" aria-controls="profile"
                        data-bs-auto-close="false">
                        <i class="nav-icon fa-solid fa-building-columns"></i>
                        <p class="ms-2">Managemen Profile</p>
                        <i class="fa-solid fa-angle-down ms-auto arrow-icon"></i>
                    </a>
                    <ul id="profile"
                        class="sidebar-dropdown list-unstyled collapse {{ $activeMenu == 'profile' ? 'show' : '' }}"
                        data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a href="{{ url('visi-misi') }}" id="sub-misi"
                                class="nav-link {{ $activeSubMenu == 'visi-misi' ? 'active' : '' }}"><i
                                    class="nav-icon fa-solid fa-bullseye"></i>Visi Misi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sejarah') }}"
                                class="nav-link {{ $activeSubMenu == 'sejarah' ? 'active' : '' }}"><i
                                    class="nav-icon fa-solid fa-history"></i>Sejarah</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i
                                    class="nav-icon fa-solid fa-user-graduate"></i>Masyayikh</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="nav-icon fa-solid fa-sitemap"></i>Struktur</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/santri') }}"
                        class="nav-link {{ $activeMenu == 'santri' ? 'active' : '' }} dataSantri">
                        <i class="nav-icon far fa-user"></i>
                        <p>Data Santri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-graduation-cap"></i>
                        <p>Pendidikan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('izin') }}" class="nav-link {{ $activeMenu == 'izin' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-file-alt"></i>
                        <p>Perizinan Santri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link logout">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script>
    $(document).ready(function() {
        $(".dataSantri").on("click", function(e) {
            e.preventDefault();
            const targetUrl = $(this).attr("href");

            Swal.fire({
                title: "Memproses...",
                html: "Mohon tunggu sebentar, data sedang dimuat.",
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });

            $.ajax({
                url: targetUrl,
                method: "GET",
                success: function(response) {
                    Swal.close();
                    window.location.href = targetUrl;
                },
                error: function() {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal Memuat Data",
                        text: "Terjadi kesalahan saat memuat data. Silakan coba lagi.",
                    });
                },
            });
        });

        $(".logout").on("click", function(e) {
            e.preventDefault();
            const logoutUrl = $(this).attr("href");
            $("body").append(`
            <div id="loadingOverlay" style="
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.8);
                z-index: 9999;
                display: flex;
                justify-content: center;
                align-items: center;
            ">
                <img src="{{ asset('assets/img/loading.gif') }}" alt="Loading..." style="
                    width: 400px;
                    height: 400px;
                    background: transparent;
                ">
            </div>
        `);
            setTimeout(function() {
                window.location.href = logoutUrl;
            }, 2000);
        });
    });
</script>
