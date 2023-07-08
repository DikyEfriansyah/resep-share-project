<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResepController extends Controller
{
    public function resep_index(){
        $reseps = Resep::orderBy('created_at', 'DESC')->get();

        return view('dashboard.index')->with(['reseps' => $reseps]);
    }

    public function myresep_index(){
        $resep = Resep::where('user_id', Auth::user()->id)->get();

        return view('reseps.index')->with(['resep' => $resep]);
    }

    public function create_resep(){
        return view('reseps.create');
    }

    public function store_myresep(Request $request){
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'img' => 'required|image'
        ]);

        $data = new Resep([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'bahan' => $request->bahan,
            'langkah' => $request->langkah,
            'img' => $request->file('img')->store('assets/resep', 'public'),
            'user_id' => Auth::user()->id
        ]);

        $data->save();

        return redirect()->route('myresep')->with('success', 'Data berhasil ditambahkan');

    }

    public function find($id){
        $resep = Resep::findOrFail($id);

        return view('dashboard.view')->with(['resep' => $resep]);
    }

    public function destroy($id){
        $resep = Resep::findOrFail($id);
        $resep->delete();

        return redirect()->route('myresep')->with('success-del', 'Data berhasil dihapus');
    }
}