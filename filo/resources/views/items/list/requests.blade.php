@extends('layouts.app')

@section('content')
<!-- display errors -->
@if ($errors->any())
<div class="alert alert-danger">
  <ul> @foreach ($errors->all() as $error)
    <li>{{ $error }}</li> @endforeach
  </ul>
</div>
<br />
@endif

<!-- display success status -->
@if (\Session::has('success'))
<div class="alert alert-success">
  <p>{{ \Session::get('success') }}</p>
</div><br />
@endif

<div class="container-fluid">
      <div class="card">
        <div class="card-header"><b>Requests</b></div>
        <div class="card-body">

          @if(count($requestItem)===0)
          <h6 class="card-subtitle mb-2 text-muted">Seems like there are currently no requests for this item.</h6>
          @endif

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Status</th>
                <th>Reason</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($requestItem as $request)
              <tr>
                <td>{{$request['status']}}</td>
                <td>{{$request['reason']}}</td>

                <td><form method="POST" action="{{ action('RequestItemController@update', $request['id']) }} " enctype="multipart/form-data" >
                  <!-- @method('PATCH') field to generate the _method input -->
                  @method('PATCH')
                  @csrf
                  <div class="radio">
                    <label><input type="radio" name="status" value="approve">Approve</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="status" value="refuse">Refuse</label>
                  </div>
                  <input type="submit" class="btn btn-success" value="Submit" />
                </form></td>
              
              </tr>
              @endforeach
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection
