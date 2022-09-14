<?php

namespace App\Http\Controllers;

use App\Models\arsip;
use Illuminate\Http\Request;

class arsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::latest()->get();
        return view('arsip.index', compact('arsips'));
    }
    public function cari(Request $request)
    {
        $arsips = Arsip::where('judul', $request->cari)->get();
        return view('arsip.index', compact('arsips'));
    }
    public function create()
    {
        return view('arsip.create');
    }
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'nomor_Surat' => 'required|string|max:155',
            'kategori' => 'required',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ]);
       
        $fileName = time() . '.' . $request->file->extension();

        $request->file->move(public_path('files'), $fileName);

        $arsip = Arsip::create([
            'nomor_Surat' => $request->nomor_Surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'file' => $fileName
        ]);

        if ($arsip) {
            return redirect()->route('arsip.index')->with(['success' => 'Data berhasil diarsipkan']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Data gagal diarsipkan']);
        }
    }
    public function detailArsip($nomorSurat)
    {
        $arsips = Arsip::where('nomor_surat', $nomorSurat)->first();
        return view('arsip.show', compact('arsips'));
    }
    public function download($file)
    {
        return response()->download(public_path('uploads/' . $file));
    }
    public function delete($nomorSurat)
    {
        $arsip = Arsip::where('nomor_surat', $nomorSurat);
        $arsip->delete();
        return redirect()->route('arsip.index')->with(['success' => 'Arsip sudah dihapus']);
    }
}
