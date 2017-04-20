<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Subject;
use App\Course;
use App\Modules;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //search for users courses
        $search = $request->get('search', ''); //<-- we use global request to get the param of URI
        $courses = Course::SearchByKeyword($search)->where('userID', Auth::id())->get();

        //search for modules based on the course id's given
        $courseID = []; //array to store the course id's
        foreach ($courses as $course) {
            // go through each object retrieved from the database and adding the id into the array
            $courseID = array_prepend($courseID, $course->id);
        }
        $modules = Modules::SearchByKeyword($search)->whereIn('courseID', $courseID)->get();

        //search for subjects based of the module id's given
        $moduleID = [];
        foreach ($modules as $module) {
            // go through each object retrieved from the database and adding the id into the array
            $moduleID = array_prepend($moduleID, $module->id);
        }
        $subjects = Subject::SearchByKeyword($search)->whereIn('moduleID', $moduleID)->get();
        return view('home', ['courses' => $courses, 'modules' => $modules, 'subjects' => $subjects]);
    }
}
