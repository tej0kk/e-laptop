<?php

namespace App\Http\Controllers;

use App\Models\BannerDua;
use App\Models\BannerSatu;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        return view('banner.index');
    }

    public function create($angka)
    {
        // return $angka;
        return view('banner.create', compact('angka'));
    }


    public function store(Request $request)
    {
        if($request->angka == 'satu')
        {
            return 'Saya akan menambahkan data pada tabel banner satu';
            // BannerSatu::create();
        }else{
            // BannerDua::create();
            return 'Saya akan menambahkan data pada tabel banner dua';
        }
        // return redirect('/banner');
    }

    public function show(BannerSatu $bannerSatu)
    {
        //
    }

    public function edit(BannerSatu $bannerSatu)
    {
        //
    }

    public function update(Request $request, BannerSatu $bannerSatu)
    {
        //
    }

    public function destroy(BannerSatu $bannerSatu)
    {
        //
    }
}
