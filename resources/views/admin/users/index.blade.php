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
                        <select name="role" class="form-select">
                            <option value="" hidden>Filter by Role</option>
                            <option value="Client">Clients</option>
                            <option value="Maintenance_Center">Maintenance Centers</option>
                            <option value="Admin">Admins</option>
                        </select>
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Role</th>
                                    <th>Creation</th>
                                    <th>Activity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/img/' . $user['image']) }}"
                                                class="rounded-circle img-fluid shadow-sm scale"
                                                style="width: 40px; height:40px">
                                        </td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['phone'] }}</td>
                                        <td>{{ $user['city'] }}</td>
                                        <td>{{ $user['role'] }}</td>
                                        <td>{{ $user['created_at'] }}</td>
                                        <td>{{ $user->role == 'Client' ? \App\Models\Task::where('customer_id', $user->id)->count() : '' }}{{ $user->role == 'Maintenance_Center' ? $user->offers()->count() : '' }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a class="btn bg-warning rounded-circle scale text-white"
                                                    href="{{ route('user.edit', ['id' => $user->id]) }}">
                                                    <i class="fa-solid fa-pen-nib"></i>
                                                </a>
                                                <form action="{{ route('user.delete', $user['id']) }}" method="post">
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
                <div class="d-flex justify-content-center mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
