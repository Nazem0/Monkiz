@extends('layout')
@section('main')

        <div class="w-100 bg-light py-5 h-100 ">
            <div class="container d-flex justify-content-center align-items-center h-100">
                    <div class="card rounded">
                        <div class="card-body text-center d-flex flex-column align-items-center gap-1 p-4">
                            <div>
                                <img src="{{ asset('storage/img/' . $user['image']) }}"
                                    class="rounded-circle img-fluid shadow-sm scale" style="width: 100px;">
                            </div>
                            <hr class="w-75">
                            <h4>{{ $user['name'] }}</h4>
                            <span><strong>Email:</strong> {{ $user['email'] }}</span>
                            <span><strong>Phone:</strong> {{ $user['phone'] }}</span>
                            <span><strong>Location:</strong> {{ $user['city'] }}</span>
                            <span><strong>Role:</strong> {{ $user['role'] }}</span>
                            <span class="text-muted"><strong>Created at:</strong>
                                {{ $user['created_at'] }}</span>
                            <a class="btn bg-warning btn-rounded scale text-white" href="{{route('user.edit',$user['id'])}}">
                                <i class="fa-solid fa-pen-nib"></i>
                            </a>


                            <a class="btn bg-secondary bg-gradient scale" href="{{ route('tasks') }}">Show
                                Tasks</a>
                                @if(auth()->user()->role=='Maintenance_Center')
                            <a class="btn bg-secondary bg-gradient scale" href="{{ route('my_offers') }}">Show
                                Offers</a>
                                <span><strong>Offers:</strong> {{ auth()->user()->offers()->count() }}</span>

                                @endif
                            @if (auth()->user()->role != 'Maintenance_Center')
                                <span><strong>Tasks
                                        count:</strong>{{ \App\Models\Task::where('customer_id', auth()->user()->id)->count() }}</span>

                                <!-- Create New Task Modal -->


                                <button type="button" class="btn bg-success bg-gradient scale text-white"
                                    data-bs-toggle="modal" data-bs-target="#CreateTask">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <div class="modal fade" id="CreateTask" tabindex="-1"
                                    aria-labelledby="CreateTaskModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="CreateTaskModalLabel">Create Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('tasks.store') }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="hidden" class="form-control" id="customer-id"
                                                            name="customer_id" value="{{ auth()->user()->id }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <div class="d-flex flex-column gap-2">
                                                            <input class="form-control" list="governorate"
                                                                name="governorate" id="state"
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
                                                            <input type="text" class="form-control" id="town"
                                                                placeholder="City" name="city">

                                                            <input type="text" class="form-control" id="road"
                                                                placeholder="Street" name="street">

                                                                <p class="btn btn-primary" onclick="getLocation()"><i
                                                                        class="fa-solid fa-location-dot text-white"></i>
                                                                </p>
                                                                <p class="text-danger" style="display:none;" id="message"></p>

                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="car-model" class="form-label">Car Model</label>
                                                        <input type="text" class="form-control" id="car-model"
                                                            name="car_model" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="services" class="form-label">Required Services</label>
                                                        <span class="row row-cols-2 flex-wrap m-auto">
                                                            @foreach ($services = \App\Models\Service::all() as $service)
                                                                <span class="col">
                                                                    <img src="{{ asset('storage/img/services/' . $service['icon']) }}"
                                                                        alt="{{ $service['name'] }}" width="24"
                                                                        height="24">
                                                                    <span>{{ $service['name'] }}</span>
                                                                    <input type='checkbox' name='services[]'
                                                                        value="{{ $service['id'] }}">
                                                                </span>
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                    <button type=" submit" class="btn btn-primary">Create</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

@endsection
