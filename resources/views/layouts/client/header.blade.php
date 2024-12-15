<div class="page-header min-vh-80">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <img class="slide-image" src="{{ asset('assets/img/sekolah.jpg') }}" alt="Slide 1">
                <div class="mask"></div>
                <div class="container text-center">
                    <h1 class="text-white">{{ $data->title }}</h1>
                    <h3 class="text-white">{{ $data->list }}</h3>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
                <img class="slide-image" src="{{ asset('assets/img/kamar.jpeg') }}" alt="Slide 2">
                <div class="mask"></div>
                <div class="container text-center">
                    <h1 class="text-white">{{ $data->title }}</h1>
                    <h3 class="text-white">{{ $data->list }}</h3>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
                <img class="slide-image" src="{{ asset('assets/img/halaman.jpeg') }}" alt="Slide 3">
                <div class="mask"></div>
                <div class="container text-center">
                    <h1 class="text-white">{{ $data->title }}</h1>
                    <h3 class="text-white">{{ $data->list }}</h3>
                </div>
            </div>

            <div class="swiper-slide">
                <img class="slide-image" src="{{ asset('assets/img/Pengurus.jpeg') }}" alt="Slide 3">
                <div class="mask"></div>
                <div class="container text-center">
                    <h1 class="text-white">{{ $data->title }}</h1>
                    <h3 class="text-white">{{ $data->list }}</h3>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.mySwiper', {
            loop: true, // Slider terus berputar
            autoplay: {
                delay: 5000, // Berpindah otomatis setiap 5 detik
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
