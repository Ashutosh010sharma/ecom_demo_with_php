<?php

namespace App\Controllers;
use App\Models\User;


class DashboardController extends BaseController
{
    public function user_dashboard()
    {   
        
        return view('dashboard/user_dashboard');
    }

}