<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
	/**
	 * Display a listing of the users
	 *
	 * @return View
	 */
    public function index()
    {
        return view('users.index', ['users' => User::query()->paginate(15)]);
    }
    public function create(){
    	return view('users.create');
    }
    public function store(Request $request){
    	$data = $request->validate([
		                               'name' => ['required', 'string', 'max:255'],
		                               'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
		                               'password' => ['required', 'string', 'min:8'],
	                               ]);
    	User::factory()->create([
		                            'name' => $data['name'],
		                            'email' => $data['email'],
		                            'password' => Hash::make($data['password']),
	                            ]);
    	return $this->index();
    }
}
