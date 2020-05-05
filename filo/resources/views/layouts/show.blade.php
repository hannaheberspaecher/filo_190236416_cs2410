@extends('layouts.app')

@section('content')
<div class="container-fluid">

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

  <div class="row">
    <div class="col-3">
      <div class="card" style="width: 18rem">
        <img class="card-img-top" src="{{ asset('storage/images/'.$item->image)}}">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Photo</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card" style="width: 100%;">
        <div class="card-body">
          <table class="table table-bordered" border="1" >
            <tr> <th>Description</th> <td>{{$item->description}}</td></tr>
            <tr> <th>Time found</th> <td>{{$item->foundtime}}</td></tr>
            <tr> <th>Found place</th> <td>{{$item->foundplace}}</td></tr>
            <tr> <th>Colour</th> <td>{{$item->colour}}</td></tr>
            <tr> <th>Notes</th> <td style="max-width:150px;" >{{$item->other}}</td></tr>
            <tr> <th>Person who found </th> <td>{{$item->founduser}}</td></tr>
            @yield('edit')
          </table>
        </div>
      </div>
    </div>
    @yield('request')
  </div>



    </div>
  </div>
</div>
@endsection
