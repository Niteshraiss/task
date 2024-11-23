@extends('layouts.app')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h3 class="text-center">Login</h3>
<div class="container">
    <form action="{{route('logincheck')}}" method="GET" id="myForm">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Login</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $("#myForm").validate({
            errorClass: "text-danger",
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {

                email: {
                    required: "Email field is required",
                    email: "Enter a valid email address",
                },
                password: {
                    required: "Password field is required",
                    minlength: "Minimum length should be of 8 characters",
                }
            }
        });
    })
</script>
@endpush