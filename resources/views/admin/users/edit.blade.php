@php
if (auth()->id()!=$user['id'])
{
  return back();
}
@endphp
@extends("layout")
@section("main")

<div class="card-body text-center d-flex flex-column align-items-center gap-1 p-4">
    <div>
        <img src="{{ asset('storage/img/' . $user['image']) }}"
            class="rounded-circle img-fluid shadow scale" style="height: 100px;" />
    </div>
    <hr class="w-50">

    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name"
                name="name" value="{{ $user['name'] }}">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email"
                name="email" value="{{ $user['email'] }}">
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone"
                name="phone" value="{{ $user['phone'] }}">
        </div>
        <div class="form-group mb-3">
            <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="road"
                    placeholder="Address" name="city" value="{{$user['city']}}">

                            <p class="btn btn-primary" onclick="getLocation()"><i
                                    class="fa-solid fa-location-dot text-white"></i>
                            </p>
                            <p class="text-danger" style="display:none;" id="message"></p>
        </div>
        <div class="form-group mb-3">
            <label for="image" class="form-label">Profile
                Picture</label>
            <input type="file" class="form-control" id="image"
                name="image">
        </div>
        <div class="form-group mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="Client" {{ $user['role'] == 'Client' ? 'selected' : '' }}>Client</option>
                <option value="Maintenance_Center" {{ $user['role'] == 'Maintenance_Center' ? 'selected' : '' }}>Maintenance Center</option>
                @if(auth()->user()->role == 'admin')
                <option value="Admin" {{ $user['role'] == 'Admin' ? 'selected' : '' }}>Admin</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary scale">Save</button>
    </form>
</div>
@endsection
