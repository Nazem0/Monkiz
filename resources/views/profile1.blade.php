@extends('layout')
@section('main')
    {{-- <div class="card shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 18rem;">
        <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" class="card-img-top" alt="...">
      </div> --}}

        <div class="container my-auto">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3 shadow-sm" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 bg-secondary bg-gradient text-center text-white p-2 rounded-start d-flex align-items-center">

                                <img  src="{{ asset('storage/img/' . $user['image']) }}" alt="Avatar"
                                    class="img-fluid rounded-circle w-100"/>

                                {{-- <a href="#!" class="btn btn-outline-light btn-sm mb-4"><i class="far fa-edit"></i> Edit
                                    Profile</a> --}}
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Maintenance Center Details</h6>

                                    <hr class="mt-0 mb-4">
                                    <div class="pt-1">
                                        <div>
                                            <h6>Name</h6>
                                            <p class="text-muted">{{ $user->name }}</p>
                                        </div>
                                        <div>
                                            <h6>Address</h6>
                                            <p class="text-muted">{{ $user->city }}</p>
                                        </div>
                                        <div>
                                            <h6>Email</h6>
                                            <p class="text-muted">{{ $user->email }}</p>
                                        </div>
                                        <div>
                                            <h6>Phone</h6>
                                            <p class="text-muted">{{ $user->phone }}</p>
                                        </div>
                                    </div>


                                    {{-- <div class="d-flex justify-content-start">
                                        <a href="#!" class="btn btn-primary btn-sm me-2"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a style="background-color: #55acee" href="#!"
                                            class="btn text-white  btn-sm me-2"><i class="fab fa-twitter"></i></a>
                                        <a href="#!" class="btn btn-secondary btn-sm"><i
                                                class="fab fa-instagram"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
