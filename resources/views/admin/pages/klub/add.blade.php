@extends('admin.layouts.base')
@section('title','Tambah Klub Baru')
@section('content')

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Klub</h6>

    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form method="POST" action="{{url('/klub/add')}}" autocomplete="off" class="@if($errors->any()) needs-validation was-validated @endif" novalidate>
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input_name">Name :</label>
                    <input type="text" name="name" class="form-control" id="input_name" placeholder="Masukan nama" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="input_city">Kota :</label>
                    <input type="text" name="city" class="form-control" id="input_city" placeholder="Masukan kota" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Tambahkan</button>
            <a href="{{url('/klub')}}" class="btn btn-light">Kembali</a>
            </form>
    </div>
</div>

@endsection
