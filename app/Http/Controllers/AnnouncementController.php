<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Announcement;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    private $title = "Announcement";
    private $menuActive = "class";
    private $submnActive = "";

    public function index()
    {
      $this->data['title'] = $this->title;
      $this->data['menuActive'] = $this->menuActive;
      $this->data['submnActive'] = $this->submnActive;
      $this->data['smallTitle'] = "";
      return view($this->menuActive.'.'.'class')->with('data',$this->data);
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
        return view('class.announcement')->with('data',$this->data);
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
            'file.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:5000'
        ];
    
        $messages = [
            'ckeditor.required' => 'Description is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->hasfile('file'))
        {
            foreach($request->file('file') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
        }

        // $idclass = Classes::join('classes', 'classes.id_class', '=', 'class_of_students.class_id')->first();
        $post_type = 1;
        $announce= new Announcement;
        $announce->post_type_id = $post_type;
        $announce->announce_content = $request->ckeditor;
        $announce->announce_file=json_encode($data);
        $announce->save();
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
