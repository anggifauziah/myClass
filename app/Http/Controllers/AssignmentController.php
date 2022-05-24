<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Assignment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function viewAssignment($id, $group_assign_code)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";

        $view_assign = Assignment::join('classes', 'classes.id_class', '=', 'assignment.class_id')
                    ->where('classes.class_code', $id)
                    ->where('assignment.group_assign_code', $group_assign_code)
                    ->orderBy('assignment.created_at', 'DESC')->get();
        //return $view_assign;
        // dd($content);
        return view('class.view-assignment', [
            'datas' => $view_assign, 'id' => $id
            ])->with('data',$this->data);
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
            'file.*' => 'mimes:doc,docx,DOCX,PDF,pdf,jpg,jpeg,png,pptx,PPTX|max:5000',
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

        // $idclass = Classes::join('classes', 'classes.id_class', '=', 'class_of_students.class_id')->first();
        
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
