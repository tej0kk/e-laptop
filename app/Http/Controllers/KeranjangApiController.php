<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = Keranjang::all();
        return response()->json([
            'status' => true,
            'message' => 'data keranjang',
            'data' => $keranjang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required',
            'banyak' => 'required|numeric'
        ]);
        $produk = Produk::where('id', $request->produk_id)->first();
        if ($produk->stok < $request->banyak) {
            return response()->json([
                'status' => false,
                'message' => 'gagal menambahkan keranjang',
                'data' => $produk
            ]);
        }

        $isiKeranjang = Keranjang::where('produk_id', $request->produk_id)->first();
        if ($isiKeranjang) {
            $total_harga = $request->banyak * $produk->harga;
            $keranjang = Keranjang::find($isiKeranjang->id)->update([
                'banyak' => $isiKeranjang->banyak + $request->banyak,
                'total_harga' => $isiKeranjang->total_harga + $total_harga
            ]);
            Produk::find($request->produk_id)->update(['stok' => $produk->stok - $request->banyak]);

            return response()->json([
                'status' => true,
                'message' => 'berhasil menambahkan keranjang',
                'data' => $keranjang
            ]);
        } else {
            $total_harga = $request->banyak * $produk->harga;
            $keranjang = Keranjang::create([
                'produk_id' => $request->produk_id,
                'banyak' => $request->banyak,
                'total_harga' => $total_harga
            ]);
            Produk::find($request->produk_id)->update(['stok' => $produk->stok - $request->banyak]);
            return response()->json([
                'status' => true,
                'message' => 'berhasil menambahkan keranjang',
                'data' => $keranjang
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
