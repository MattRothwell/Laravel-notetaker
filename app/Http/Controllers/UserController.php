<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Image;
use Storage;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            // The user is logged in
            if(Auth::User()->admin == '1')
            {
                // The user is an admin user 
                $users = User::All();
                return view('user.index')->with('users', $users);
            } else { 
                return redirect()->action('HomeController@index');
            }
            
        }else
        {
            return redirect()->action('HomeController@index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
            // The user is logged in
            if(Auth::User()->admin == '1')
            {
                // The user is an admin user 
                return view('user.create');
            } else {
                return 'Permission Denied'; 
            }
            
        }else
        {
            return redirect()->action('HomeController@index');
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        //Validation
        $this->validate($data, array(
                'username' => 'bail|required|unique:users|max:20',
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'admin' => 'max:1'
            ));

        //if data is valid then user can be created
        User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'admin' => $data['admin'],
        ]);

        $users = User::All();
        return view('user.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (Auth::check()) {
            // The user is logged in
            $image = Storage::get(Auth::User()->profilepic);
            return view('user.account', ['user' => Auth::User()]);
        }else
        {
            return redirect()->action('HomeController@index');
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', $id)->first();
        echo $user;
        return view('user.edit', ['user' => $user]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $this->validate($request, array(
                'username' => 'bail|required|max:20',
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'email' => 'required|email',
            ));

        echo $request->profilepic;
        //once fields have been validated the user information can be upated
        $user = Auth::User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        
        if ($request->hasFile('profilepic'))
        {
            $image = $request->file('profilepic');
            $filename = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('local')->put($filename, $image);
            $user->profilepic = $filename;
        }
        $user->save();
        return redirect()->action('UserController@show', ['user' => $user->username]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'User Deleted');
        return redirect()->route('user.index');
    }

    public function colleagues(Request $request)
    {
        $search = $request->get('search', ''); //<-- we use global request to get the param of URI
        $users = User::SearchByKeyword($search)->get();
        return view('user.colleagues', ['users' => $users]);
    }
}
