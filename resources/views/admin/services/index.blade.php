@if (auth()->user()->role != 'Admin')
    <h1>You are not Administrator</h1>
    @php return; @endphp
@endif


@extends('layout')

@section('main')
    <div class="container-fluid">
        <div class="row row-cols-2">
            @include('admin.sidebar')
            <div class="flex-fill d-flex flex-column">
                @include('admin.messages')

                <!-- Button trigger modal -->
                <button type="button" class="btn bg-success bg-gradient text-white" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="fa-solid fa-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addModalLabel">Create Service</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="icon">Icon</label>
                                        <input type="file" name="icon" id="icon" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Create Service</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="h-100">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/img/services/' . $service['icon']) }}"
                                                class="rounded-circle img-fluid shadow-sm scale"
                                                style="width: 40px; height:40px">
                                        </td>
                                        <td>{{ $service['name'] }}</td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a class="btn bg-warning rounded-circle scale text-white"
                                                    href="{{ route('service.edit', ['id' => $service->id]) }}">
                                                    <i class="fa-solid fa-pen-nib"></i>
                                                </a>
                                                <form action="{{ route('service.delete', $service['id']) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger rounded-circle text-white scale"
                                                        style="width:40px;">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
