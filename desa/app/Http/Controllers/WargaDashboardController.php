<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Complaint;
use App\Models\Letter;
use App\Models\News;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $letters = Letter::query()->where('user_id', $user->id)->orderByDesc('created_at')->limit(5)->get();
        $complaints = Complaint::query()->where('user_id', $user->id)->orderByDesc('created_at')->limit(5)->get();
        $budgets = Budget::query()->orderBy('category')->get();
        $news = News::query()->orderByDesc('published_at')->limit(3)->get();

        return view('warga.dashboard', compact('letters', 'complaints', 'budgets', 'news'));
    }

    public function complaintsCreate()
    {
        return view('warga.complaints.create');
    }

    public function complaintsStore(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('complaints', 'local');
        }

        Complaint::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'photo_path' => $photoPath,
        ]);

        return redirect()->route('warga.dashboard')->with('success', 'Laporan berhasil dikirim.');
    }
}
