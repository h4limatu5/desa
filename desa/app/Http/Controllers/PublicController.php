<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Umkm;
use App\Models\Budget;

class PublicController extends Controller
{
    public function home()
    {
        $news = News::query()->orderByDesc('published_at')->limit(3)->get();
        $umkms = Umkm::query()->where('is_public', true)->limit(6)->get();

        return view('public.home', compact('news', 'umkms'));
    }

    public function profile()
    {
        return view('public.profile');
    }

    public function newsIndex()
    {
        $news = News::query()->orderByDesc('published_at')->paginate(6);

        return view('public.news.index', compact('news'));
    }

    public function newsShow(News $news)
    {
        return view('public.news.show', compact('news'));
    }

    public function umkmIndex()
    {
        $umkms = Umkm::query()->where('is_public', true)->paginate(12);

        return view('public.umkm.index', compact('umkms'));
    }

    public function umkmShow(Umkm $umkm)
    {
        return view('public.umkm.show', compact('umkm'));
    }

    public function budgetIndex()
    {
        $budgets = Budget::query()->orderBy('category')->get();
        $totalBudget = $budgets->sum('allocated');
        $totalActual = $budgets->sum('spent');

        return view('public.budgets.index', compact('budgets', 'totalBudget', 'totalActual'));
    }
}
