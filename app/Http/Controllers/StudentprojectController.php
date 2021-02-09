<?php

namespace App\Http\Controllers;
use App\Models\Studentproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\User;
use App\Models\Description;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


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
       $description = Str::of(request('Description'))->split('/[\s,]+/');
       $keys = DB::table('dictionaries')->get();
       $newArr = [];
       //echo strcasecmp($description[0],"NeTwork");
      
      foreach($keys as $key){
           for($i = 0 ; $i < count($description) ; $i++){
               if(strcasecmp($description[$i],$key->keywordName) == 0){
                   $newArr[] = $key->keywordName;
               }
           }
           
       }
     
      $desc = new Description();
      $desc->StudentID = request('StudentID');
      $desc->Description = implode(", ",$newArr);

      $desc->save();

   
        
        return redirect()->route('users.index');
        
       
     
    }

    
}
