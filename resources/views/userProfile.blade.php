@extends('layouts.app')
@include('sidebar.user_sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3>User Profile</h3></div>

                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body row">
                    <div class="col-6" style="padding-left: 60px; margin-bottom: 10px;">
                        <p><strong>First Name:</strong> {{ $user->first_name }}</p>
                    </div>
                    <div class="col-8" style="padding-left: 60px; margin-bottom: 10px;">
                        <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
                    </div>
                    <div class="col-8" style="padding-left: 60px; margin-bottom: 10px;">
                        <p><strong>Address:</strong> {{ $user->address }}</p>
                    </div>
                    <div class="col-8" style="padding-left: 60px; margin-bottom: 10px;">
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                    <div class="col-8" style="padding-left: 60px; margin-bottom: 10px;">
                        <p><strong>Birthdate:</strong> {{ $user->birthdate }}</p>
                    </div>
                    <div class="col-8" style="padding-left: 60px; margin-bottom: 10px;">
                        <p><strong>ID Verification:</strong> <a href="{{ route('downloadFile', $user->id_file_name) }}"><i style="font-size: 24px; width: 24px; height: 24px;" class="fas fa-file-pdf"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection