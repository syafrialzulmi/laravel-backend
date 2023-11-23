@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create a New Question</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{route('question.index')}}">All Questions</a></div>
                    <div class="breadcrumb-item">Create a New Question</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{route('question.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Kategori</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="kategori"
                                                    value="Numeric"
                                                    class="selectgroup-input"
                                                    checked="">
                                                <span class="selectgroup-button">Numeric</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="kategori"
                                                    value="Verbal"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Verbal</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="kategori"
                                                    value="Logika"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Logika</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Pertanyaan</label>
                                        <textarea class="form-control"
                                            data-height="150"
                                            style="height: 150px; @error('pertanyaan')
                                            is-invalid
                                        @enderror"
                                            name="pertanyaan"></textarea>
                                            @error('pertanyaan')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    &nbsp
                                    <div class="form-group mb-0">
                                        <label>Opsi A</label>
                                        <textarea class="form-control"
                                            data-height="150"
                                            style="height: 150px; @error('jawaban_a')
                                            is-invalid
                                        @enderror"
                                            name="jawaban_a"></textarea>
                                            @error('jawaban_a')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    &nbsp
                                    <div class="form-group mb-0">
                                        <label>Opsi B</label>
                                        <textarea class="form-control"
                                            data-height="150"
                                            style="height: 150px; @error('jawaban_b')
                                            is-invalid
                                        @enderror"
                                            name="jawaban_b"></textarea>
                                            @error('jawaban_b')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    &nbsp
                                    <div class="form-group mb-0">
                                        <label>Opsi C</label>
                                        <textarea class="form-control"
                                            data-height="150"
                                            style="height: 150px; @error('jawaban_c')
                                            is-invalid
                                        @enderror"
                                            name="jawaban_c"></textarea>
                                            @error('jawaban_c')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    &nbsp
                                    <div class="form-group mb-0">
                                        <label>Opsi D</label>
                                        <textarea class="form-control"
                                            data-height="150"
                                            style="height: 150px; @error('jawaban_d')
                                            is-invalid
                                        @enderror"
                                            name="jawaban_d"></textarea>
                                            @error('jawaban_d')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    &nbsp
                                    <div class="form-group">
                                        <label class="form-label">Kunci Jawaban</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="kunci"
                                                    value="a"
                                                    class="selectgroup-input"
                                                    checked="">
                                                <span class="selectgroup-button">A</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="kunci"
                                                    value="b"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">B</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="kunci"
                                                    value="c"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">C</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio"
                                                    name="kunci"
                                                    value="d"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">D</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{route('question.index')}}" class="btn btn-danger">Back</a>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
