@extends('layouts.client.template')
@section('content')
    <section class="my-5">
        <div class="container">
            @foreach ($sejarahs as $sejarah)
                <div class="row mb-4">
                    <div class="col-md-7 col-12 my-auto">
                        <h3 class="text-gradient text-dark mb-3">{{ $sejarah->judul }}</h3>
                        <p class="pe-md-5 mb-3">
                            <span class="short-desc">
                                {{ $sejarah->short_description }}
                            </span>
                            <span class="full-desc d-none">
                                {{ $sejarah->deskripsi }}
                            </span>
                        </p>
                        <button class="btn bg-gradient-dark mb-5 mb-sm-0 btn-link toggle-desc">Selengkapnya</button>
                    </div>
                    <div class="col-md-5 col-12 my-auto">
                        <a href="#">
                            <img class="w-100 border-radius-lg shadow-lg" src="{{ asset('storage/' . $sejarah->gambar) }}"
                                alt="Product Image">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-desc');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const shortDesc = this.previousElementSibling.querySelector('.short-desc');
                    const fullDesc = this.previousElementSibling.querySelector('.full-desc');

                    if (shortDesc.classList.contains('d-none')) {
                        shortDesc.classList.remove('d-none');
                        fullDesc.classList.add('d-none');
                        this.textContent = 'Selengkapnya';
                    } else {
                        shortDesc.classList.add('d-none');
                        fullDesc.classList.remove('d-none');
                        this.textContent = 'Tampilkan lebih sedikit';
                    }
                });
            });
        });
    </script>
@endsection
