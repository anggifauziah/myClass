<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Students;
use App\Models\Assignment;
use App\Models\StudentsAssignment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

    public function viewAssignment($code, $group_assign_code)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";
        $date = today()->format('Y-m-d H:i:s');

        if(Auth::user()->level_user == 1){
            $student = Students::where('user_id', Auth::user()->id)->first();
            $student_assign = StudentsAssignment::join('students', 'students.id_student', '=', 'students_assignment.student_id')
                    ->leftJoin('assignment', 'assignment.group_assign_code', '=', 'students_assignment.group_assign_code')
                    ->where('assignment.group_assign_code', $group_assign_code)
                    ->where('students.id_student', $student->id_student)
                    ->orderBy('assignment.created_at', 'DESC')->get();
            if($student_assign->count() < 1){
                 $view_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->where('classes.class_code', $code)
                    ->where('assignment.group_assign_code', $group_assign_code)
                    ->orderBy('assignment.created_at', 'DESC')->get();
            }else{
                $view_assign = StudentsAssignment::join('students', 'students.id_student', '=', 'students_assignment.student_id')
                    ->leftJoin('assignment', 'assignment.group_assign_code', '=', 'students_assignment.group_assign_code')
                    ->where('assignment.group_assign_code', $group_assign_code)
                    ->where('students.id_student', $student->id_student)
                    ->orderBy('assignment.created_at', 'DESC')->get();
                $student_assign = StudentsAssignment::join('students', 'students.id_student', '=', 'students_assignment.student_id')
                    ->where('students_assignment.group_assign_code', $group_assign_code)
                    ->where('students_assignment.student_id', $student->id_student)
                    ->get();
            }
        }else if(Auth::user()->level_user == 2){
            $view_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->where('classes.class_code', $code)
                    ->where('assignment.group_assign_code', $group_assign_code)
                    ->orderBy('assignment.created_at', 'DESC')->get();
            $student_assign = StudentsAssignment::join('students', 'students.id_student', '=', 'students_assignment.student_id')
                    ->where('students_assignment.group_assign_code', $group_assign_code)->get();
        }

        $expired = Assignment::where('group_assign_code', $group_assign_code)
                            ->where('assign_deadline', '>=', $date)->get();

        // return $expired;
        // dd($content);
        return view('class.view-assignment', [
            'assign' => $view_assign,
            'student_assign' => $student_assign,
            'code' => $code,
            'expired' => $expired,
            'group_assign_code' => $group_assign_code])->with('data',$this->data);
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

        do
        {
            $code = Str::random(8);
            $user_code = Assignment::where('group_assign_code', $code)->first();
        }
        while(!empty($user_code));

        if($request->hasfile('file'))
        {
            foreach($request->file as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/assignment', $name);  
                $data = $name;
                $post_type = 2;
                $assign = new Assignment;
                $assign->post_type_id = $post_type;
                $assign->class_id = $request->class_id;
                $assign->user_id = $request->user_id;
                $assign->creator_name = $request->creator_name;
                $assign->group_assign_code = $code;
                $assign->assign_title = $request->title;
                $assign->assign_content = $request->ckeditor;
                $assign->assign_deadline = $request->datetime;
                $assign->assign_file=$data;
                $assign->save();
            }
        }
        return redirect()->route('class');
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
            'file.*' => 'mimes:doc,docx,DOCX,PDF,pdf,jpg,jpeg,png,pptx,PPTX|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $murid = Students::where('user_id', Auth::user()->id)->first();

        //return $view_assign;

        if($request->hasfile('file'))
        {
            foreach($request->file as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/students_assignment', $name);  
                $data = $name;
                $student_assign = new StudentsAssignment;
                $student_assign->student_id = $murid->id_student;
                $student_assign->group_assign_code = $request->group_assign_code;
                $student_assign->student_assign_file = $data;
                $student_assign->save();
            }
        }
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
    public function edit($code, $group_assign_code)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";
        
        $edit_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->where('classes.class_code', $code)
                    ->where('assignment.group_assign_code', $group_assign_code)->get();
        //return $edit_assign;

        return view('class.edit-assignment', [
            'datas' => $edit_assign,
            'code' => $code,
            'group_assign_code' => $group_assign_code])->with('data',$this->data);
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
