@extends('layout')
@section('main')
{{-- <div class="input-group">
    <div class="form-outline">
      <input type="search" id="form1" class="form-control" />
      <label class="form-label" for="form1">Search</label>
    </div>
    <button type="button" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
  </div> --}}

  <form  method="post" action="{{ route('mccards.search') }}" class="w-50 m-auto pt-3">
    @csrf
    <div class="input-group p-2">
        <input type="text" name="search" class="form-control text-center" placeholder="Search">
        <button class="input-group-text bg-primary border-0 text-white"><i
                class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</form>

    <div class="container d-flex gap-5 p-5">
        @foreach ($data as $item)
            {{-- get the commpact data from route --}}
            <div class="container  card shadow p-3 mb-5 bg-body-tertiary rounded align-items-center text-center">
                <img src="{{ asset('storage/img/' . $item['image']) }}" class="card-img-top rounded-circle shadow-sm" alt="{{ $item->name }}" style="width:100px">
                <div class="card-body">

                    <h5 class="card-title">{{ $item->name }}</h5>
                    <h5 class="card-title">{{ $item->city }}</h5>
                    <p class="card-text"></p>
                    <a href="/users/{{ $item->id }}" class="btn btn-primary">Go to the profile</a>

                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>
@endsection
