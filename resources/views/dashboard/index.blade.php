@extends('layouts.masterlayout')

@section('title')
    Resep 
@endsection

@section('content')
    <div class="row">
        @foreach ($reseps as $item)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url($item->img)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><small class="text-muted">Posted By {{ $item->user->name }}</small></p>
                            <h5 class="card-title mb-4"><a href="{{ route('findbyid', $item->id) }}" value="">{{$item->judul}}</a></h5>
                            <p class="card-text">{{Str::limit($item->deskripsi, 50)}}</p>
                        </div>
                </div>
                
            </div>
        @endforeach

    </div>
@endsection