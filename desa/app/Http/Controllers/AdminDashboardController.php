<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Letter;
use App\Models\Resident;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_residents' => Resident::count(),
            'active_residents' => Resident::where('status_warga', 'Aktif')->count(),
            'inactive_residents' => Resident::where('status_warga', 'Nonaktif')->count(),
            'male_residents' => Resident::where('jenis_kelamin', 'Laki-laki')->count(),
            'female_residents' => Resident::where('jenis_kelamin', 'Perempuan')->count(),
            'pending_letters' => Letter::where('status', 'submitted')->count(),
            'approved_letters' => Letter::where('status', 'approved')->count(),
            'pending_complaints' => Complaint::where('status', 'pending')->count(),
            'resolved_complaints' => Complaint::where('status', 'resolved')->count(),
        ];

        $recentComplaints = Complaint::query()
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentComplaints'));
    }
}
