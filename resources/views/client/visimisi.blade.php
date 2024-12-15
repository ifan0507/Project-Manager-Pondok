@extends('layouts.client.template')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Bagian Visi -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #e3e8e6">
                        <h3>Visi</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($visiMisi as $visi)
                            <p class="text-justify">{{ $visi->visi }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Bagian Misi -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #e3e8e6">
                        <h3>Misi</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($visiMisi as $misi)
                            <p class="text-justify">{{ $misi->misi }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
