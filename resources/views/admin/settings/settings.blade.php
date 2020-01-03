@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Configure Site Settings
        </div>
        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" class="form-control" name="site_name" id="site_name" value="{{ $settings->site_name }}">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email" id="contact_email" autocomplete="off" value="{{ $settings->contact_email }}">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number" autocomplete="off" value="{{ $settings->contact_number }}">
                </div>
                <div class="form-group">
                    <label for="address">Contact Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $settings->address }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update Settings</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@stop
