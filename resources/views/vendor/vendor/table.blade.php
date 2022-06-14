@extends('layouts.app',['activePage' => 'tables'])

@section('title','Tables')

@section('content')

<section class="section">

<div class="section-header">
    <h1>{{__('Manage Tables')}}</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('vendor/vendor_home') }}">{{__('Dashboard')}}</a></div>
        <div class="breadcrumb-item">{{__('Tables')}}</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">{{__("Vendor’s Tables")}}</h2>
    <p class="section-lead">{{__('Add, Edit & Manage Tables')}}</p>
    <div class="card">
        <div class="card-header">
            <h4>{{__('Vendor tables')}}</h4>
                <div class="w-100">
                    @can('vendor_table_access')
                        <a href="{{ url('vendor/table/create') }}" class="btn btn-primary float-right">{{__('Add New')}}</a>
                    @endcan
                </div>
        </div>
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('Table')}}</th>
                        <th>{{__('Capacity')}}</th>
                        <th>{{__('QRCode')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $table->name }}</td>
                        <td>{{ $table->capacity }}</td>
                        <td><form action="{{ url('/generateqrcode') }}" method="post">
                            @csrf
                            <input type="hidden" name="url" value="{{'https://gobistro.app/'.$vendor->id.'/'.$table->id}}"/>
                            <input type="submit" >
                        </form></td>
                        <td><a href="{{ url('/vendor/table/'.$table->id.'/edit/')}}"><h6>Edit</h6></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
