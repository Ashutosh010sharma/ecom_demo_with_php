<?php

namespace App\Controllers;
use App\Models\User;


class AdminDashboardController extends BaseController
{
    public function index()
    {   
        
        return view('admin_dashboard/dashboard');
    }
    public function users()
    {   
        $model=new User();
        $users= $model->findAll();
        return view('admin_dashboard/users',['users'=>$users]);
    }

}