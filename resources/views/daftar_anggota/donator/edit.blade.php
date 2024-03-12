@extends('dashboard.app')

@section('title', 'Edit Data Donator')

@section('daftar_anggota', 'active')
@section('anggota', 'show')
@section('anggota_donator', 'active')

@section('contents')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show col-md-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form class="form-group" action="/edit_donator/{{ $donator->id }}" method="post">
    @csrf
    @method('put')
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header justify-content-center">
                <h4 style="color: #1b8112;"><strong> Edit Data Donator </strong></h4>
            </div>
            <!-- body modal --> 
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="code_name" class="col-form-label text-gray-900"><strong> Kode Nama Donator <span class="required" id="name_awarde_required">*</span></strong></label>
                            <div class="container">
                                <input type="text" class="form-control text-gray-900" name="code_name" placeholder="kode nama donator" value="{{ $donator->code_name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="col-form-label text-gray-900"><strong> Nama Donator <span class="required" id="name_awarde_required">*</span></strong></label>
                            <div class="container">
                                <input type="text" class="form-control text-gray-900" name="name" placeholder="nama lengkap donator" value="{{ $donator->name }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="bph_id" class="col-form-label text-gray-900"><strong>PIC <span class="required" id="name_awarde_required">*</span></strong></label>
                            <div class="col-md-12">
                                <select class="form-control text-gray-900" name="bph_id" data-live-search="true">
                                    <option value="{{ $donator->bph->id }}">{{ $donator->bph->nama }}</option>
                                    @foreach ($bph->sortBy('nama') as $jp)
                                        @if ($jp->id !== $donator->bph->id)
                                            <option value="{{ $jp->id }}">{{ $jp->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="alumni" class="col-form-label text-gray-900"><strong>Alumni</strong></label>
                            <div class="container">
                                <select class="form-control text-gray-900" name="alumni">
                                    <option disabled selected> -- Pilih Alumni -- </option>
                                    @foreach(['IAD', 'NIAD'] as $option)
                                        <option {{ $donator->alumni == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="study_program" class="col-form-label text-gray-900"><strong>Program Studi</strong></label>
                            <div class="container">
                                @php
                                    $studyPrograms = ['S1 Informatika', 'S1 Manajemen Rekayasa', 'S1 Sistem Informasi', 'S1 Teknik Bioproses', 'S1 Teknik Elektro', 'D4 Teknologi Rekayasa Perangkat Lunak', 'D3 Teknologi Informasi', 'D3 Teknologi Komputer'];
                                    sort($studyPrograms);
                                @endphp
                                <select class="form-control text-gray-900" name="study_program" data-live-search="true">
                                    <option disabled selected> -- Pilih Program Studi -- </option>
                                    @foreach ($studyPrograms as $option)
                                        <option {{ $donator->study_program == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="faculty" class="col-form-label text-gray-900"><strong>Fakultas</strong></label>
                            <div class="container">
                                <select class="form-control text-gray-900" name="faculty" data-live-search="true">
                                    <option disabled selected> -- Pilih Fakultas -- </option>
                                    @foreach(['Fakultas Bioteknologi', 'Fakultas Informatika & Teknik Elektro', 'Fakultas Teknologi Industri', 'Fakultas Vokasi'] as $option)
                                        <option {{ $donator->faculty == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="generation" class="col-form-label text-gray-900"><strong> Angkatan </strong></label>
                            <div class="container">
                                <input type="number" class="form-control text-gray-900" name="generation" placeholder="angkatan" value="{{ $donator->generation }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="place_of_birth" class="col-form-label text-gray-900"><strong> Tempat Lahir </strong></label>
                            <div class="container">
                                <input type="text" class="form-control text-gray-900" name="place_of_birth" placeholder="tempat lahir" value="{{ $donator->place_of_birth }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="date_of_birth" class="col-form-label text-gray-900"><strong> Tanggal Lahir </strong></label>
                            <div class="container">
                                <input type="date" class="form-control text-gray-900" name="date_of_birth" placeholder="tanggal lahir" value="{{ $donator->date_of_birth }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="gender" class="col-form-label text-gray-900"><strong>Jenis Kelamin</strong></label>
                            <div class="container">
                                <select class="form-control text-gray-900" name="gender">
                                    <option disabled selected> -- Pilih Jenis Kelamin -- </option>
                                    @foreach(['Female', 'Male'] as $option)
                                        <option {{ $donator->gender == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="religion" class="col-form-label text-gray-900"><strong>Agama</strong></label>
                            <div class="container">
                                <select class="form-control text-gray-900" name="religion" data-live-search="true">
                                    <option disabled selected> -- Pilih Agama -- </option>
                                    @foreach(['Buddha', 'Hindu', 'Islam', 'Katholik', 'Konghucu', 'Kristen'] as $option)
                                        <option {{ $donator->religion == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="address" class="col-form-label text-gray-900"><strong> Alamat </strong></label>
                            <div class="container">
                                <input type="text" class="form-control text-gray-900" name="address" placeholder="alamat tempat tinggal"value="{{ $donator->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="phone_number" class="col-form-label text-gray-900"><strong> No Handphone </strong></label>
                            <div class="container">
                                <input type="number" class="form-control text-gray-900" name="phone_number" placeholder="08080808080808" value="{{ $donator->phone_number }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="date_of_joining" class="col-form-label text-gray-900"><strong> Tanggal Bergabung <span class="required" id="name_awarde_required">*</span></strong></label>
                            <div class="container">
                                <input type="date" class="form-control text-gray-900" name="date_of_joining" placeholder="tanggal bergabung" value="{{ $donator->date_of_joining }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="email" class="col-form-label text-gray-900"><strong> Email Donator </strong></label>
                            <div class="container">
                                <input type="text" class="form-control text-gray-900" name="email" placeholder="email donator" value="{{ $donator->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="struktur_donator" class="col-form-label text-gray-900"><strong>Struktur Donator <span class="required" id="name_awarde_required">*</span></strong></label>
                            <div class="container">
                                <select class="form-control text-gray-900" name="struktur_donator" required>
                                    <option disabled selected> -- Pilih Struktur Donator -- </option>
                                    @foreach(['Donator tetap', 'Donator tidak tetap'] as $option)
                                        <option {{ $donator->struktur_donator == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description" class="col-form-label text-gray-800"><strong> Catatan </strong></label>
                            <div class="container">
                                <input type="hidden" class="form-control text-gray-900" name="description" id="x" value="{{ $donator->description }}">
                                <trix-editor input="x" placeholder="catatan mengenai donator" class="text-gray-900"></trix-editor>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <a href='/anggota_donator' type="button" class="btn btn-warning"> Back </a>
                <button type="submit" class="btn btn-success"> Update </button>
            </div>
        </div>
    </form>
@endsection