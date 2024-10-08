@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('create user') }}</h1>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Nama') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Nama') }}" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label for="stage">{{ __('Status') }}</label>
                        <input type="text" class="form-control" id="stage" placeholder="{{ __('Mahasiswa/Dosen') }}" name="stage" value="{{ old('stage') }}" />
                    </div>
                    <div class="form-group">
                        <label for="nim_nidn_nik">{{ __('NIM/NIDN/NIK') }}</label>
                        <input type="text" class="form-control" id="nim_nidn_nik" placeholder="{{ __('NIM/NIDN/NIK') }}" name="nim_nidn_nik" value="{{ old('nim_nidn_nik') }}" />
                    </div>
                    <div class="form-group">
                        <label for="study_program">{{ __('Program Studi') }}</label>
                        <input type="text" class="form-control" id="study_program" placeholder="{{ __('Program Studi') }}" name="study_program" value="{{ old('study_program') }}" />
                    </div>
                    <div class="form-group">
                        <label for="system_access">{{ __('rekuensi Mengakses Sistem Digital Repository (Dalam 1 Bulan)') }}</label>
                        <input type="text" class="form-control" id="system_access" placeholder="{{ __('<4/4-6/7-9/10-12/>12') }}" name="system_access" value="{{ old('system_access') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="text" class="form-control" id="password" placeholder="{{ __('Password') }}" name="password" value="{{ old('password') }}" required />
                    </div>
                    <div class="form-group">
                        <label for="roles">{{ __('Role') }}</label>
                        <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                            @foreach($roles as $id => $roles)
                                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($role) && $role->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection