<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use App\Post;
use App\Course;
use App\Modules;
use App\subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        //
        if (Auth::User())
        {
            $id = Auth::id();
        $courses = DB::table('courses')->get()->where('userID', $id);
        return view('userdata.courses', ['courses' => $courses]);
        }
        return redirect()->action('HomeController@index');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::User())
        {
            return view('add.course');
        }
        return redirect()->action('HomeController@index'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::User())
        {
            // validate data on Server Side
            $this->validate($request, array(
                    'courseName' => 'required|max:100',
                    'courseYear' => 'required|max:1'
                ));
            
            // Store new course information
            $course = new Course;
            $course->courseName = $request->courseName;
            $course->courseYear = $request->courseYear;
            $course->userID = Auth::id();
            $course->public = $request->public;

            $course->save();

            Session::flash('success', 'New course Successfully added!');

            //redirect to course page
            return redirect()->route('course.show', $course->courseName);
        }
        return redirect()->action('HomeController@index'); 
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
        if (Auth::User())
        {
            $course = DB::table('courses')->where('courseName', $id)->first();
            $courseID = $course->id;
            $courseName = $course->courseName;
            $modules = DB::table('modules')->get()->where('courseID', $courseID);
            return view('userdata.currentcourse', ['course' => $courseName, 'modules' => $modules]);
        }
        return redirect()->action('HomeController@index'); 
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
        //
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
    }

    public function find(Request $request)
    {
        $search = $request->get('search', ''); //<-- we use global request to get the param of URI
        $courses = Course::SearchByKeyword($search)->where('public', 1)->get();
        $courseID = [];
        foreach ($courses as $course) {
            $courseID = array_prepend($courseID, $course->id);
        }
        $modules = Modules::whereIn('courseID', $courseID)->get();
        return view('find', ['courses' => $courses, 'modules' => $modules]);
    }

    public function subscribe()
    {
        echo "subscribe";
        $subscription = new Subscribe;
        $subscription->userID = Auth::id();
        $subscription->courseID = $request->$courseID;
        $subscription->save();
    }
}
