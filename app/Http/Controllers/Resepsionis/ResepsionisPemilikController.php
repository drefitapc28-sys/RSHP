<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResepsionisPemilikController extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select(
                'pemilik.idpemilik',
                'user.nama',
                'user.email',
                'pemilik.no_wa',
                'pemilik.alamat',
                'pemilik.iduser'
            )
            ->orderBy('pemilik.idpemilik', 'ASC')
            ->get();

        return view('resepsionis.pemilik.index', compact('pemilik'));
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('resepsionis.pemilik.create');
    }

    /**
     * STORE (FINAL – tanpa ubah database)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|min:3|max:100',
            'email'    => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'no_wa'    => 'required|string|min:10|max:15',
            'alamat'   => 'required|string|min:5',
        ]);

        try {
            DB::beginTransaction();

            $lastIdPemilik = DB::table('pemilik')
                ->lockForUpdate()
                ->max('idpemilik');

            $newIdPemilik = $lastIdPemilik ? $lastIdPemilik + 1 : 1;


            $iduser = DB::table('user')->insertGetId([
                'nama'     => ucwords(strtolower(trim($validated['nama']))),
                'email'    => strtolower(trim($validated['email'])),
                'password' => Hash::make($validated['password']),
            ]);


            DB::table('pemilik')->insert([
                'idpemilik' => $newIdPemilik,
                'iduser'    => $iduser,
                'no_wa'     => $validated['no_wa'],
                'alamat'    => $validated['alamat'],
            ]);


            $idRolePemilik = DB::table('role')
                ->where('nama_role', 'Pemilik')
                ->value('idrole');

            if ($idRolePemilik) {
                DB::table('role_user')->insert([
                    'iduser' => $iduser,
                    'idrole' => $idRolePemilik,
                    'status' => 1,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('resepsionis.pemilik.index')
                ->with('success', 'Pemilik berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal menambahkan pemilik: ' . $e->getMessage());
        }
    }

    /**
     * EDIT
     */
    public function edit($id)
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->where('pemilik.idpemilik', $id)
            ->select(
                'pemilik.idpemilik',
                'pemilik.iduser',
                'user.nama',
                'user.email',
                'pemilik.no_wa',
                'pemilik.alamat'
            )
            ->first();

        if (!$pemilik) {
            return redirect()->route('resepsionis.pemilik.index')
                ->with('error', 'Data pemilik tidak ditemukan.');
        }

        return view('resepsionis.pemilik.edit', compact('pemilik'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_wa'  => 'required|string|min:10|max:15',
            'alamat' => 'required|string|min:5',
        ]);

        try {
            DB::table('pemilik')
                ->where('idpemilik', $id)
                ->update([
                    'no_wa'  => $validated['no_wa'],
                    'alamat' => $validated['alamat'],
                ]);

            return redirect()
                ->route('resepsionis.pemilik.index')
                ->with('success', 'Data pemilik berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * DESTROY
     */
    public function destroy($id)
    {
        try {
            $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();

            if (!$pemilik) {
                return back()->with('error', 'Data pemilik tidak ditemukan.');
            }

            $hasPet = DB::table('pet')->where('idpemilik', $id)->exists();
            if ($hasPet) {
                return back()->with('error', 'Pemilik tidak dapat dihapus karena masih memiliki hewan.');
            }

            DB::beginTransaction();

            DB::table('role_user')->where('iduser', $pemilik->iduser)->delete();
            DB::table('pemilik')->where('idpemilik', $id)->delete();
            DB::table('user')->where('iduser', $pemilik->iduser)->delete();

            DB::commit();

            return redirect()
                ->route('resepsionis.pemilik.index')
                ->with('success', 'Pemilik berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus pemilik: ' . $e->getMessage());
        }
    }
}
