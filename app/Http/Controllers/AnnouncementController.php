<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Announcement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    private $title = "Announcement";
    private $menuActive = "class";
    private $submnActive = "";

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = "CreateAnnouncement";
        $this->data['menuActive'] = "class";
        $this->data['submnActive'] = "";
        $this->data['smallTitle'] = "";
        
        return view('class.create-announcement')->with('data',$this->data);
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
            'ckeditor' => 'required',
            'file.*' => 'mimes:doc,docx,DOCX,pdf,PDF,pptx,PPTX,xlsx,XLSX,csv,CSV|max:5000'
        ];
    
        $messages = [
            'ckeditor.required' => 'Description is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        do
        {
            $code = Str::random(8);
            $user_code = Announcement::where('group_announce_code', $code)->first();
        }
        while(!empty($user_code));

        if($request->hasfile('file'))
        {
            foreach($request->file as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/announcement', $name);  
                $data = $name;
                $post_type = 1;
                $announce= new Announcement;
                $announce->post_type_id = $post_type;
                $announce->class_id = $request->class_id;
                $announce->user_id = $request->user_id;
                $announce->creator_name = $request->creator_name;
                $announce->group_announce_code = $code;
                $announce->announce_content = $request->ckeditor;
                $announce->announce_file=$data;
                $announce->save();
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
    public function edit($code, $group_announce_code)
    {
        $edit_announce = Announcement::join('classes', 'classes.id_class', '=', 'anouncement.class_id')
                    ->where('classes.class_code', $code)
                    ->where('anouncement.group_announce_code', $group_announce_code)->get();
        //return $edit_announce;

        return view('class.edit-announcement', [
            'datas' => $edit_announce,
            'code' => $code,
            'group_assign_code' => $group_announce_code])->with('data',$this->data);
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
