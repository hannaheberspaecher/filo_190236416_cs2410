@extends('layouts.show')

@section('edit')
<table><tr>
  <td><a href="{{action('ItemController@edit', $item['id'])}}" class="btn btn- warning">Edit</a></td>
  <td><form action="{{action('ItemController@destroy', $item['id'])}}" method="post"> @csrf
    <input name="_method" type="hidden" value="DELETE">
    <button class="btn btn-danger" type="submit">Delete</button>
  </form></td>
  <td><a href="{{route('items.index')}}" class="btn btn-secondary" role="button">See all items</a></td>
</tr></table>
@endsection

@section('request')
<div class="col-3">
  <div class="card" style="width: 100%;">
    <div class="card-body">
      <h5 class="card-title"><b>Request</b></h5>
      <h6 class="card-subtitle mb-2 text-muted">status: {{$item->status}}</h6>
      <br/>

        @if(count($requestItem)===0)
        <p class="card-text">There are no requests yet.</p>
        @else
        <p class="card-text">This item is still availble but there are requests.</p>
        <a href="{{action('RequestItemController@show', $item['id'])}}" class="btn btn-primary" role="button">See requests</a>
        @endif

    </div>
  </div>

</div>
@endsection
