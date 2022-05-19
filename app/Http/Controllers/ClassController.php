<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ClassController extends Controller
{
    private $title = "Class";
    private $menuActive = "classes";
    private $submnActive = "";

    public function index()
    {
      $this->data['title'] = $this->title;
      $this->data['menuActive'] = $this->menuActive;
      $this->data['submnActive'] = $this->submnActive;
      $this->data['smallTitle'] = "";

      if(Auth::user()->level_user == 2){
        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $classes = Classes::where('teacher_id', $guru->id_teacher)->get();
      }

    //   $teacher = DB::table('users')
    //         ->join('teachers', 'users.id', '=', 'teachers.user_id')
    //         ->select('teachers.teacher_name')
    //         ->get();
    //    SeminarProposal::join('master_riset', 'master_riset.id_riset')
    //                             ->select('data_mahasiswa.nama_lengkap as nama_mhs','data_dosen.*','master_riset.*','pendaftaran_sempro.*')
    //                             ->get();
      return view('classes.main', ['classes' => $classes])->with('data', $this->data);

  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = "CreateClass";
        $this->data['menuActive'] = "classes";
        $this->data['submnActive'] = "";
        $this->data['smallTitle'] = "";
        return view('classes.create-class')->with('data',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";

        $rules = [
            'class_name' => 'required',
            'subject' => 'required',
            'desc' => 'required',
            'room' => 'required',
        ];
      
        $messages = [
            'class_name.required' => 'Class name is required',
            'subject.required' => 'Subject is required',
            'desc.required' => 'Description is required',
            'room.required' => 'Room is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        do
        {
            $token = Str::random(6);
            // $code = 'EN'. $token . substr(strftime("%Y", time()),2);
            $user_code = Classes::where('class_code', $token)->first();
        }
        while(!empty($user_code));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $class = new Classes;
        $class->teacher_id = $guru->id_teacher;
        $class->class_code = $token;
        $class->class_name = $request->class_name;
        $class->class_subject = $request->subject;
        $class->class_desc = $request->desc;
        $class->class_room = $request->room;
        $class->save();

        return redirect()->route('class');
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
