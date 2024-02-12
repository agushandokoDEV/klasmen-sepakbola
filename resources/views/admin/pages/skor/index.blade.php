@extends('admin.layouts.base')
@section('title','Daftar Skor')
@section('content')

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Skor</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <a class="btn btn-link" href="{{url('/skor/add')}}">Update Skor</a>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="list_data" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Home</th>
                        <th>Away</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!$list->isEmpty())
                        @foreach ($list as $item)
                            <tr>
                                <td>{{$item->homeclub->name}} @if($item->home_score >= 0) <span class="badge badge-success">{{$item->home_score}}</span> @endif</td>
                                <td>{{$item->awayclub->name}} @if($item->away_score >= 0) <span class="badge badge-danger">{{$item->away_score}}</span> @endif</td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td class="text-center" colspan="2">No data</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
