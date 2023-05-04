<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Role, Department};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.register', ['roles' => $role, 'departments' => $departments]);
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
     * Userlogin
     * 
     * @param Request $request
     * @return view Home // view welcome
     */
    public function login(Request $request)
{
    $user = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if (Auth::attempt($user)) {
        Auth::login(Auth::user());
        return redirect()->route('home');
    } else {
        return redirect()->route('welcome')->withErrors([
            'email' => 'Die Anmeldeinformationen sind ungültig.',
        ]);
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

    /**
     * Holt daten fürs eigene Userpanel 
     * 
     * @param Request $request
     * @return view Userpanel / $user / $deparment
     */
    public function panel(Request $request){
        
        $department = Department::find(Auth::user()->department_id);
        return view('user.panel', ['department' => $department]);
    }

    /**
     * Holt alle Userdaten für Admin Übersicht
     * 
     * @return view / $user -> Usersession / $users -> alle Userdaten 
     */
    public function all(){
        $users = User::all();
        return view('admin.all', ['users' => $users]);

    }
}
