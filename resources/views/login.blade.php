@php
if(!empty(auth()->user()))
{
	header('Location: ' . route('user.profile'));
	exit;
}
@endphp
@extends('layout')
@section('main')
@if (session()->has("error"))
    <div class="alert alert-danger w-100">
        {{ session("error") }}
    </div>
@endif
    <div class="container text-secondary m-auto py-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <h1 class="text-center mb-5">Login</h1>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-primary scale text-white" type="submit">Login</button>
                    </div>
                    <div class="text-center mt-3 scale">
                        <a class="text-primary " href="/register">Don't have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
@endsection
