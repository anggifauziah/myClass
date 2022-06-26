<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Students;
use App\Models\ClassOfStudents;
use App\Models\Assignment;
use App\Models\FileAssignment;
use App\Models\StudentsAssignment;
use App\Models\CommentAssignment;
use App\Models\FileStudentsAssignment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class AssignmentController extends Controller
{
    private $title = "Assignment";
    private $menuActive = "class";
    private $submnActive = "";

    public function index()
    {
      $this->data['title'] = $this->title;
      $this->data['menuActive'] = $this->menuActive;
      $this->data['submnActive'] = $this->submnActive;
      $this->data['smallTitle'] = "";

      return view($this->menuActive.'.'.'assignment')->with('data',$this->data);
    }

    public function viewAssignment($code, $id_assign)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";

        if(Auth::user()->level_user == 1){
            $student = Students::where('user_id', Auth::user()->id)->first();
            $student_assign = StudentsAssignment::join('students', 'students.id_student', '=', 'students_assignment.student_id')
                    ->leftJoin('assignment', 'assignment.id_assign', '=', 'students_assignment.assign_id')
                    ->where('assignment.id_assign', $id_assign)
                    ->where('students.id_student', $student->id_student)
                    ->orderBy('assignment.created_at', 'DESC')->get();
            if($student_assign->count() < 1){
                 $view_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->leftJoin('file_assignment', 'file_assignment.assign_id', '=', 'assignment.id_assign')
                    ->where('classes.class_code', $code)
                    ->where('assignment.id_assign', $id_assign)
                    ->select('assignment.created_at as created_date', 'classes.*', 'file_assignment.*', 'assignment.*')
                    ->orderBy('assignment.created_at', 'DESC')->get();
            }else{
                $view_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->leftJoin('file_assignment', 'file_assignment.assign_id', '=', 'assignment.id_assign')
                    ->where('classes.class_code', $code)
                    ->where('assignment.id_assign', $id_assign)
                    ->select('assignment.created_at as created_date', 'classes.*', 'file_assignment.*', 'assignment.*')
                    ->orderBy('assignment.created_at', 'DESC')->get();
                $student_assign = StudentsAssignment::join('students', 'students.id_student', '=', 'students_assignment.student_id')
                    ->join('file_students_assignment', 'file_students_assignment.student_assign_id', '=', 'students_assignment.id_student_assign')
                    ->where('students_assignment.assign_id', $id_assign)
                    ->where('students_assignment.student_id', $student->id_student)
                    ->get();
            }
        }else if(Auth::user()->level_user == 2){
            $view_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->where('classes.class_code', $code)
                    ->where('assignment.id_assign', $id_assign)
                    ->orderBy('assignment.created_at', 'DESC')->get();
            $student_assign = StudentsAssignment::join('students', 'students.id_student', '=', 'students_assignment.student_id')
                    ->join('file_students_assignment', 'file_students_assignment.student_assign_id', '=', 'students_assignment.id_student_assign')
                    ->where('students_assignment.assign_id', $id_assign)->get();
        }

        $datas = ClassOfStudents::join('students', 'students.id_student', '=', 'class_of_students.student_id')
                                ->join('classes', 'classes.id_class', '=', 'class_of_students.class_id')
                                ->join('teachers', 'teachers.id_teacher', '=', 'classes.teacher_id')
                                ->first();
        $comment_assign = CommentAssignment::join('assignment', 'assignment.id_assign', '=', 'comment_assignment.assign_id')
                                            ->join('classes', 'classes.id_class', '=', 'assignment.class_id')
                                            ->join('users', 'users.id','=','comment_assignment.user_id')
                                            ->select('comment_assignment.created_at as created_comment_assign', 'classes.*', 'comment_assignment.*',
                                            'assignment.*', 'users.*')
                                            ->where('assign_id', $id_assign)
                                            ->get();

        //return $comment_assign;
        // dd($content);
        return view('class.view-assignment', [
            'assign' => $view_assign,
            'student_assign' => $student_assign,
            'code' => $code,
            'id_assign' => $id_assign,
            'datas' => $datas,
            'comment_assign' => $comment_assign])->with('data',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($code)
    {
        $this->data['title'] = "CreateAssignment";
        $this->data['menuActive'] = "class";
        $this->data['submnActive'] = "";
        $this->data['smallTitle'] = "";

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $datas = Classes::join('teachers', 'teachers.id_teacher', '=', 'classes.teacher_id')
                    ->where('classes.teacher_id', $guru->id_teacher)
                    ->where('classes.class_code', $code)
                    ->first();

        return view('class.create-assignment', ['datas' => $datas])->with('data',$this->data);
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
            'title' => 'required',
            'ckeditor' => 'required',
            'file.*' => 'mimes:doc,docx,DOCX,pdf,PDF,pptx,PPTX,xlsx,XLSX,csv,CSV|max:5000',
            'datetime' => 'required'
        ];
    
        $messages = [
            'title' => 'Title is required',
            'ckeditor.required' => 'Description is required',
            'datetime' => 'Date is required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->hasfile('file'))
        {
            $assign = new Assignment;
            $assign->class_id = $request->class_id;
            $assign->user_id = $request->user_id;
            $assign->creator_name = $request->creator_name;
            $assign->assign_title = $request->title;
            $assign->assign_content = $request->ckeditor;
            $assign->assign_deadline = $request->datetime;
            $assign->save();

            foreach($request->file as $file)
            {
                $file_assign = new FileAssignment;
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/files/assignment', $name);
                $file_assign->assign_id = $assign->id_assign;
                $file_assign->filename = $name;
                $file_assign->save();
            }
        } else {
            $assign = new Assignment;
            $assign->class_id = $request->class_id;
            $assign->user_id = $request->user_id;
            $assign->creator_name = $request->creator_name;
            $assign->assign_title = $request->title;
            $assign->assign_content = $request->ckeditor;
            $assign->assign_deadline = $request->datetime;
            $assign->save();
        }
        return redirect('class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitAssignment(Request $request)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";
        
        $rules = [
            'file.*' => 'mimes:doc,docx,DOCX,pdf,PDF,pptx,PPTX,xlsx,XLSX,csv,CSV|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $murid = Students::where('user_id', Auth::user()->id)->first();

        //return $view_assign;

        if($request->hasfile('file'))
        {
            $student_assign = new StudentsAssignment;
            $student_assign->assign_id = $request->id_assign;
            $student_assign->student_id = $murid->id_student;
            $student_assign->save();

            foreach($request->file as $file)
            {
                $file_student_assign = new FileStudentsAssignment;
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/files/students_assignment', $name);
                $file_student_assign->student_assign_id = $student_assign->id_student_assign;
                $file_student_assign->filename_student_assign = $name;
                $file_student_assign->save();
            }
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";
        
        $rules = [
            'comment' => 'required'
        ];
    
        $messages = [
            'comment.required' => 'Comment is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $comment= new CommentAssignment;
        $comment->assign_id = $request->assign_id;
        $comment->user_id = $request->user_id;
        $comment->creator_comment_assign= $request->creator_name;
        $comment->comment_assign = $request->comment;
        $comment->save();
        
        return redirect()->back();
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
    public function edit($id_assign)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";
        
        $edit_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->leftJoin('file_assignment', 'file_assignment.assign_id', '=', 'assignment.id_assign')
                    ->where('assignment.id_assign', $id_assign)->get();
        //return $edit_assign;

        return view('class.edit-assignment', [
                    'edit_assign' => $edit_assign,
                    'id_assign' => $id_assign])->with('data',$this->data);
    }

    public function update(Request $request)
    {
        if($request->filled('datetime')) {
            $edit_assign = Assignment::where('id_assign', $request->id_assign)->first();
            $edit_assign->assign_title= $request->title;
            $edit_assign->assign_content= $request->ckeditor;
            $edit_assign->assign_deadline = $request->datetime;
            $edit_assign->save();
        } else {
            $edit_assign = Assignment::where('id_assign', $request->id_assign)->first();
            $edit_assign->assign_title= $request->title;
            $edit_assign->assign_content= $request->ckeditor;
            $edit_assign->save();
        }
        
        return redirect('class');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateScore(Request $request)
    {
        // return "p";
        $edit_score = StudentsAssignment::where('assign_id', $request->assign_id)
                                        ->where('student_id', $request->student_id)->first();
        $edit_score->student_assign_score= $request->score;
        $edit_score->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id_assign = $request->assign_id;
        DB::table("assignment")->where("id_assign", $id_assign)->delete();
        DB::table("file_assignment")->where("assign_id", $id_assign)->delete();
        DB::table("comment_assignment")->where("assign_id", $id_assign)->delete();
        DB::table("students_assignment")->where("assign_id", $id_assign)->delete();

        return redirect()->back()->with('success', 'Berhasil delete');
    }
}
