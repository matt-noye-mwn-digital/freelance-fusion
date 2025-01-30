<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminTodoList;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){

        $todos = AdminTodoList::where('status', '!=', 'completed')->orderBy('due_date', 'asc')->paginate(20);


        return view('admin.pages.dashboard', compact('todos'));
    }
}
