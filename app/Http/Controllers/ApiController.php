<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BannerDua;
use App\Models\BannerSatu;
use App\Models\Merek;
use App\Models\Pengiriman;
use App\Models\Produk;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function merek()
    {
        $merek = Merek::all();
        return response()->json([
            'status' => true,
            'message' => 'ini adalah data merek',
            'data' => $merek
        ]);
    }

    public function produk()
    {
        $produk = Produk::with('merek')->get();
        return response()->json([
            'status' => true,
            'message' => 'ini adalah data produk',
            'data' => $produk
        ]);
    }

    public function bank()
    {
        $bank = Bank::all();
        return response()->json([
            'status' => true,
            'message' => 'ini adalah data bank',
            'data' => $bank
        ]);
    }

    public function pengiriman()
    {
        $pengiriman = Pengiriman::all();
        return response()->json([
            'status' => true,
            'message' => 'ini adalah data pengiriman',
            'data' => $pengiriman
        ]);
    }

    public function bannerSatu()
    {
        $banner1 = BannerSatu::all();
        return response()->json([
            'status' => true,
            'message' => 'ini adalah data banner satu',
            'data' => $banner1
        ]);
    }

    public function bannerDua()
    {
        $banner2 = BannerDua::all();
        return response()->json([
            'status' => true,
            'message' => 'ini adalah data banner dua',
            'data' => $banner2
        ]);
    }
}
