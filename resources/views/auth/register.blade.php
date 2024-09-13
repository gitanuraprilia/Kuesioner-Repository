@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Nama" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stage" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                        <div class="col-md-6">
                                <input id="stage" placeholder="Mahasiswa/Dosen" type="text" class="form-control @error('stage') is-invalid @enderror" name="stage" value="{{ old('stage') }}" required autocomplete="stage" autofocus>

                                @error('stage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nim_nidn_nik" class="col-md-4 col-form-label text-md-end">{{ __('NIM/NIDN/NIK') }}</label>

                            <div class="col-md-6">
                                <input id="nim_nidn_nik" placeholder="NIM/NIDN/NIK" type="text" class="form-control @error('nim_nidn_nik') is-invalid @enderror" name="nim_nidn_nik" value="{{ old('nim_nidn_nik') }}" required autocomplete="nim_nidn_nik" autofocus>

                                @error('nim_nidn_nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="study_program" class="col-md-4 col-form-label text-md-end">{{ __('Program Studi') }}</label>

                            <div class="col-md-6">
                                <input id="study_program" placeholder="Program Studi" type="text" class="form-control @error('study_program') is-invalid @enderror" name="study_program" value="{{ old('study_program') }}" required autocomplete="study_program" autofocus>

                                @error('study_program')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="system_access" class="col-md-4 col-form-label text-md-end">{{ __('Frekuensi Mengakses Sistem Digital Repository (Dalam 1 Bulan)') }}</label>

                        <div class="col-md-6">
                                <input id="system_access" placeholder="<4/4-6/7-9/10-12/>12" type="text" class="form-control @error('system_access') is-invalid @enderror" name="system_access" value="{{ old('system_access') }}" required autocomplete="system_access" autofocus>

                                @error('system_access')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
