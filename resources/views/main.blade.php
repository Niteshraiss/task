@extends('layouts.app')
@section('content')
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h3 class="text-center">Registration</h3>
<form action="{{route('register')}}" method="POST" id="myForm">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('email') is-invalid @enderror" id="name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" name="surname" class="form-control" id="surname">
                @error('surname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number" name="phone" min="0" class="form-control" id="phone">
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address">
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="pincode" class="form-label">Pincode</label>
                <input type="number" name="pincode" class="form-control" id="pincode">
                @error('pincode')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <label class="input-group-text" for="state">State</label>
                <select class="form-select" name="state_id" id="state">
                    <option value="">Select a state</option>
                    @foreach ($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
                @error('state')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <label class="input-group-text" for="city">City</label>
                <select class="form-select" name="city_id" id="city">
                    <option value="">Select a city</option>
                </select>
                @error('city')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success">Register</button>
        </div>
    </div>
</form>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $("#myForm").validate({
            errorClass: "text-danger",
            rules: {
                name: {
                    required: true,
                },
                surname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                address: {
                    required: true
                },
                pincode: {
                    required: true,
                    minlength: 6
                },
                state_id: {
                    required: true
                },
                city_id: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                name: {
                    required: "Name field is required",
                },
                surname: {
                    required: "Surname field is required"
                },
                email: {
                    required: "Email field is required",
                    email: "Enter a valid email address",
                },
                phone: {
                    required: "Phone number field is required",
                    minlength: "Enter a valid phone number",
                },
                address: {
                    required: "Address field is required",
                },
                pincode: {
                    required: "Pincode field is required",
                    minlength: "Enter a valid pincode",
                },
                state_id: {
                    required: "Select a state",
                },
                city_id: {
                    required: "Select a city",
                },
                password: {
                    required: "Password field is required",
                    minlength: "Minimum length should be of 8 characters",
                },
                password_confirmation: {
                    required: "Confirm password is required",
                    equalTo: "Password field and confirm password should ne same"
                },
            }
        });


        $("#state").change(function() {
            let selectedValue = $(this).children("option:selected").val();
            $.ajax({
                method: "GET",
                url: "{{route('city')}}",
                data: {
                    "id": selectedValue
                },
                success: function(response) {
                    $("#city").empty();
                    if (response.status == 200) {
                        response.data.forEach(e => {
                            $("#city").append(`<option value="${e.id}">${e.name}</option>`);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error);
                    $("#city").empty().append('<option value="">Error loading cities</option>');
                }
            });
        });
    })
</script>
@endpush