<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $data = Student::where('nama', 'like', '%' . request('search') . '%')->get();
        } else {
            $data = Student::orderBy('nama', 'asc')->get();
        }
        return view('home', compact('data'));
    }

    public function create()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'ttl' => 'required|date',
            'sekolah' => 'required|min:3',
            'keterangan' => 'required|string',
        ], [
            'nama.required' => 'Kolom nama wajib diisi',
            'ttl.required' => 'Kolom tempat tanggal lahir wajib diisi',
            'ttl.date' => 'Format tanggal lahir tidak valid',
            'sekolah.required' => 'Kolom sekolah wajib diisi',
            'keterangan.required' => 'Kolom keterangan wajib diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'ttl' => $request->input('ttl'),
            'sekolah' => $request->input('sekolah'),
            'keterangan' => $request->input('keterangan'),
        ];

        Student::create($data);
        return redirect()->route('home')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'ttl' => 'required|date',
            'sekolah' => 'required|min:3',
            'keterangan' => 'required|string',
        ], [
            'nama.required' => 'Kolom nama wajib diisi',
            'nama.min' => 'Kolom nama minimal harus 3 karakter',
            'ttl.required' => 'Kolom tempat tanggal lahir wajib diisi',
            'ttl.date' => 'Format tanggal lahir tidak valid',
            'sekolah.required' => 'Kolom sekolah wajib diisi',
            'sekolah.min' => 'Kolom sekolah minimal harus 3 karakter',
            'keterangan.required' => 'Kolom keterangan wajib diisi',
            'keterangan.string' => 'Kolom keterangan harus berupa teks',
        ]);
    
        $student = Student::findOrFail($id);
        $student->update($request->all());
    
        return redirect()->route('home')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('home')->with('success', 'Data berhasil dihapus.');
    }
}
