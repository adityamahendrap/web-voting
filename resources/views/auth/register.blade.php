@extends('layouts.teknik')

@section('content')
    <div>
        <h1>Register</h1>
        <div>
            <form action="/register" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="">
                    <label>Scan KTM/KRM/UKT Ku</label>
                    <input placeholder="Masukan Foto" class=" @error('file_url') is-invalid @enderror" name="file_url"
                        type="file" id="customFile" required>
                    <small class="maks-size-file text-danger mb-5">*maks file 2Mb</small>
                </div>
                <button>Go</button>
            </form>
            <span>Sudah terdaftar?
                <a href="/login">Login sekarang</a>
            </span>
        </div>
    </div>
@endsection
