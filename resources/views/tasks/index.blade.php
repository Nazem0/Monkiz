@extends('layout')
@section('main')
    <form method="post" action="{{ route('tasks.search') }}" class="w-50 m-auto pt-3">
        @csrf
        <div class="input-group p-2">
            <input type="text" name="search" class="form-control text-center" placeholder="Search">
            <button class="input-group-text bg-primary border-0 text-white"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>
    @if (session()->has('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('message'))
    <div id="message-alert" class="alert alert-warning">
        {{ session('message') }}
    </div>
@endif

<script>
    setTimeout(function() {
        $('#success-alert').fadeOut('fast');
    }, 2000);
</script>
    <div class="w-75 m-auto py-3">
        <div class="row row-cols-1 g-5">
            @foreach ($tasks as $task)
                <div class="col">
                    <div class="card text-center">
                        <div
                            class="card-header d-flex align-items-center @if (auth()->user()->role == 'Maintenance_Center') justify-content-center @else justify-content-between @endif bg-secondary bg-gradient">
                            {{-- if not the client print this --}}
                            @if (auth()->user()->role != 'Client')
                                <div class="d-flex gap-3 align-items-center">
                                    <img class='rounded-circle img-fluid shadow-sm scale bg-light'
                                        style='height: 40px; width: 40px;'
                                        src="{{ asset('storage/img/' . $task->user->image) }}">
                                    <span>{{ $task->user->name }}</span>
                                </div>
                            @endif
                            @if (auth()->user()->role == 'Client')
                                <div class="text-center">
                                    Created at: {{ $task->created_at }}
                                    @if ($task->created_at != $task->updated_at)
                                        | Updated at: {{ $task->updated_at }}
                                    @endif
                                </div>
                            @endif
                            <div>
                                <div class="d-flex align-items-center justify-content-end">
                                    @if (auth()->user()->role != 'Maintenance_Center')
                                        <a class="btn btn-warning rounded-circle text-white scale" style="width:40px;"
                                            href="{{ route('tasks.edit', $task->id) }}">
                                            <i class="fa-solid fa-pen-nib"></i>
                                        </a>
                                        <form action="{{ route('tasks.delete', $task['id']) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger rounded-circle text-white scale" style="width:40px;">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->car_model }}</h5>
                            <p class="card-text">{{ $task->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Location: {{ $task->city }}</li>
                            @if (auth()->user()->role != 'Maintenance_Center')
                            <li class="list-group-item">Status: {{ $task->status }}</li>
                            @endif
                            @if (auth()->user()->role != 'Client')
                                <li class="list-group-item">Created at: {{ $task->created_at }}
                                    @if ($task->created_at != $task->updated_at)
                                        | Updated at: {{ $task->updated_at }}
                                    @endif
                                </li>
                            @endif
                            @if (!empty(($services = $task->services)))
                                <li class="list-group-item ">
                                    <span>Required Services :</span>
                                    <span class="d-flex flex-wrap gap-2 w-50 m-auto justify-content-center">
                            @endif
                            @foreach ($services as $service)
                                <span>
                                    <img src="{{ asset('storage/img/services/' . $service['icon']) }}" alt="{{ $service['name'] }}"
                                        width="24" height="24">
                                    <span>{{ $service['name'] }}</span>
                                </span>
                            @endforeach
                            </span>
                            </li>
                            <!-- Send Offer Form -->
                            @if((auth()->user()->role != 'Client') && (!$task->offers->contains('maintenance_center_id', auth()->id())))
                                <li class="list-group-item">
                                    <form method="post" action="{{ route('offers.store') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="task_id" class="form-control text-center" hidden
                                                value={{ $task->id }}>
                                            <input type="text" name="description" class="form-control text-center"
                                                placeholder="Place your offer $">
                                            <button class="input-group-text bg-secondary">Submit</button>
                                        </div>
                                    </form>
                                </li>
                            @endif

                            @if (!empty(($offers = $task->offers->all())))
                                <li class='list-group-item'>
                                    <button class='btn btn-primary m-auto scale' type='button' data-bs-toggle='collapse'
                                        data-bs-target="#task{{ $task['id'] }}" aria-expanded='false'
                                        aria-controls="task{{ $task['id'] }}">
                                        Show Offers
                                    </button>
                                </li>
                                <div class='collapse' id="task{{ $task['id'] }}">
                            @else
                            <li class='list-group-item'><button class="btn bg-danger text-white">Still waiting for offers</button></li>
                            @endif
                            @foreach ($offers as $offer)
                                <li class='list-group-item'>
                                    <div>
                                        <h5 class="d-flex align-items-center justify-content-center">
                                            {{ $offer->user->name }}
                                            @if (auth()->user()->id == $offer['maintenance_center_id'] || auth()->user()->role == 'Admin')
                                                <button class="btn btn-warning rounded-circle text-white scale ms-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editOfferModal{{ $offer->id }}" style="width:40px;">
                                                    <i class="fa-solid fa-pen-nib"></i>
                                                </button>
                                                <form action="{{ route('offers.delete', ['offer_id' => $offer['id']]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger rounded-circle text-white scale ms-2" style="width:40px;"><i
                                                            class="fa-solid fa-xmark"></i></button>
                                                </form>
                                            @endif
                                        </h5>
                                        <a class='text-decoration-none'
                                            href="tel:{{ $offer->user->phone }}">{{ $offer->user->phone }}</a>
                                        <span>{{ $offer->user->city }}</span>
                                    </div>
                                    <span class='p-1 rounded offer-description'>
                                        {{ $offer['description'] }}
                                    </span>
                                    <br>
                                    <span>{{ $offer['created_at'] }}</span>
                                </li>

                                <!-- Edit offer modal -->
                                <div class="modal fade" id="editOfferModal{{ $offer->id }}" tabindex="-1"
                                    aria-labelledby="editOfferModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editOfferModalLabel">Edit Offer Description</h5>
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
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>
@endsection
