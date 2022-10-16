@extends('layout')

@section('title', 'Users')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="#" class="btn icon btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ config('custom.role.'.$user->role) }}</td>
                                <td>
                                    <div class="buttons">
                                        <a href="#" class="btn icon btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="#" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Remove">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script src="{{ asset("assets/extensions/datatable/datatables.min.js") }}"></script>
    <script src="assets/js/pages/datatables.js"></script>

    <script>
        // Init Datatable
        $("#table1").DataTable();

        // Init Tooltip
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
    </script>
@endsection
