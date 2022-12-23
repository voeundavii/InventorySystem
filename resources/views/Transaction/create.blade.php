@extends('layouts.app')
@section('title', 'Transaction')
@section('content')
    <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ url('home') }}"> Home</a>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Transaction</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Item:</strong>
                        <select name="item_id" id="">
                            @foreach ($items as $cate )
                                <option value={{$cate->id}}>{{$cate->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Room:</strong>
                        <select name="room_id" id="">
                            @foreach ($rooms as $cate )
                                <option value={{$cate->id}}>{{$cate->building}}-{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User:</strong>
                        
                            <select name="employee_id" >
                                @foreach ($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}</option>
                                @endforeach
                            </select>  
                        
                        
                    </div>
                </div>
               
                
                
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection