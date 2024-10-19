<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Task;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();
        $upcomingAppointments = Appointment::where('start', '>=', Carbon::today())->count();
        $revenueThisMonth = 10000; 
        $tasksPending = Task::where('status', 'pending')->count();

        return view('dashboard.index', [
            'totalPatients' => $totalPatients,
            'upcomingAppointments' => $upcomingAppointments,
            'revenueThisMonth' => $revenueThisMonth,
            'tasksPending' => $tasksPending,
        ]);
    }
}
