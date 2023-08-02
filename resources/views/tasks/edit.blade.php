@extends('layout')
@section('main')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="d-flex flex-column gap-2">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row" hidden readonly>
                                <input id="customer_id" type="text" class="form-control" name="customer_id"
                                    value="{{ $task->customer_id }}" required autocomplete="customer_id">
                            </div>
                            <div class="form-group row">
                                <label for="address" class="form-label">Address</label>
                                <div class="d-flex flex-column gap-2">

                                    <input type="text" class="form-control" id="road" placeholder="City"
                                        name="city" value="{{$task->city}}">
                                        <p class="btn btn-primary" onclick="getLocation()"><i
                                            class="fa-solid fa-location-dot text-white"></i>
                                    </p>
                                    <p class="text-danger" style="display:none;" id="message"></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_model" class="col-md-4 col-form-label text-md-right">Car Model</label>

                                <div class="col-md-6">
                                    <input id="car_model" type="text" class="form-control" name="car_model"
                                        value="{{ $task->car_model }}" required autocomplete="car_model">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" required autocomplete="description" rows="5">{{ $task->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Required
                                    Services</label>
                                <div class="col row row-cols-2">
                                    @foreach ($services = \App\Models\Service::all() as $service)
                                        <div class="col">
                                            <img src="{{ asset('storage/img/' . $service['icon']) }}"
                                                alt="{{ $service['name'] }}" width="24" height="24">
                                            <span>{{ $service['name'] }}</span>
                                            <input type='checkbox' name='services[]' value="{{ $service['id'] }}"
                                                {{ $task->services->contains($service['id']) ? 'checked' : '' }}>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
