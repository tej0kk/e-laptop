<?php

namespace App\Http\Controllers;

use App\Models\BannerDua;
use App\Models\BannerSatu;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index($angka, Request $request)
    {
        $q = $request->q;
        if ($angka == 'satu') {
            if (isset($q)) {
                $banner = BannerSatu::where('status', 'like', '%' . $q . '%')
                    ->paginate(5);
            } else {
                $banner = BannerSatu::paginate(5);
            }
        } else if ($angka == 'dua') {
            if (isset($q)) {
                $banner = BannerDua::where('status', 'like', '%' . $q . '%')
                    ->paginate(5);
            } else {
                $banner = BannerDua::paginate(5);
            }
        } else {
            return redirect()->back();
        }
        return view('banner.index', compact('banner', 'angka', 'q'));
    }

    public function create($angka)
    {
        if ($angka == 'satu' || $angka == 'dua') {
            return view('banner.create', compact('angka'));
        } else {
            return redirect()->back();
        }
    }

    public function store($angka, Request $request)
    {
        $request->validate([
            'gambar' => 'required',
        ]);
        if ($angka == 'satu') {
            //memasukkan foto


            BannerSatu::create([
                'gambar' => $request->gambar,
                'status' => $request->has('status') ? $request->status : 'hide'
            ]);
            return redirect('/banner');
        } else if ($angka == 'dua') {
            //memasukkan foto


            BannerDua::create([
                'gambar' => $request->gambar,
                'status' => $request->has('status') ? $request->status : 'hide'
            ]);
            return redirect('/banner');
        } else {
            return redirect()->back();
        }
        // return redirect('/banner');
    }

    public function edit($id, $angka)
    {
        if ($angka == 'satu') {
            $banner = BannerSatu::where('id', $id)->first();
        } else if ($angka == 'dua') {
            $banner = BannerDua::where('id', $id)->first();
        } else {
            return redirect()->back();
        }
        return view('banner.edit', compact('banner', 'angka'));
    }

    public function update(Request $request, $id, $angka)
    {
        if ($angka == 'satu') {
            //menyimpan foto


            BannerSatu::where('id', $id)->update([]);
            return redirect('/banner/satu');
        } else if ($angka == 'dua') {
            //menyimpan foto


            BannerDua::where('id', $id)->update([]);
            return redirect('/banner/dua');
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id, $angka)
    {
        if($angka == 'satu'){
            $banner = BannerSatu::where('id', $id)->first();
            //hapus foto
            if (file_exists(public_path('assets/images/banner/' . $banner->logo))) {
                unlink(public_path('assets/images/banner/' . $banner->logo));
            }
            BannerSatu::destroy($id);
        }
        else if($angka == 'dua'){
            //hapus foto

            BannerDua::destroy($id);
        }
        return redirect('/banner/'. $angka);
    }
}
