<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman form kontak.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Menyimpan pesan dari form kontak ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan data ke tabel 'contacts'
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // 3. Redirect kembali ke halaman kontak dengan pesan sukses
        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
