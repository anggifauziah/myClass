<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private $title = "Classes";
    private $menuActive = "classes";
    private $submnActive = "";

    public function index()
    {
      $this->data['title'] = $this->title;
      $this->data['menuActive'] = $this->menuActive;
      $this->data['submnActive'] = $this->submnActive;
      $this->data['smallTitle'] = "";

      return view($this->menuActive.'.'.'main')->with('data',$this->data);
      
    }
}
