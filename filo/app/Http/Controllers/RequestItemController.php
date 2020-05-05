<?php

namespace App\Http\Controllers;

use App\RequestItem;
use App\Item;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RefuseMail;
use App\Mail\ApproveMail;

class RequestItemController extends Controller
{

    /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request, $id)
        {
          // form validation
          $requestItem = $this->validate(request(), [
            'reason' => 'required',
          ]);
          // get current item
          $item = Item::find($id);

          // create new request with the input values and save
          $requestItem = new RequestItem;
          $requestItem->reason = $request->input('reason');
          $requestItem->item_id = $item->id;
          $requestItem->user_id = $request->user()->id; // authenticated user id
          $requestItem->save();
          // success message
          return back()->with('success', 'Your request has been made');

        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $item = Item::find($id);
      $requestItem = RequestItem::where('item_id', $item->id)
        ->where('status', 'request')
        ->get();

      return view('items.list.requests', compact('requestItem', 'item'));
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

      $requestItem = RequestItem::find($id);
     
      // update if admin approves/refuses request
      if ($request->has('status')) {

        $item = Item::where('id', $requestItem->item_id)->firstOrFail();
      	$user = User::where('id', $requestItem->user_id)->firstOrFail();

        if ($request->input('status') === 'refuse'){
          $requestItem->status = 'refused';
          $requestItem->save();
          // send email: request denied
          Mail::to($user->email)->send(new RefuseMail());
          // generate a redirect HTTP response with success message
          return back()->with('success', 'Request successfully refused');

        } else {
          $requestItem->status = 'approved';
          $item->status = 'unavailable';
          $requestItem->save();
          $item->save();
          // send email: request approved
          Mail::to($user->email)->send(new ApproveMail());
          // generate a redirect HTTP response with success message
          return back()->with('success', 'Request successfully approved');
        }
      
      // update if user makes request
      }else{
      // form validation
      $requestItem = $this->validate(request(), [
        'reason' => 'required',
      ]);

      $item = Item::find($id);
      // create new request with the input values
      $requestItem = new RequestItem;
      $requestItem->reason = $request->input('reason');
      $requestItem->item_id = $item->id;
      $requestItem->user_id = $request->user()->id; // authenticated user id
      // safe request
      $requestItem->save();
      // success message
      return back()->with('success', 'Request successful');

      }
    }

}
