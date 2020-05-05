@extends('layouts.app')

@section('content')
<div class="container-fluid">
      <div class="card">
        <div class="card-header"><b>@yield('title')</b></div>
        <div class="card-body">
        
                <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul> @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
          </ul>
        </div>
        <br />
        @endif

        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br /> @endif
        
          @yield('no_requests')
          @guest
          <h6 class="card-subtitle mb-2 text-muted">Want so see more? Register to be able to see details of items.</h6>
        </br>
          @endguest
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Category</th>
                <th>Colour</th>
                <th>Found time</th>

                @guest
                @else
                <th>Action</th>
                @endguest
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr>
                <td>{{$item['category']}}</td>
                <td>{{$item['colour']}}</td>
                <td>{{$item['foundtime']}}</td>



                @guest
                @else
                <td><a href="{{action('ItemController@show', $item['id'])}}" class="btn btn-primary">Details</a></td>
                @endguest

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection
