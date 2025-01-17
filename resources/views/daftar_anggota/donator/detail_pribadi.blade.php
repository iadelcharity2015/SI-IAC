@extends('dashboard.app')

@section('title', 'Data Diri Donator')

@section('daftar_anggota', 'active')
@section('anggota', 'show')
@section('anggota_donator', 'active')

@section('contents')
    <!-- konten modal-->
    <div class="modal-content ">
        <!-- heading modal -->
        <div class="modal-header justify-content-center">
            <h4 style="color: #f3c11d;"><strong> Data Diri Donator </strong></h4>
        </div>
        <div class="container">
            <input id="tab1" type="radio" name="tabs">
            <label for="tab1" class="text-gray-900"> Data Akademis </label>

            <input id="tab2" type="radio" name="tabs" checked>
            <label for="tab2" class="text-gray-900"> Data Pribadi </label>    

            <input id="tab3" type="radio" name="tabs">
            <label for="tab3" class="text-gray-900"> Data Donator </label>

            <input id="tab4" type="radio" name="tabs">
            <label for="tab4" class="text-gray-900"> Catatan </label>
            
            <section id="content1">
                <table class="table table-borderless text-gray-900">
                    <tr>
                        <td width="200"> Program Studi </td>
                        <td width="20"> : </td>
                        <td> {{ $donator->study_program }} </td>
                    </tr>
                    <tr>
                        <td> Fakultas </td>
                        <td> : </td>
                        <td> {{ $donator->faculty }} </td>
                    </tr>
                    <tr>
                        <td> Angkatan </td>
                        <td> : </td>
                        <td> {{ $donator->generation }} </td>
                    </tr>
                    <tr>
                        <td> Alumni </td>
                        <td> : </td>
                        <td> {{ $donator->alumni }} </td>
                    </tr>
                </table>
            </section>
            <section id="content2">
                <table class="table table-borderless text-gray-900">
                    <tr>
                        <td width="200"> Nama Donator </td>
                        <td width="20"> : </td>
                        <td> {{ $donator->name }} </td>
                    </tr>
                    <tr>
                        <td> Tempat/Tanggal Lahir </td>
                        <td> : </td>
                        <td>
                            <?php
                            $bulanIndonesia = [
                                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                            ];
                            ?>
                            @if (!empty($donator->place_of_birth) && !empty($donator->date_of_birth))
                                {{ $donator->place_of_birth }}/{{ \DateTime::createFromFormat('Y-m-d', $donator->date_of_birth)->format('j ') . $bulanIndonesia[\DateTime::createFromFormat('Y-m-d', $donator->date_of_birth)->format('n') - 1] . \DateTime::createFromFormat('Y-m-d', $donator->date_of_birth)->format(' Y') }}
                            @else
                                {{ $donator->place_of_birth ?: '-' }}/{{ $donator->date_of_birth ? \DateTime::createFromFormat('Y-m-d', $donator->date_of_birth)->format('j ') . $bulanIndonesia[\DateTime::createFromFormat('Y-m-d', $donator->date_of_birth)->format('n') - 1] . \DateTime::createFromFormat('Y-m-d', $donator->date_of_birth)->format(' Y') : '-' }}
                            @endif
                        </td>                                                                                         
                    </tr>                    
                    <tr>
                        <td> Jenis Kelamin </td>
                        <td> : </td>
                        <td> {{ $donator->gender }} </td>
                    </tr>
                    <tr>
                        <td> Agama </td>
                        <td> : </td>
                        <td> {{ $donator->religion }} </td>
                    </tr>
                    <tr>
                        <td> Alamat </td>
                        <td> : </td>
                        <td> {{ $donator->address }} </td>
                    </tr>
                    <tr>
                        <td> Email </td>
                        <td> : </td>
                        <td> {{ $donator->email }} </td>
                    </tr>
                    <tr>
                        <td> Nomor Handphone </td>
                        <td> : </td>
                        <td> {{ substr_replace(substr_replace($donator->phone_number, '-', 4, 0), '-', 9, 0) }} </td>
                    </tr>
                </table>
            </section>
            <section id="content3">
                <table class="table table-borderless text-gray-900">
                    <tr>
                        <td width="200"> Kode Donator </td>
                        <td width="20"> : </td>
                        <td> {{ $donator->code_name }} </td>
                    </tr>
                    <tr>
                        <td> PIC </td>
                        <td> : </td>
                        <td> {{ $donator->bph->nama }} </td>
                    </tr>
                    <tr>
                        <td> Tanggal Bergabung </td>
                        <td> : </td>
                        <?php
                        $bulanIndonesia = [
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];
                        ?>
                        <td>{{ \DateTime::createFromFormat('Y-m-d', $donator->date_of_joining)->format('j ') . $bulanIndonesia[\DateTime::createFromFormat('Y-m-d', $donator->date_of_joining)->format('n') - 1] . \DateTime::createFromFormat('Y-m-d', $donator->date_of_joining)->format(' Y') }}</td>
                    </tr>
                    <tr>
                        <td> Struktur Donator </td>
                        <td> : </td>
                        <td>
                            @if ($donator->struktur_donator == 'Donator tetap')
                                <span class="badge badge-success">Donator Tetap</span>
                            @else
                                <span class="badge badge-danger">Donator Tidak Tetap</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </section>
            <section id="content4">
                <table class="table table-borderless text-gray-900">
                    <tr>
                        <td width="200"> Deskripsi </td>
                        <td width="20"> : </td>
                        <td> {!! $donator->description !!} </td>
                    </tr>
                </table>
            </section>
        </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <a href='/anggota_donator' type="button" class="btn btn-warning"> Back </a>
            </div>
        </div>
    </div>
@endsection