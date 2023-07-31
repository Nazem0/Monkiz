@php
    if (!empty(auth()->user())) {
        header('Location: ' . route('user.profile'));
        exit();
    }
@endphp

@extends('layout')
@section('main')
    <div class="container m-auto py-5 text-secondary">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-center mb-5">Registration</h1>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            placeholder="+20 10 XXXXXXXX">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <div class="d-flex flex-column gap-2">
                            <input class="form-control" list="governorate" name="governorate" id="state"
                                placeholder="Governorate">
                            <datalist id="governorate" name="governorate">
                                <option value="Alexandria">
                                <option value="Aswan">
                                <option value="Asyut">
                                <option value="Beheira">
                                <option value="Beni Suef">
                                <option value="Cairo">
                                <option value="Dakahlia">
                                <option value="Damietta">
                                <option value="Faiyum">
                                <option value="Gharbia">
                                <option value="Giza">
                                <option value="Ismailia">
                                <option value="Kafr El Sheikh">
                                <option value="Luxor">
                                <option value="Matruh">
                                <option value="Minya">
                                <option value="Monufia">
                                <option value="New Valley">
                                <option value="North Sinai">
                                <option value="Port Said">
                                <option value="Qalyubia">
                                <option value="Qena">
                                <option value="Red Sea">
                                <option value="Sharqia">
                                <option value="Sohag">
                                <option value="South Sinai">
                                <option value="Suez">
                            </datalist>
                            <input type="text" class="form-control" id="town" placeholder="City" name="city">

                            <input type="text" class="form-control" id="road" placeholder="Street" name="street">
                            <p class="btn btn-primary" onclick="getLocation()"><i
                                    class="fa-solid fa-location-dot text-white"></i>
                            </p>
                            <p class="text-danger" style="display:none;" id="message"></p>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Your Profile Picture</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option value="Client">Client</option>
                            <option value="Maintenance_Center">Maintenance Center</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn bg-primary text-white scale" type="submit">Create My Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
