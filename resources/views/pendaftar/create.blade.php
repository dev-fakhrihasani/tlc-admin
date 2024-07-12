@extends('layouts.main')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h2>Tambah Data Pendaftar</h2>

<div class="my-5 col-md-12 col-lg-8">
    <form action="{{ route('pendaftar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Nama -->
        <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="name" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" value="{{ old('nama') }}" autofocus>
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Tempat Lahir -->
        <div class="row mb-3">
            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Tanggal Lahir -->
        <div class="row mb-3">
            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- No HP -->
        <div class="row mb-3">
            <label for="no_hp" class="col-sm-3 col-form-label">Nomor HP</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Jenjang Pendidikan -->
        <div class="row mb-3">
            <label for="jenjang" class="col-sm-3 col-form-label">Jenjang Pendidikan</label>
            <div class="col-sm-9">
                <select class="form-select @error('jenjang_pendidikan') is-invalid @enderror" id="jenjang" name="jenjang_pendidikan">
                    <option selected disabled>Pilih Jenjang Pendidikan</option>
                    @foreach($jenjangPendidikanOptions as $value => $label)
                    <option value="{{ $value }}" {{ old('jenjang_pendidikan') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('jenjang_pendidikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Asal Sekolah -->
        <div class="row mb-3">
            <label for="asal_sekolah" class="col-sm-3 col-form-label">Asal Sekolah</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}">
                @error('asal_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Kelas -->
        <div class="row mb-3">
            <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas') }}">
                @error('kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Peminatan -->
        <div class="row mb-3 align-items-end">
            <label for="peminatan" class="col-sm-3 col-form-label">Peminatan</label>
            <div class="col-sm-9">
                <p class="fw-bold">*isi peminatan khusus siswa SMA/SMK/MA</p>
                <select class="form-select @error('peminatan') is-invalid @enderror" id="peminatan" name="peminatan">
                    <option selected disabled>Pilih Peminatan</option>
                    @foreach($peminatanOptions as $value => $label)
                    <option value="{{ $value }}" {{ old('peminatan') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('peminatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Alasan Join -->
        <div class="row mb-3">
            <label for="alasan_join" class="col-sm-3 col-form-label">Alasan Join</label>
            <div class="col-sm-9">
                <textarea class="form-control @error('nama') is-invalid @enderror" name="alasan_join" id="alasan_join">{{ old('alasan_join') }}</textarea>
                @error('alasan_join')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- SS Follow IG -->
        <div class="row mb-3">
            <label for="ss1" class="col-sm-3 col-form-label">* SS Follow IG</label>
            <div class="col-sm-9">
                <input type="file" class="form-control @error('ss1') is-invalid @enderror" id="ss1" name="ss1">
                @error('ss1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- SS Subscribe YT -->
        <div class="row mb-3">
            <label for="ss2" class="col-sm-3 col-form-label">* SS Subscribe YT</label>
            <div class="col-sm-9">
                <input type="file" class="form-control @error('ss2') is-invalid @enderror" id="ss2" name="ss2">
                @error('ss2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- SS Posting Twibbon -->
        <div class="row mb-3">
            <label for="ss3" class="col-sm-3 col-form-label">* SS Posting Twibbon</label>
            <div class="col-sm-9">
                <input type="file" class="form-control @error('ss3') is-invalid @enderror" id="ss3" name="ss3">
                @error('ss3')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- SS Bukti Share -->
        <div class="row mb-3">
            <label for="ss4" class="col-sm-3 col-form-label">* SS Bukti Share</label>
            <div class="col-sm-9">
                <input type="file" class="form-control @error('ss4') is-invalid @enderror" id="ss4" name="ss4">
                @error('ss4')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>

    </form>
</div>
@endsection