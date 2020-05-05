<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Item;
use App\RequestItem;
use Illuminate\Support\Facades\Route;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /**
      * all data fetched and send to controllers index function
      * compact() makes variable available for view
      */

      $items = Item::where('status', 'available')->get();

      return view('items.list.allitems', compact('items'));
    }


    public function jewellery()
    {
      /**
      * data of jewellery items fetched and made available for view
      */
      $items = Item::where('category', 'Jewellery')
        ->where('status', 'available')
        ->get();

      return view('items.list.jewellery', compact('items'));
    }


    public function pet()
    {
      /**
      * data of pet items fetched and made available for view
      */
      $items = Item::where('category', 'Pet')
        ->where('status', 'available')
        ->get();

      return view('items.list.pet', compact('items'));
    }


    public function phone()
    {
      /**
      * data of phone items fetched and made available for view
      */
      $items = Item::where('category', 'Phone')
        ->where('status', 'available')
        ->get();

      return view('items.list.phone', compact('items'));
    }


    public function requested_items()
    {
      /**
      * data of items which have requests fetched and made available for view
      */
      if (Gate::allows('admin')){
        $items = Item::has('request_items')
          ->where('status', 'available')
          ->get();

        return view('items.list.requested_items', compact('items'));
      }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // form validation
      $item = $this->validate(request(), [
        'category' => 'required',
        'foundtime' => 'required',
        'founduser' => 'required',
        'foundplace' => 'required',
        'colour' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        'description' => 'required',
      ]);

      // Handles the uploading of the image
      if ($request->hasFile('image')){
        // Gets the filename with the extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        // Just gets the filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Just gets the extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Gets the filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Uploads the image
        $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
      }
      else {
        $fileNameToStore = 'noimage.jpg';
      }

      // create an Item object and set its values from the input
      $item = new Item;
      $item->category = $request->input('category');
      $item->foundtime = $request->input('foundtime');
      $item->founduser = $request->input('founduser');
      $item->foundplace = $request->input('foundplace');
      $item->colour = $request->input('colour');
      $item->image = $fileNameToStore;
      $item->description = $request->input('description');
      $item->other = $request->input('other');

      // save the Item object
      $item->save();

      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Item has been added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	  // of user is an admin different view is shown
      $item = Item::find($id);
      $requestItem = RequestItem::where('item_id', $item->id)
        ->where('status', 'request')
        ->get();
      if (Gate::allows('admin')) {
        return view('items.details.requested_item',compact('item', 'requestItem'));
      }
      return view('items.details.items',compact('item'));
      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = Item::find($id);
      return view('items.edit',compact('item'));
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
      $item = Item::find($id);
      $this->validate(request(), [
        'category' => 'required',
        'foundtime' => 'required',
        'founduser' => 'required',
        'foundplace' => 'required',
        'colour' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        'description' => 'required',
      ]);
      $item->category = $request->input('category');
      $item->foundtime = $request->input('foundtime');
      $item->founduser = $request->input('founduser');
      $item->foundplace = $request->input('foundplace');
      $item->colour = $request->input('colour');
      $item->description = $request->input('description');
 
      // Handles the uploading of the image
      if ($request->hasFile('image')){
        // Gets the filename with the extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        // just gets the filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Just gets the extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Gets the filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Uploads the image
        $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
      } else {
        $fileNameToStore = 'noimage.jpg';
      }
      $item->image = $fileNameToStore;
      $item->save();
      return redirect('items')->with('success','Item has been updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = Item::find($id);
      $item->delete();
      return redirect('items')->with('success','Item has been deleted');
    }
}
