<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    // tampilkan data
    public function index()
    {
        // $data_barang = DB::table('data_barang')->get();
        $data_barang = DB::table('data_barang')->paginate(3);
        return view('crud', ['data' => $data_barang]);
    }

    // tambah data
    public function tambah()
    {
        return view('crud-tambah');
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'kode' => 'required|max:10|min:3',
                'barang' => 'required|max:100|min:5'
            ],
            [
                // pesan
                'kode.required' => 'Kode Barang Harus Di Isi',
                'kode.min' => 'Kode Barang Minimal 3 Karakter',
                'kode.max' => 'Kode Barang Maksimal 10 Karakter',
                'barang.required' => 'Nama Barang Harus Di Isi',
                'barang.min' => 'Nama Barang Minimal 5 Karakter',
                'barang.max' => 'Nama Barang Maksimal 100 Karakter'
            ]
        );
    }

    public function simpan(Request $request)
    {

        // $validation = $request->validate(
        //     [
        //         'kode' => 'required|max:10|min:3',
        //         'barang' => 'required|max:100|min:5'
        //     ],
        //     [
        //         // pesan
        //         'kode.required' => 'Kode Barang Harus Di Isi',
        //         'kode.min' => 'Kode Barang Minimal 3 Karakter',
        //         'kode.max' => 'Kode Barang Maksimal 10 Karakter',
        //         'barang.required' => 'Nama Barang Harus Di Isi',
        //         'barang.min' => 'Nama Barang Minimal 5 Karakter',
        //         'barang.max' => 'Nama Barang Maksimal 100 Karakter'
        //     ]
        // );
        $this->_validation($request);
        // dd($request->all());
        // DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode, $request->barang]);

        // querybuilder

        DB::table('data_barang')->insert([
            ['kode_barang' => $request->kode, 'nama_barang' => $request->barang],
            // ['kode_barang' => $request->kode . 'hahaha', 'nama_barang' => $request->barang . 'hahaha'],
        ]);

        return redirect()->route('crud')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function hapus($id)
    {
        // echo $id;
        DB::table('data_barang')->where('id', '=', $id)->delete();
        return redirect()->back()->with('Success', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data_barang = DB::table('data_barang')->where('id', '=', $id)->first();
        return view('crud-edit', ['data' => $data_barang]);
    }

    public function update(Request $request, $id)
    {

        // $validation = $request->validate(
        //     [
        //         'kode' => 'required|max:10|min:3',
        //         'barang' => 'required|max:100|min:5'
        //     ],
        //     [
        //         // pesan
        //         'kode.required' => 'Kode Barang Harus Di Isi',
        //         'kode.min' => 'Kode Barang Minimal 3 Karakter',
        //         'kode.max' => 'Kode Barang Maksimal 10 Karakter',
        //         'barang.required' => 'Nama Barang Harus Di Isi',
        //         'barang.min' => 'Nama Barang Minimal 5 Karakter',
        //         'barang.max' => 'Nama Barang Maksimal 100 Karakter'
        //     ]
        // );

        $this->_validation($request);
        // dd($request->all());
        DB::table('data_barang')->where('id', '=', $id)->update([
            'kode_barang' => $request->kode,
            'nama_barang' => $request->barang
        ]);
        return redirect()->route('crud')->with('Success', 'Data Berhasil Di Perbarui');
    }
}
