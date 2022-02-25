@extends('layouts.app')

@section('content')
    <section class="my-auto" style="background-color: #9de2ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-10 col-lg-9 col-xl-7">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="https://i.imgur.com/bDLhJiP.jpg" alt="Default image" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{{ $user->name }}</h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->role->description }}</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        <div>
                                            <p class="small text-muted mb-1">Email</p>
                                            <p class="mb-0">{{ $user->email }}</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-muted mb-1">Code and Phone</p>
                                            <p class="mb-0">{{ $user->city_code . '-' . $user->phone }}</p>
                                        </div>
                                        <div>
                                            <p class="small text-muted mb-1">Cedula</p>
                                            <p class="mb-0">{{ $user->dni }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        <div>
                                            <p class="small text-muted mb-1">Birthday</p>
                                            <p class="mb-0">{{ $user->birthday }}</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-muted mb-1">Age</p>
                                            <p class="mb-0">{{ Carbon\Carbon::parse($user->birthday)->age }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-1">
                                        <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                        <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
