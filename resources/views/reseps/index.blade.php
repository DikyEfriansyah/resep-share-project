@extends('layouts.masterlayout')

@section('title')
    MyResep
@endsection

@section('content')
    <a href="{{ route('create.resep') }}" class="btn btn-primary">Create</a>
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Bahan</th>
            <th scope="col">Langkah</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($resep as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->bahan }}</td>
                <td>{{ $item->langkah }}</td>
                <td><img src="{{ url($item->img) }}" alt="" width="75" height="55"></td>
                <td>
                    <form action="{{ route('myresep.delete', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
              </tr>
          @empty
              <tr>
                <td colspan="6" class="text-center p-5">
                    Data tidak tersedia
                </td>
              </tr>
          @endforelse
        </tbody>
      </table>
@endsection