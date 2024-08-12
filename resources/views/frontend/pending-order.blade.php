@extends('frontend.layouts.template')

@section('home-content')
    <h1 class="text-center">Welcome {{ Auth::user()->name }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card p-2">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Dashboard</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a href="{{route('pendingOrders')}}" class="nav-link">Pending Orders</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a href="" class="nav-link">History</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit" style="cursor: pointer">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">Dashboard</div>
        </div>
    </div>
@endsection
