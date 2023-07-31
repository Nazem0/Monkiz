@php
    if (auth()->user()->role != 'Admin') {
        return back();
    }
@endphp
@extends('layout')
@section('main')
    <div class="container-fluid">
        <div class="row row-cols-2">
            @include('admin.sidebar')
            <div class="card-body text-center d-flex flex-column align-items-center gap-1 p-4 flex-fill">
                <div>
                    <img src="{{ asset('storage/img/services/' . $service['icon']) }}" class="rounded-circle img-fluid shadow scale"
                        style="height: 40px;" />
                </div>
                <hr class="w-50">

                <form action="{{ route('service.update', $service['id']) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $service['name'] }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="icon" class="form-label">
                            Icon</label>
                        <input type="file" class="form-control" id="icon" name="icon">
                    </div>
                    <button type="submit" class="btn btn-primary scale">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
