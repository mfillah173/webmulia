<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SyaratPendaftaran;
use Illuminate\Http\Request;

class SyaratPendaftaranController extends Controller
{
    public function index()
    {
        $syaratPendaftaran = SyaratPendaftaran::orderBy('jenjang', 'asc')
            ->orderBy('urutan', 'asc')
            ->paginate(10);
        return view('admin.syarat-pendaftaran.index', compact('syaratPendaftaran'));
    }

    public function create()
    {
        return view('admin.syarat-pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenjang' => 'required|in:kindergarten,primary',
            'nama_syarat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'urutan' => 'required|integer|min:0'
        ]);

        SyaratPendaftaran::create($request->all());

        return redirect()->route('admin.syarat-pendaftaran.index')->with('success', 'Syarat pendaftaran berhasil ditambahkan.');
    }

    public function show(SyaratPendaftaran $syaratPendaftaran)
    {
        return view('admin.syarat-pendaftaran.show', compact('syaratPendaftaran'));
    }

    public function edit(SyaratPendaftaran $syaratPendaftaran)
    {
        return view('admin.syarat-pendaftaran.edit', compact('syaratPendaftaran'));
    }

    public function update(Request $request, SyaratPendaftaran $syaratPendaftaran)
    {
        $request->validate([
            'jenjang' => 'required|in:kindergarten,primary',
            'nama_syarat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'urutan' => 'required|integer|min:0'
        ]);

        $syaratPendaftaran->update($request->all());

        return redirect()->route('admin.syarat-pendaftaran.index')->with('success', 'Syarat pendaftaran berhasil diperbarui.');
    }

    public function destroy(SyaratPendaftaran $syaratPendaftaran)
    {
        $syaratPendaftaran->delete();

        return redirect()->route('admin.syarat-pendaftaran.index')->with('success', 'Syarat pendaftaran berhasil dihapus.');
    }

    public function toggleStatus(SyaratPendaftaran $syaratPendaftaran)
    {
        $syaratPendaftaran->update([
            'status' => $syaratPendaftaran->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->back()->with('success', 'Status syarat pendaftaran berhasil diubah.');
    }
}
