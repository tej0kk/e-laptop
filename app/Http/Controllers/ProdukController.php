<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;
        if (isset($q)) {
            $produk = Produk::where('nama', 'like', '%' . $q . '%')
                ->paginate(5);
        } else {
            $produk = Produk::paginate(5);
        }
        // return $merek;
        return view('produk.index', compact('produk', 'q'));
    }

    public function create()
    {
        $merek = Merek::all();
        return view('produk.create', compact('merek'));
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate(
            [
                'merek_id' => 'required',
                'nama' => 'required|min:3|max:70',
                'harga' => 'required|numeric',
                'spesifikasi' => 'required',
                'stok' => 'required|numeric',
                'foto' => 'required',
            ],
            [
                'merek_id.required' => 'Silahkan pilih merek 😇',
                'nama.required' => 'Silahkan isi nama produk 😇',
                'nama.min' => 'Nama produk terlalu pendek 😇',
                'nama.max' => 'Nama produk terlalu panjang 😇',
                'harga.required' => 'Silahkan isi harga produk 😇',
                'harga.numeric' => 'Silahkan masukkan harga yang sesuai 😇',
                'spesfikasi.required' => 'Silahkan isi spesifikasi produk 😇',
                'stok.required' => 'Silahkan isi stok produk 😇',
                'stok.numeric' => 'Silahkan masukkan stok yang sesuai 😇',
                'foto.required' => 'Silahkan isi foto produk 😇',
            ]
        );

        $image = $request->file('foto');
        $fotoName = time() . '-' . rand() . '-' . $image->getClientOriginalName();
        $image->move(public_path('assets/images/produk/'), $fotoName);

        Produk::create([
            'merek_id' => $request->merek_id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'spesifikasi' => $request->spesifikasi,
            'stok' => $request->stok,
            'foto' => $fotoName,
            'rekomendasi' => $request->has('rekomendasi') ? $request->rekomendasi : 'tidak' //ternary operator
        ]);

        return redirect('/produk')->with('success', $request->nama. ' Berhasil ditambahkan');
    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        //
    }

    public function update(Request $request, Produk $produk)
    {
        return redirect('/produk')->with('success', $produk->nama. ' Berhasil diubah');
    }

    public function destroy(Produk $produk)
    {
        return redirect('/produk')->with('success', $produk->nama. ' Berhasil dihapus');
    }
}
