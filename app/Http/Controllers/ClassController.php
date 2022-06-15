<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Students;
use App\Models\ClassOfStudents;
use App\Models\Announcement;
use App\Models\CommentAnnouncement;
use App\Models\Assignment;
use App\Models\CommentAssignment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;


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
      $date = today()->format('Y-m-d H:i:s');

      if(Auth::user()){
        if(Auth::user()->level_user == 1){
            $murid = Students::where('user_id', Auth::user()->id)->first();
            $classes = ClassOfStudents::join('students', 'students.id_student', '=', 'class_of_students.student_id')
                        ->join('classes', 'classes.id_class', '=', 'class_of_students.class_id')
                        ->join('teachers', 'teachers.id_teacher', '=', 'classes.teacher_id')
                        ->leftJoin('assignment', 'assignment.class_id', '=', 'classes.id_class')
                        ->where('class_of_students.student_id', $murid->id_student)
                        ->get();
        }
        elseif(Auth::user()->level_user == 2){
            $guru = Teacher::where('user_id', Auth::user()->id)->first();
            $classes = Classes::join('teachers', 'teachers.id_teacher', '=', 'classes.teacher_id')
                        ->leftJoin('assignment', 'assignment.class_id', '=', 'classes.id_class')
                        ->where('classes.teacher_id', $guru->id_teacher)->get();
        }

        return view('classes.main', ['classes' => $classes])->with('data', $this->data);

      }else{
            return redirect()->to('login');
      }
    }

    public function viewClass($code)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";
        $this->data['tabs'] = "";

        if(Auth::user()->level_user == 1){
            $murid = Students::where('user_id', Auth::user()->id)->first();
            $datas = ClassOfStudents::join('students', 'students.id_student', '=', 'class_of_students.student_id')
                        ->join('classes', 'classes.id_class', '=', 'class_of_students.class_id')
                        ->join('teachers', 'teachers.id_teacher', '=', 'classes.teacher_id')
                        ->where('class_of_students.student_id', $murid->id_student)
                        ->where('classes.class_code', $code)
                        ->first();
        }
        else if(Auth::user()->level_user == 2){
            $guru = Teacher::where('user_id', Auth::user()->id)->first();
            $datas = Classes::join('teachers', 'teachers.id_teacher', '=', 'classes.teacher_id')
                        ->leftJoin('assignment', 'assignment.class_id', '=', 'classes.id_class')
                        ->where('classes.teacher_id', $guru->id_teacher)
                        ->where('classes.class_code', $code)
                        ->first();
        }

        $announcements = Classes::join('announcement', 'announcement.class_id', '=', 'classes.id_class')
                        ->leftjoin('file_announcement', 'file_announcement.announce_id', '=', 'announcement.id_announce')
                        ->leftJoin('comment_announcement', 'comment_announcement.announce_id', '=', 'announcement.id_announce')
                        ->select('announcement.created_at as created_announce', 'comment_announcement.created_at as created_comment',
                                 'announcement.*', 'classes.*', 'file_announcement.*', 'comment_announcement.*',
                                 'announcement.user_id as announce_user_id')
                        ->where('class_id', $datas->id_class)
                        ->orderBy('announcement.created_at', 'DESC')->get();
        $assignments = Classes::join('assignment', 'assignment.class_id', '=', 'classes.id_class')
                        ->leftjoin('file_assignment', 'file_assignment.assign_id', '=', 'assignment.id_assign')
                        ->leftJoin('comment_assignment', 'comment_assignment.assign_id', '=', 'assignment.id_assign')
                        ->select('assignment.created_at as created_assign', 'comment_assignment.created_at as created_comment',
                                 'assignment.*', 'classes.*', 'file_assignment.*', 
                                 'comment_assignment.*', 'assignment.user_id as assign_user_id')
                        ->where('classes.id_class', $datas->id_class)
                        ->orderBy('assignment.created_at', 'DESC')->get();
        $students = ClassOfStudents::join('students', 'students.id_student', '=', 'class_of_students.student_id')
                        ->join('classes', 'classes.id_class', '=', 'class_of_students.class_id')
                        ->where('classes.id_class', $datas->id_class)
                        ->get();

        // return $students;
        return view('class.class', [
                    'datas' => $datas,
                    'announcement' => $announcements,
                    'assignment' => $assignments,
                    'students' => $students,
                    'code' => $code
                    ])->with('data', $this->data);
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

        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $datas = Classes::join('teachers', 'teachers.id_teacher', '=', 'classes.teacher_id')
                        ->where('classes.teacher_id', $teacher->id_teacher)
                        ->first();
        return view('classes.create-class', ['teacher' => $teacher, 'datas' => $datas])->with('data',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function join()
    {
        $this->data['title'] = "JoinClass";
        $this->data['menuActive'] = "classes";
        $this->data['submnActive'] = "";
        $this->data['smallTitle'] = "";

        $student = Students::where('user_id', Auth::user()->id)->first();
        $datas = ClassOfStudents::join('students', 'students.id_student', '=', 'class_of_students.student_id')
                ->where('class_of_students.student_id', $student->id_student)
                ->first();
        return view('classes.join-class', ['student' => $student, 'datas' => $datas])->with('data', $this->data);
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

        if(Auth::user()->level_user == 1){
            $rules = [
                'class_code' => 'required',
            ];
        
            $messages = [
                'class_code.required' => 'Class code is required',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $code = Classes::where('class_code', '=', $request->input('class_code'))->first();
            $murid = Students::where('user_id', Auth::user()->id)->first();
            
            if ($code === null) { // do what ever you need to do
                return redirect()->route('join-class')->with('error', 'Class code is incorrect.');
            }else{
                $class_id = ClassOfStudents::where('class_id', $code->id_class)
                                            ->where('student_id', $murid->id_student)->first();

                if ($class_id !== null) {
                    return redirect()->route('join-class')->with('error', 'Class is already exist.');
                } else { // match found
                    $class = new ClassOfStudents;
                    $class->class_id = $code->id_class;
                    $class->student_id = $murid->id_student;
                    $class->save();
                    return redirect()->route('class');
                }
            }
        }
        elseif(Auth::user()->level_user == 2){
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
        }
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
    public function destroy(Request $request)
    {
        $this->data['tabs'] = "people";
        DB::table("class_of_students")->where("id_classOfStudents", $request->id_classOfStudents)->delete();

        return redirect()->back()->with('tabs', 'people');
    }
}
