<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Announcement;
use App\Models\FileAnnouncement;
use App\Models\CommentAnnouncement;
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

        if($request->hasfile('file'))
        {
            $announce= new Announcement;
            $announce->class_id = $request->class_id;
            $announce->user_id = $request->user_id;
            $announce->creator_name = $request->creator_name;
            $announce->announce_content = $request->ckeditor;
            $announce->save();

            foreach($request->file as $file)
            {
                $file_announce = new FileAnnouncement;
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/files/announcement', $name);
                $file_announce->announce_id = $announce->id_announce;
                $file_announce->filename = $name;
                $file_announce->save();
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

        $comment= new CommentAnnouncement;
        $comment->announce_id = $request->announce_id;
        $comment->user_id = $request->user_id;
        $comment->creator_comment_announce = $request->creator_name;
        $comment->comment_announce = $request->comment;
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
    public function edit($id_announce)
    {
        $this->data['title'] = $this->title;
        $this->data['menuActive'] = $this->menuActive;
        $this->data['submnActive'] = $this->submnActive;
        $this->data['smallTitle'] = "";
        
        $edit_announce = Announcement::join('classes', 'classes.id_class', '=', 'announcement.class_id')
                        ->join('file_announcement', 'file_announcement.announce_id', '=', 'announcement.id_announce')
                        ->where('announcement.id_announce', $id_announce)->get();
        //return $edit_announce;

        return view('class.edit-announcement', [
                    'edit_announce' => $edit_announce,
                    'id_announce' => $id_announce])->with('data',$this->data);
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
    public function destroy($id_announce)
    {
        $del_announce = Classes::join('announcement', 'announcement.class_id', '=', 'classes.id_class')
                        ->join('file_announcement', 'file_announcement.announce_id', '=', 'announcement.id_announce')
                        ->join('comment_announcement', 'comment_announcement.announce_id', '=', 'announcement.id_announce')
                        ->where('class_id', $datas->id_class)
                        ->where('announcement.id_announce', $id_announce)
                        ->where('announce_id', $id_announce)
                        ->delete();
        $del_announce->delete();
        return redirect()->back();
    }
}
