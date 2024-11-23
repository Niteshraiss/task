@extends('layouts.app')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">
    @if (Auth::user())
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Your details</h5>
            <hr>
            <p class="card-text"><span class="fw-bold">Full name:</span> {{$user->name}} {{$user->surname}}</p>
            <p class="card-text"><span class="fw-bold">Email:</span> {{$user->email}}</p>
            <p class="card-text"><span class="fw-bold">Contact Number:</span> {{$user->phone}}</p>
            <p class="card-text"><span class="fw-bold">Address:</span>{{$user->address}}</p>
            <p class="card-text"><span class="fw-bold">Pincode:</span> {{$user->pincode}}</p>
            <p class="card-text"><span class="fw-bold">State:</span> {{$user->state->name}}</p>
            <p class="card-text"><span class="fw-bold">City:</span> {{$user->cities->name}}</p>
        </div>
    </div>
    @endif
</div>
@endsection