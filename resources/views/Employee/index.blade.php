@extends('layouts.app')
@section('title', 'Employee')
@section('content')
<div style="position: sticky;padding: 10px 0px 0 0px; top: 60px; overflow: hidden;background: #e4e9f7;" class="d-flex justify-content-between my-3">
    <div class="w-25 d-flex justify-content-start text-white bg-primary rounded-2 me-2">
        <a class="text-white " href="{{ url('dashboard') }}"> <i class='bx bx-home-alt p-2 m-3 rounded-2' style="background-color: rgba(255, 255, 255, 0.16); font-size: 18px;"></i></a>
        <div class="mx-3 my-3">
            All Employees
            <div>
                {{$count}}
            </div>
        </div>
    </div>
    <div class=" w-75 d-flex align-items-center text-white bg-white rounded-2 me-2">
        <div class="d-flex w-100 justify-content-between">
            {{-- search bar --}}
            <form class="ms-5 w-50" action="{{ route('employees.index') }}" method="GET" role="search">
                <div class="d-flex justify-content-start">
                    <div class="input-group">
                        <input type="text" class="form-control mr-2 w-100 ps-3" name="term" placeholder="Search Employee" id="term">
                    </div>
                    <span class="input-group-btn ms-2">
                        <button class="btn btn-primary d-flex align-items-center h-100" type="submit" title="Search Employee">
                            <i style=" font-size: 18px;" class='bx bx-search'></i>
                        </button>
                    </span>
                </div>
            </form>
            <a class="me-5 text-white text-decoration-none" href="{{ route('employees.create') }}">
                <div class="bg-primary cursor-pointer px-4 py-1 rounded-3 d-flex justify-conten-between">
                    <div class="me-2 d-flex align-items-center">
                        <i style="font-size: 18px;" class='bx bx-plus text-white'></i>
                    </div>
                    <span>Create Employee</span>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="mt-1 rounded bg-white">
    <div class="row">
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col" style="text-align: center;">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col" style="width: 200px; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
            <tr>
                <td scope="row" style="text-align: center;">{{ $item->id }}</td>
                <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                <td>{{ $item->gender}}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone_number }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('employees.destroy',$item->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('employees.edit',$item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</div>
<div class="d-flex justify-content-center">
    {!! $employees->links() !!}
</div>
@endsection