<?php

namespace App\Http\Controllers;

use App\Models\Selamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Selamat::all();
        return view('selamat', compact('messages'));
    }

    // Kirim ucapan baru (user biasa)
    // MessageController.php
    public function sendMessage(Request $request)
    {
        try {
            DB::table('selamat')->insert([
                'nama_pengirim' => $request->nama_pengirim,
                'pesan' => $request->message,
                'created_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Ucapan berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // Balas ucapan (Devina)
    public function replyMessage(Request $request, $id)
    {
        DB::table('selamat')
            ->where('id', $id)
            ->update(['balasan' => $request->reply, 'updated_at' => now()]);

        return redirect()->back()->with('success', 'Balasan berhasil dikirim!');
    }
}
