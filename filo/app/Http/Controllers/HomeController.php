<?php
//Conrollers are for php logic, manipulating data, doing processes


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
       $this->middleware('auth')->except('show');
     }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }


    /**
     * Show the form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      // items which are unavailable (request approved) are shown in home view

      $items = Item::where('status', 'unavailable')->get();
      
      return view('home', compact('items'));
    }
}
