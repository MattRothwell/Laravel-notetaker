<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Course;
use App\Modules;
use Auth;
use DB;
use Storage;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $course, $module)
    {
        //
        if (Auth::check()) {
            $courseID = Course::where([['courseName', $course], ['userID', Auth::id()]])->first();
            $moduleID = Modules::where([['moduleName', $module], ['courseID', $courseID->id]])->first();
            $subjects = Subject::where(['courseID' => $courseID->id], ['moduleID' => $moduleID->id])->get();
            return view('userdata.currentmodule', ['course' => $course, 'module' =>$module, 'subjects' => $subjects]);
        }
        return redirect()->action('HomeController@index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course, $module)
    {
        if (Auth::check()) {
            return view('add.subject', ['course' => $course, 'module' => $module]);
        }
        return redirect()->action('HomeController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $curCourse, $curModule)
    {
        if (Auth::check()) 
        {
            //
            // validate data on Server Side
            $this->validate($request, array(

                ));
            //retrieve chosen course from form
            $subjectType;
            if ($request->subjectType == 0) { $subjectType = "Definition"; }
            else if ($request->subjectType == 1) { $subjectType = "Advantage";}
            else if ($request->subjectType == 2) { $subjectType = "Disadvantage";}
            else if ($request->SubjectType == 4) { $subjectType = "Image"; }
            else if ($request->SubjectType == 5) { $subjectType = "Diagram"; }
            else { $subjectType = "Information"; }

            //retrieve course id for subject
            $course = Course::where([['courseName', $curCourse], ['userID', Auth::id()]])->first();
            // retrieve module id for subject
            $module = Modules::where([['moduleName', $curModule], ['courseID', $course->id]])->first();

            // Store new subject information
            $subject = new Subject;
            $subject->subjectType = $subjectType;
            $subject->subjectTitle = $request->input('subjectTitle');
            $subject->subjectInfo = $request->input('subjectInfo');
            $subject->moduleID = $module->id;
            $subject->courseID = $course->id;

            if ($request->hasFile('file'))
            {
                $file = $request->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                Storage::disk('local')->put($filename, $file);
                $subject->file = $filename;
            }
            $subject->save();

            //redirect to module page
            return redirect()->route('course.module.show', [$curCourse, $curModule, $subject->subject]);
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
