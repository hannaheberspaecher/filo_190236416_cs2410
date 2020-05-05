@extends('layouts.app')
@section('content')
<div class="container-fluid">

      <div class="card">
        <div class="card-header">Edit item</div>

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

        <!-- define the form -->
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ action('ItemController@update', $item['id']) }} " enctype="multipart/form-data" >
            <!-- @method('PATCH') field to generate the _method input -->
            @method('PATCH')
            @csrf

            <!-- category -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm">
                  <label><b>Category</b></label>
              <br/>
              <select name="category" value="{{ $item->category }}">
                <option value="pet">Pet</option>
                <option value="phone">Phone</option>
                <option value="jewellery">Jewellery</option>
              </select>
            </div>

            <!-- found time -->
            <div class="col">
              <label><b>Time of finding</b></label>
              <br/>
              <input type="date" class="form-controll" name="foundtime" value="{{ $item->foundtime }}">
            </div>

            <!-- found user -->
            <div class="col">
              <label><b>Person who found</b></label>
              <br/>
              <input type="text" name="founduser" value="{{ $item->founduser }}">
            </div>

            <!-- found place -->
            <div class="col">
              <label><b>Place where found</b></label>
              <br/>
              <input type="text" name="foundplace" value="{{$item->foundplace}}" />
            </div>

            <!-- colour -->
            <div class="col">
              <label><b>Colour</b></label>
              <br/>
              <input type="text" name="colour" value="{{$item->colour}}" />
            </div>
          </div>

          <div class="row mt-3">
            <!-- description -->
            <div class="col-4">
              <label><b>Description</b></label>
              <br/>
              <textarea rows="4" cols="50" name="description" value="{{$item->description}}">
              </textarea>
            </div>

            <!-- other -->
            <div class="col-8">
              <label><b>Other</b></label>
              <br/>
              <textarea rows="4" cols="50" name="other" value="{{$item->other}}">
              </textarea>
            </div>
          </div>

            <div class="row mt-3">
            <!-- image -->
            <div class="col">
              <label><b>Image</b></label>
              <input type="file" name="image" />
            </div>
            </div>

            <div class="row mt-3">
              <div class="col">
                <input type="submit" class="btn btn-success" value="Edit" />
                <a href="{{action('ItemController@show', $item['id'])}}" class="btn btn-dark">Chancel</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

  @endsection
