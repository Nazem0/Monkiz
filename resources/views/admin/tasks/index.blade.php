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
                <form method="post" action="{{ route('admin.user.search') }}" class="w-50m-auto">
                    @csrf
                    <div class="input-group p-2">
                        <input type="text" name="search" class="form-control text-center" placeholder="Search">
                        <button class="input-group-text bg-primary border-0 text-white"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <!-- Main content -->
                @include('admin.messages')
                {{-- <button class="btn bg-success bg-gradient text-white"><i class="fa-solid fa-plus"></i></button> --}}
                <!-- better check this h-75 to avoid future problems -->
                <div class="h-75">
                    <div class="table-responsive">
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Location</th>
                                    <th>Car Model</th>
                                    <th>Description</th>
                                    <th>Services</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>
                                            {{ $task->user->name }}
                                        </td>
                                        <td>{{ $task['city'] }}</td>
                                        <td>{{ $task['car_model'] }}</td>
                                        <td class="text-justify" title="Created at: {{$task['created_at']}}&#013Updated at: {{$task['updated_at']}}">{{ $task['description'] }}</td>
                                        <td>
                                            @foreach ($task->services as $service)
                                            <span class="text">{{$service['name']}}</span>
                                        @endforeach
                                        </ul>
                                        <td>{{ $task['status'] }}</td>
                                        <td>
                                            <a href='{{ route('task.status', [$task['id'], 'approved']) }}'
                                                class='btn btn-success'><i class="fa-solid fa-thumbs-up"></i></a>
                                            <a href='{{ route('task.status', [$task['id'], 'rejected']) }}'
                                                class='btn btn-warning'><i class="fa-solid fa-thumbs-down"></i></a>
                                                <form action="{{ route('tasks.delete', $task['id']) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger rounded-circle text-white scale" style="width:40px;">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
