@extends('layouts.app',['activePage' => 'tables'])

@section('title','Add Tables')

@section('content')

<section class="section">

    <div class="section-header">
        <h1>{{__('Add Table')}}</h1>
        <div class="section-header-breadcrumb">
            @if(Auth::user()->load('roles')->roles->contains('title', 'admin'))
                <div class="breadcrumb-item active"><a href="{{ url('admin/home') }}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item"><a href="{{ url('admin/tables') }}">{{__('Table')}}</a></div>
                <div class="breadcrumb-item">{{__('create a Table')}}</div>
            @endif

            @if(Auth::user()->load('roles')->roles->contains('title', 'vendor'))
                <div class="breadcrumb-item active"><a href="{{ url('vendor/vendor_home') }}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item"><a href="{{ url('vendor/tables') }}">{{__('Table')}}</a></div>
                <div class="breadcrumb-item">{{__('create a Table')}}</div>
            @endif
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{__('Table Management')}}</h2>
        <p class="section-lead">{{__('create Table')}}</p>
        <div class="card p-3">
            <div class="card-body">
                <form class="container-fuild" action="{{ url('vendor/table') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Table">{{__('Table name')}}<span class="text-danger">&nbsp;*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is_invalide @enderror" placeholder="{{__('Enter Table Name')}}" value="{{old('name')}}" required="">
                            @error('name')
                                <span class="custom_error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="capacity">{{__('Table capacity')}}<span class="text-danger">&nbsp;*</span></label>
                            <input type="number" name="capacity" class="form-control @error('email') is_invalide @enderror" id="capacity" placeholder="{{__('Enter Table Capacity')}}" value="{{ old('capacity') }}" required="">
                            @error('capacity')
                                <span class="custom_error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary" type="submit">{{__('Add Table')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
