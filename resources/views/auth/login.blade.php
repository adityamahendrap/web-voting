@extends('layouts.teknik')

@section('content')
    <div>
        <h1>Login</h1>
        <div>
            <form action="/login" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button>Go</button>
            </form>
            <span>Belum terdaftar?
                <a href="/register">Daftar sekarang</a>
            </span>
        </div>
    </div>
@endsection
