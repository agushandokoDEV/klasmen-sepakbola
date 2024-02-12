@extends('admin.layouts.base')
@section('title','Input Skor')
@section('content')

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Input Skor</h6>

    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form method="POST" action="{{url('/skor/add')}}" autocomplete="off" class="@if($errors->any()) needs-validation was-validated @endif" novalidate>
            @csrf

            @foreach ($list as $item)
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="input_skore_{{$item->home_club_id}}">{{$item->homeclub->name}} :</label>
                        <input type="number" min="0" name="match[{{$item->id}}][home_club_{{$item->home_club_id}}]" class="form-control" id="input_skore_{{$item->home_club_id}}" placeholder="Skor" value="{{$item->home_score}}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-2">
                        <label>&nbsp;</label>
                        <label class="form-control text-center" style="border: 0;">VS</label>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="input_skore_{{$item->away_club_id}}">{{$item->awayclub->name}} :</label>
                        <input type="number" min="0" name="match[{{$item->id}}][away_club_{{$item->away_club_id}}]" class="form-control" id="input_skore_{{$item->away_club_id}}" placeholder="Skor" value="{{$item->away_score}}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{url('/skor')}}" class="btn btn-light">Kembali</a>
            </form>
    </div>
</div>

@endsection
