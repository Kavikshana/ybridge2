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
use App\Models\Connection;


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

      $dict =DB::table('dictionaries')->whereIn('keywordName',[$newArr])->pluck('mainTermId')->toArray();
        
        $dict = array_count_values($dict);
        arsort($dict);
        $maxMainKey = array_key_first($dict);
     
     $connection = new Connection();
     $connection->StudentID = request('StudentID');
     $connection->MainTermID = $maxMainKey;
     $connection->save();
    


    return redirect()->route('users.index');
    }
}


       
    
    /**public function check()
    {//$keys = DB::table('dictionaries')->get();
        $words = DB::table('descriptions')->get();
        $descript = $word->Description;
        //$Arr = explode(" ",$descript);
        $Arr = [];
        //$mArr = [];
        $connection = DB::table('connections');

        foreach($words as $word){
            for($i = 0 ; $i < count($description) ; $i++){*/
                //if(strcasecmp($description[$i],$key->keywordName) == 0){
                   // $newArr[] = $key->keywordName;
                //$Arr = explode(", ",$descript);
                //for($i = 0 ; $i < count($Arr) ; $i++){
                   /**if(strcasecmp($Arr[$i],$key->keywordName) == 0){
                        $mArr[] = $key;
                        */
                /**$dict =DB::table('dictionaries')->whereIn('keywordName',[$Arr])->pluck('mainTermId')->toArray();
                    //$MainTermID = array_column($mArr, 'mainTermId');
                    arsort($count);
                    $dict=array_keys($count);
                    $max = $dict[0];

                $connection = new Connection();
                $connection->StudentID = request('StudentID');
                $connection->MainTermID = $max;
                $connection->save();
                    }
               }
        return redirect()->route('users.index');
    }
    */
       



        
        
    



               /**$counts = array_count_values($mArr);
                //$duplicate_title  = array_filter($mArr, function ($value) use ($counts){
                //    $con = $mArr->sortBy('$counts[$value]', 'desc')->first();
                //    $max = $con->value;
                arsort($count);
                $keys=array_keys($count);
                $max = $keys[0];
               // });
               */
              
            


            
                
            
        
        
    
        

        
        /**$nArr = [];
       //echo strcasecmp($description[0],"NeTwork");
      
        foreach($keys as $key){
           //for($i = 0 ; $i < count($description) ; $i++){
               //if(strcasecmp($description[$i],$key->keywordName) == 0){
                   $nArr[] = $key->keywordName;
               //}
           }

           foreach($words as $word)
           {
           foreach($keys as $key)
           {
            }
        }
            */