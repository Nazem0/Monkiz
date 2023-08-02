@extends('layout')
@section('main')
    <div class="position-relative">
        <div>
            <img src="{{ asset('assets/img/landing_page/hero.png') }}" class="d-block w-100" alt="Cars">
        </div>
        <div class="text-center text-white shadow p-2 bg-dark bg-opacity-50 w-100
    position-absolute top-50">
            <h2>Monkiz</h2>
            <p>Connecting car owners to trusted maintenance centers.</p>
            @if (auth()->check()&&auth()->user()->role=='Client')
                <!-- Create New Task Modal -->
                <button type="button" class="btn btn-secondary bg-gradient scale text-white" data-bs-toggle="modal"
                    data-bs-target="#CreateTask">
                    Book a Service
                </button>
                <div class="modal fade text-black" id="CreateTask" tabindex="-1" aria-labelledby="CreateTaskModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="CreateTaskModalLabel">Book a Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('tasks.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" id="customer-id" name="customer_id"
                                            value="{{ auth()->user()->id }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <div class="d-flex flex-column gap-2">
                                            <input class="form-control" list="governorate" name="governorate" id="state"
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
                                            <input type="text" class="form-control" id="town" placeholder="City"
                                                name="city">

                                            <input type="text" class="form-control" id="road" placeholder="Street"
                                                name="street">
                                                <p class="btn btn-primary" onclick="getLocation()"><i
                                                    class="fa-solid fa-location-dot text-white"></i>
                                            </p>
                                            <p class="text-danger" style="display:none;" id="message"></p>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="car-model" class="form-label">Car Model</label>
                                        <input type="text" class="form-control" id="car-model" name="car_model" required>
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
                                                        alt="{{ $service['name'] }}" width="24" height="24">
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
    <div class="bg-light w-100">
        <div class="d-flex flex-column align-item-center container p-5 text-secondary">
            <h2 class="text-center mb-5">Urgent Repair</h2>
            <div class="row text-center row-cols-1 row-cols-md-1 row-cols-lg-2 g-5">
                <div class="col">
                    <div class="card scale h-100">
                        <div class="bg-image hover-overlay ripple ratio ratio-16x9" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/img/landing_page/anytime.svg') }}" class="card-img-top img-fluid ratio" />
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Any Time</h5>
                            <hr class="w-50 mx-auto">

                            <p class="card-text">
                                Our emergency service is available 24/7 to help you in case of car breakdowns or accidents
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card scale h-100">
                        <div class="bg-image hover-overlay ripple ratio ratio-16x9" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/img/landing_page/tow.svg') }}" class="card-img-top img-fluid ratio" />

                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Transport and Repair</h5>
                            <hr class="w-50 mx-auto">
                            <p class="card-text">
                                If extensive repairs are needed, we provide reliable transport to the nearest garage.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="d-flex flex-column align-item-center container p-5  text-secondary">
            <h2 class="text-center mb-5">Book Reliable Mechanic</h2>
            <div class="row text-center row-cols-1 row-cols-md-1 row-cols-lg-3 g-5">
                <div class="col">
                    <div class="card scale h-100">
                        <div class="bg-image hover-overlay ripple p-3" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/img/landing_page/choose.svg') }}"
                                class="card-img-top img-fluid rounded-circle shadow-sm" />

                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Choose your repairs</h5>
                            <hr class="w-75 mx-auto">

                            <p class="card-text">
                                Select your car, tell us what's wrong, and we'll find the right mechanic for you.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card scale h-100">
                        <div class="bg-image hover-overlay ripple p-3" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/img/landing_page/Date_Time_Location.svg') }}"
                                class="card-img-top img-fluid rounded-circle shadow-sm" />
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Date, time & location</h5>
                            <hr class="w-75 mx-auto">
                            <p class="card-text">
                                Our mechanic will come to your preferred address at your chosen date and time.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card scale h-100">
                        <div class="bg-image hover-overlay ripple p-3" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/img/landing_page/relax.svg') }}"
                                class="card-img-top img-fluid rounded-circle shadow-sm" />
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Sit back and relax!</h5>
                            <hr class="w-75 mx-auto">
                            <p class="card-text">
                                No need to go to the garage - just sit back, grab a drink, and enjoy your favourite show.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light text-center p-5 text-secondary w-100">
        <h2 class="mb-5">Our Services</h2>
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div
                            class="rounded-pill bg-white shadow-sm scale p-3 d-flex align-items-center justify-content-center gap-2">
                            <img style="width:32px;" src="{{ asset('storage/img/services/' . $service['icon']) }}"
                                alt="">
                            <span>
                                {{ $service['name'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <div class="container px-5">
            <!--Grid row-->
            <div class="row align-items-center pt-5">
                <!--Grid column-->
                <div class="col-lg-8 col-md-12 mb-4 mb-md-0 text-center text-secondary">
                    <h2>Apply to be a mechanic</h2>
                    <p>Join Monkiz as a mechanic or garage and accept the work you want. Free to join, with great
                        perks and discounts.</p>
                    <a href="/register" class="btn bg-secondary rounded-pill scale text-white">Join Us</a>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <img class="w-100" src="{{ asset('assets/img/landing_page/mechanic.svg') }}" alt="">
                </div>
                <!--Grid column-->
            </div>
        </div>
    </div>
    <section class="w-100 py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm d-flex flex-column justify-content-between scale">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x mb-3 text-primary"></i>
                            <h5 class="card-title mb-0">Clients</h5>
                            <div class="counter h3 font-weight-bold">
                                {{ $counter['clients'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm d-flex flex-column justify-content-between scale">
                        <div class="card-body text-center">
                            <i class="fas fa-tools fa-2x mb-3 text-primary"></i>
                            <h5 class="card-title mb-0">Maintenance Centers</h5>
                            <div class="counter h3 font-weight-bold">
                                {{ $counter['mcs'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm d-flex flex-column justify-content-between scale">
                        <div class="card-body text-center">
                            <i class="fas fa-tasks fa-2x mb-3 text-primary"></i>
                            <h5 class="card-title mb-0">Repairation Tasks</h5>
                            <div class="counter h3 font-weight-bold">{{ $counter['tasks'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm d-flex flex-column justify-content-between scale">
                        <div class="card-body text-center">
                            <i class="fas fa-comment fa-2x mb-3 text-primary"></i>
                            <h5 class="card-title mb-0">Offers</h5>
                            <div class="counter h3 font-weight-bold">{{ $counter['offers'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
