@extends('layouts.show')

@section('request')

<div class="col-3">
  <div class="card" style="width: 100%;">
    <div class="card-body">
      <h5 class="card-title"><b>Yours?</b></h5>
      <h6 class="card-subtitle mb-2 text-muted">Make a request and give a reason or go back to the list</h6>
      <br/>

      <form method="POST" action="{{ action('RequestItemController@update', $item['id']) }} " enctype="multipart/form-data" >
        <!-- @method('PATCH') field to generate the _method input -->
        @method('PATCH')
        @csrf

        <div class="form-group">
          <label><b>Reason:</b></label>
          <br/>
          <textarea class="form-controll" rows="5" name="reason">
          </textarea>
          <br/>
        <div/>

        <div class="row mt-3">
          <div class="col">
            <input type="submit" class="btn btn-success" value="Request" />
            <a href="{{route('items.index')}}" class="btn btn-primary" role="button">Back to items</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
