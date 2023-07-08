@extends('layouts.masterlayout')

@section('content')
    <a href="{{ route('resep.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="text-center">
        <img src="{{ url($resep->img) }}" class="rounded" alt="..." width="600">
    </div>
        <h2>{{ $resep->judul }}</h2>
        <p>{{ $resep->deskripsi }}</p><br>
        <h2>Bahan Bahan</h2>
        <p>{{ $resep->bahan }}</p><br>
        <h2>Langkah - Langkah</h2>
        <p>{{ $resep->langkah }}</p>

@endsection