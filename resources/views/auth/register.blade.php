@extends('layouts.teknik')

@section('content')
    <div>
        <h1 style="text-align:center;font-weight:700;">REGISTER</h1>
        <div class="form-custom-layout">
            <form action="/register" method="POST" enctype="multipart/form-data" class="form-custom">
                @csrf
                <div class="form-group-custom-inline">
                    <div class="form-group-custom">
                        <input type="text" name="register_nim" id="nim" placeholder="Masukkan NIM" maxlength="10">
                    </div>
                    <div class="form-group-custom">
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" disabled>
                    </div>
                </div>
                <div class="form-group-custom-inline">
                    <div class="form-group-custom">
                        <input type="password" name="register_password" id="pwdId" placeholder="Masukkan Password"
                            pattern="^[0-9a-zA-Z]{2,30}$" required>
                    </div>
                    <div class="form-group-custom">
                        <input type="password" name="password_confirmation" id="cPwdId" class="myCpwdClass"
                            placeholder="Konfirmasi Password" pattern="^[0-9a-zA-Z]{2,30}$" required>
                    </div>
                </div>
                <div class="form-group-custom">
                    <label>Scan KTM/KRM/UKT Ku</label>
                    <input placeholder="Masukan Foto" class=" @error('file_url') is-invalid @enderror input-file-custom" name="file_url"
                        type="file" id="customFile" required>
                    <small class="maks-size-file ">*maks file 2Mb</small>
                </div>
                <button class="btn-custom">Daftar</button>
            </form>
            <span style="display:block;text-align:center;">Sudah terdaftar?
                <a href="/login" style="color:#E54C4C;text-decoration:underline;">Login sekarang</a>
            </span>
        </div>
    </div>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/vendor/jquery.cookie/jquery.cookie.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/auth.js"></script>

    <script>
        $(document).ready(function() {
            $('#nim').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('autocomplete.fetch') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#nama').val(data);
                        }
                    });
                }
            });
        });


        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));

        $("#nim").inputFilter(function(value) {
            return /^-?\d*$/.test(value);
        });
    </script>
@endsection

<style>
    .form-custom-layout {
        width: 550px;
    }

    .form-custom {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 20px;
    }

    .form-custom .form-group-custom {
        display: flex;
        flex-direction: column;
    }

    .form-custom .form-group-custom-inline {
        display: grid;
        grid-template-columns: 1fr 1fr;
        width: 100%;
        gap: 20px;
    }

    .form-custom .form-group-custom label {
        margin-bottom: 2px;
    }

    .form-custom .form-group-custom input {
        padding: 10px;
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.125);
        color: white;
        border: none;
    }

    .form-custom .form-group-custom input.error {
        border: 1px solid #EE7575;
    }

    .message-error {
        color: #EE7575;
        font-size: 12px;
        margin-top: 2px;
        margin-bottom: 0;
    }

    .form-custom .form-group-custom input:focus {
        outline: none;
    }

    .form-custom .btn-custom {
        margin-top: 15px;
        padding: 10px;
        font-weight: bold;
        border-radius: 5px;
        background-color: #810000;
        color: white;
        border: none;
        transition: all 0.35s ease;
    }

    .form-custom .btn-custom:hover {
        background-color: #C90000;
        cursor: pointer;
    }
    .input-file-custom::-webkit-file-upload-button {
  visibility: hidden;
}
.input-file-custom::before {
  content: 'Upload Dokumen';
  display: inline-block;
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  font-weight: 700;
  font-size: 10pt;
}
.input-file-custom:hover::before {
  border-color: black;
}

    @media screen and (max-width: 516px) {
        .form-custom-layout {
            width: 100%;
        }

        .form-custom .form-group-custom-inline {
            display: flex;
            flex-direction: column;
        }

    }
</style>
