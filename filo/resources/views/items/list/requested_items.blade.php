@extends('layouts.index')

@section('title', 'Requested items')

@section('no_requests')
    @if(count($items)===0)
    <h6 class="card-subtitle mb-2 text-muted">Seems like there are currently no requests.</h6>
    @endif
@endsection
