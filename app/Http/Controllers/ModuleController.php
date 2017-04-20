<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Input;
use App\Course;
use App\Modules;
use App\Subject;
use Illuminate\Http\Request;

class ModuleController extends Controller
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

    public function index(Request $request, $course)
    {
        if (Auth::User())
        {
            return redirect()->action('CourseController@show', ['id' => $course]);
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
        $userID = Auth::id();
        $courses = DB::table('courses')->where('userID', $userID)->first();

        return view('add.module', ['courses' => $courses]);

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
            $cName = $request->course;
            $modName = $request->modName;
            // validate data on Server Side
            $this->validate($request, array(
                    'moduleName' => 'required|max:100',
                    'moduleCode' => 'required|max:10'
                ));

            //retrieve chosen course from form
            $course = DB::table('courses')->where('courseName', $cName)->first();
            $courseID = $course->id;
            $courseName = $course->courseName;
            // Store new module information
            $module = new Modules;
            $module->moduleName = $modName;
            $module->moduleCode = $request->modCode;
            $module->courseID = $courseID;

            $module->save();

            //redirect to module page
            return redirect()->route('course.module.show', [$courseName, $modName]);
        }
        return redirect()->action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course, $module)
    {
        //
        if (Auth::User())
        {
            $cCourse = Course::where([['courseName', $course], ['userID', Auth::id()]])->first();
            $cModule = Modules::where([['moduleName', $module], ['courseID', $cCourse->id]])->first();
            $subjects = Subject::where(['courseID' => $cCourse->id], ['moduleID' => $cModule->id])->get();
            return view('userdata.currentmodule', ['course' => $course, 'module' => $cModule, 'subjects' => $subjects]);
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
}
