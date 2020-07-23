<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $users = User::where('role_id', 2)->orWhere('role_id', 3)->get();
        return view('admin', ['users' => $users]);
    }

    public function editor()
    {
        $users = User::where('role_id', 2)->where('status', 'Active')->get();
        return view('editor', ['users' => $users]);
    }

    public function deactivate($id){
        $user = User::find($id);
        $user->status = 'Inactive';
        $user->save();

        return redirect()->back();
    }

    public function activate($id){
        $user = User::find($id);
        $user->status = 'Active';
        $user->save();

        return redirect()->back();
    }

    public function delete($id){
        $user = User::destroy($id);

        return redirect()->back();
    }
}
