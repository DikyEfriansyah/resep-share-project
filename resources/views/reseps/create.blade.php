@extends('layouts.masterlayout')

@section('title')
    Tulis Resepmu
@endsection

@section('content')
    @if($errors->any())
    @foreach ( $errors->all() as $err)
    <p class="alert alert-danger">{{ $err }}</p>
    @endforeach
    @endif
    <form action="{{ route('store.resep') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul"
                name="judul" >
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="bahan">Bahan - Bahan</label>
            <textarea class="form-control" id="bahan" name="bahan" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="langkah">Langkah - Langkah</label>
            <textarea class="form-control" id="langkah" name="langkah" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="img">Upload Foto</label>
            <input type="file" class="form-control-file" accept="image/*" name="img" id="img">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
@endsection