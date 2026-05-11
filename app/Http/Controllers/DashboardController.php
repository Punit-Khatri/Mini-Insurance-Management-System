<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $upcomingPayments = null;

        if (auth()->user()->role === 'admin') {
            
            $upcomingPayments = User::where('policy_id', '!=', null)
            ->with('policy')
            ->get()
            ->filter(function ($user) {
                return $user->policy && $user->policy->payment_due_date >= now() && $user->policy->payment_due_date <= now()->addDays(2);
                });
        } else {
            $upcomingPayments = auth()->user()->policy && auth()->user()->policy->payment_due_date >= now() && auth()->user()->policy->payment_due_date <= now()->addDays(2) ? [auth()->user()] : [];
        }
                
        return view('dashboard', compact('upcomingPayments'));
    }
}
