<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Role, Department};
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;

class UserController extends Controller
{
    /**
     * Adminsite to creat new User
     * Get Roles and Departments ID and Name from Database
     * 
     * @return View admin.regist && $roles - $departments
     */
    public function register(){
        $role = Role::all();
        $departments = Department::all();
        $user = session('user');
        return view('admin.register', ['roles' => $role, 'departments' => $departments, 'user' => $user]);
    }

    /**
     * Saves new User to Database 
     * Changes Birthday from DD/MM/YYYY to YYYY/MM/DD
     * 
     * @param Request 
     * @return Route Home
     */
    public function save(Request $request){
        $birthday = Carbon::parse($request->input('birthdate'))->format('Y-m-d');
        $request->merge(['birthdate' => $birthday]);
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'birthdate'=> 'required|date',
                'password'=> 'required|min:6',
                'role_id'=> 'required',
                'department_id'=> 'required'
            ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->password = hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->department_id = $request->department_id;
        $user->save();

        return redirect()->route('home');
        
    }

    /**
     * validates user login data and starts session
     * 
     * @param Request $request
     * @return View Home 
     */
    public function login(Request $request){
        //TODO: ERROR AUSGABE WENN DATEN FALSCH!!!!
        $request->validate(
            [
                'email' => 'required|email',
                'password'=> 'required|min:6'
            ]);
        $user = User::where('email', $request->email)->first();
        if(Hash::check($request->password, $user->password)){
            $request->session()->put('user', $user);
            return redirect()->route('home');
        } 
        
    }
    /**
     * Logout, flush session
     * 
     */
    public function logout(){
        session()->flush();
        return redirect()->route('welcome');
    }
}
