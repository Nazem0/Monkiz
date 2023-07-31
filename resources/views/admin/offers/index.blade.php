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
                    <!-- Main content -->
                    @include('admin.messages')
                    {{-- <button class="btn bg-success bg-gradient text-white"><i class="fa-solid fa-plus"></i></button> --}}
                    <!-- better check this h-75 to avoid future problems -->
                    <div class="h-75">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Car Model</th>
                                        <th>Location</th>
                                        <th>Maintenance Center</th>
                                        <th>Offer</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $offer)
                                        <tr>
                                            @php
                                                $task = $tasks->where('id', $offer->task_id)->first();
                                                $car_model = $task->car_model;
                                                $services = $task->services;
                                            @endphp
                                            <td>{{ $car_model }}</td>
                                            <td>{{ $task->city }}</td>
                                            <td>{{ $offer->user->email }}</td>
                                            <td>{{ $offer->description }}</td>
                                            <td>{{ $offer->created_at }}</td>
                                            <td>{{ $offer->updated_at }}</td>
                                            <td class="d-flex justify-content-center">
                                                @if (auth()->user()->role == 'Maintenance_Center')
                                                    <button class="btn btn-warning rounded-circle text-white scale ms-2"
                                                        data-bs-toggle="modal" data-bs-target="#editOfferModal{{ $offer->id }}"
                                                        style="width:50px">
                                                        <i class="fa-solid fa-pen-nib"></i>
                                                    </button>

                                                    <!-- Edit offer modal -->
                                                    <div class="modal fade" id="editOfferModal{{ $offer->id }}" tabindex="-1"
                                                        aria-labelledby="editOfferModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editOfferModalLabel">Edit Offer
                                                                        Description</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('offers.update', ['offer_id' => $offer->id]) }}"
                                                                    method="post">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="description" class="form-label">Description</label>
                                                                            <input type="text" class="form-control" id="description"
                                                                                name="description" value="{{ $offer['description'] }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <form action="{{ route('offers.delete', ['offer_id' => $offer['id']]) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger rounded-circle text-white scale ms-2"
                                                        style="width:50px"><i class="fa-solid fa-xmark"></i></button>
                                                </form>
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
