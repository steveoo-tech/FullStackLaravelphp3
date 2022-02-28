<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator, Input, Redirect; 
use App\Models\User;


class HomeController extends Controller{

    // Home page.
    public function index() {
        // Send content to welcome view.
        return view('/home/index', [
             'pageTitle'=>'welcome'
        ]);
    }
    // Displays login form.
    public function login() {
        return view('/home/login');
    }
    // Logs person in.
    public function submitLogin(Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->except(['_token']);
        $user = User::where('name',$request->name)->first();
        if (auth()->attempt($credentials)) {
            return redirect('/');
        } else{
            return back()->with('error',
            'An error occurred during login. Please try again.');
        }
    }
    // Displays registration form.
    public function register() {
        // $todos = Todo::orderBy('created_at', 'asc')->get();
    
        // Send content to welcome view.
        return view('/home/register', [
             'pageTitle'=>'Registration'
        ]);
    }
    // Accepts POST of new user data.
    public function store(Request $request) {   
        $request->validate([
            'name' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 
                        'unique:users'],
            'password' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'firstName' => trim($request->input('firstName')),
            'lastName' => trim($request->input('lastName')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'role'=>trim($request->input('role')),
        ]);
        return back()->with('success','Item created successfully!');
        return redirect('/');
    }   
    
    // Logs user out.
    public function logout()
    {

        \Auth::logout();
        return back()->with('success','you are successfully logged out!');
        return redirect('/home/login');
    }

    public function getUserName() {
             $user = auth()->user(); // Get current user object.
         return $user->name;
         }

        
        public function profile() {
            $user = auth()->user();
            return view('/home/profile', [
                'username' => "$user->name",
                'firstName'=> "$user->firstName",
                'lastName'=> "$user->lastName",
                'email'=> "$user->email"
            ]);
        }

        public function secureArea() {
             return view('/home/secureArea', [
             'pageTitle'=>'Secure Area'
             ]);
            }


            public function adminArea() { 
                    auth()->user()->checkAccess(['admin']);
                
                    return view('/home/adminArea', [
                    'pageTitle'=>'Admin'
                     ]);
                }
                
                public function staffArea() {
                 $userName = $this->getUserName();
                auth()->user()->checkAccess(['admin', 'staff']); 
                // allow 2 roles access
                
                return view('/home/staffArea', [
                 'pageTitle'=>'Staff'
                     ]);
                }
    
 }

