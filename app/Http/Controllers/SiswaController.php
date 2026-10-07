<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Filter search
        $siswas = Siswa::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_siswa', 'like', "%{$search}%")
                      ->orWhere('nis', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nis'        => 'required|string|unique:siswas|max:20',
            'jurusan'    => 'required|string|max:100',
            'kelas'      => 'required|string|max:50',
            'email'      => 'nullable|email|unique:siswas',
        ]);

        Siswa::create($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nis'        => 'required|string|max:20|unique:siswas,nis,' . $siswa->id,
            'jurusan'    => 'required|string|max:100',
            'kelas'      => 'required|string|max:50',
            'email'      => 'nullable|email|unique:siswas,email,' . $siswa->id,
        ]);

        $siswa->update($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}