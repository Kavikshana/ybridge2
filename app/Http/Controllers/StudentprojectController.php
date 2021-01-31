<?php

namespace App\Http\Controllers;
use App\Models\Studentproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\User;

class StudentprojectController extends Controller
{
    public function create()
    {
        return view('ProjectPage.StudentProjectPage');
    }
    
    public function store1()
    {
        /**$request->validate([
            'StudentID' =>'required',
            'ProjectID' => 'required',
            'Titleoftheproject' => 'required',
            'Description' => 'required',
            'ProjectType'=>'required',
            'Technologies'=>'required',
        ]);
        */
    
        $studentproject = new Studentproject();

        $studentproject->StudentID = request('StudentID');
        $studentproject->ProjectID = request('ProjectID');
        $studentproject->Titleoftheproject = request('Titleoftheproject');
        $studentproject->Description = request('Description');
        $studentproject->ProjectType = request('ProjectType');
        $studentproject->Technologies = request('Technologies');
        
        //StudentProject::create($request->all());
        $studentproject->save();

        
        return redirect()->route('users.index');
        
       
     
    }

}
