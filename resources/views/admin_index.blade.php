@extends('layouts.app_admin')
@include('sidebar.admin_sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span><h5>{{ __('User List') }}</h5></span>

                            <!-- Search Bar -->
                            <div class="row">
                            <div class="input-group col-5" style="display: flex; align-items: center; justify-content: flex-end;">
                                <input class="form-control mr-sm-2" id="search-input" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date of Birth</th>
                                        <th>ID Verification</th>
                                    </tr>
                                </thead>
                                <tbody id="user-table-body">
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->birthdate }}</td>
                                            <td>
                                                @if($user->id_file_name)
                                                    <a href="{{ route('downloadFile', $user->id_file_name) }}">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                @else
                                                    No ID Verification
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
