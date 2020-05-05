@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="col">
    @if (Gate::allows('admin'))
    <h1><b>Welcome Admin</b></h1>
    <br/>

    <h2>What is FiLo? </h2>
    <p>Everyday, hundreds and thousands of valuable items are lost from home, trains, and airports etc.
    Many of those lost items are never returned to their owners because it is just very difficult to link a lost
    item to the owner.</p>

    <p>FiLo system is a possible solution to this problem: user can check their lost items and add new items they found.</p>

    <h2>What are your admin rights? </h2>
    <p>Your can view all the requests and either approve or refuse them. Furthermore, you can view all regular items
    and edit or delete them. If you want you can add items like a regular user.</p>

    @elseif ($user=Auth::guest())
    <h1><b>Welcome to {{ config('app.name') }}</b></h1>
    <br/>

    <h2>What is it? </h2>
    <p>Everyday, hundreds and thousands of valuable items are lost from home, trains, and airports etc.
    Many of those lost items are never returned to their owners because it is just very difficult to link a lost
    item to the owner. This a new Find-the-Lost website called FiLo system. </p>
    <p>The system provides information about lost items, so that users could check their lost items there
    and add new items they found into it.</p>
    <br/>

    <h2>What to do? </h2>
    <p>If you are already registered log in and lets go: find what you are missing and enable people to get back
    what they are missing. If you find an item that is yours you can request it, giving a reason. You will be notified if your request was refused or denied.</p>
    <p> Don't have an account? Browse the items without being able to see details, request or add items. Feel free to join the vision and register!  </p>
    <br/>
  
    @elseif ($user=Auth::user())
    <h1><b>Welcome to {{ config('app.name') }}</b></h1>
    <br/>
    <h2>Thank you</h2>
    <p>Thank you for supporting our vision through being a registered user. We hope you will find your lost and help others to find their lost properties!</p>
    <br/>
    <h2>What is it? </h2>
    <p>Everyday, hundreds and thousands of valuable items are lost from home, trains, and airports etc.
    Many of those lost items are never returned to their owners because it is just very difficult to link a lost
    item to the owner. This a new Find-the-Lost website called FiLo system. </p>
    <p>The system provides information about lost items, so that users could check their lost items there
    and add new items they found into it.</p>
    <br/>
  
    @endif
  
    <div class="card">
       <div class="card-header"><b>Success Stories</b></div>
          <div class="card-body">

          <h6 class="card-subtitle mb-2 text-muted">Items where request was approved.</h6>
        </br>
       
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Category</th>
                <th>Colour</th>
                <th>Found time</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr>
                <td>{{$item['category']}}</td>
                <td>{{$item['colour']}}</td>
                <td>{{$item['foundtime']}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
@endsection
