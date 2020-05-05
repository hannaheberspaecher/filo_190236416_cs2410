
@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">Status</div>
    <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      <div class="container-fluid">
        <div class="row">
            <label><b>You are logged in!</b></label>
        </div>

        <div class="row mt-3">
          <a href="{{ route('home') }}" class="btn btn-success">Lets start</a>
        </div>

    </div>
  </div>
</div>
</div>
@endsection
