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

        $courseID = []; //array to store the course id's
        $moduleID = []; //arrat to store module id's

        //search for users courses
        $search = $request->get('search', ''); //<-- we use global request to get the param of URI
        $courses = Course::SearchByKeyword($search)->where('userID', Auth::id())->get();
        //search for modules based on the course id's given
        // list of all user courses to then allow search for any of their modules 
        $userCourses = Course::where('userID', Auth::id())->get();
        foreach ($userCourses as $userCourse) {
            // go through each object retrieved from the database and adding the id into the array
            $courseID = array_prepend($courseID, $userCourse->id);
        }
        $modules = Modules::SearchByKeyword($search)->whereIn('courseID', $courseID)->get();

        // list of all user courses to then allow search for any of their modules 
        $userModules = Modules::whereIn('courseID', $courseID)->get();
        //search for subjects based of the module id's given
        foreach ($userModules as $userModule) {
            // go through each object retrieved from the database and adding the id into the array
            $moduleID = array_prepend($moduleID, $userModule->id);
        }
        $subjects = Subject::SearchByKeyword($search)->whereIn('moduleID', $moduleID)->get();

        //collection of modules to use in view to help organise Subjects search result
        $passModID = Modules::whereIn('courseID', $courseID)->get();
        return view('home', ['courses' => $courses, 'modules' => $modules, 'subjects' => $subjects, 'modID' => $passModID, 'userCourses' => $userCourses]);
    }
}
