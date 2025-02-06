@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .container {
            margin-top: 20px; /* Add some top margin to the container */
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
            transition: 0.3s; /* Add a transition for hover effect */
            border-radius: 5px; /* Add rounded corners */
            border: none; /* Remove default border */
            height: 100%; /* Make cards same height */
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2); /* Enhance shadow on hover */
        }

        .card-header {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 1.2em;
            border-bottom: none; /* Remove default border */
            border-top-left-radius: 5px; /* Match card radius */
            border-top-right-radius: 5px; /* Match card radius */
        }

        .card-body {
            padding: 20px;
            text-align: center;
            font-size: 1.1em;
            color: #555;
        }

        .row {
            margin-bottom: 20px; /* Add spacing between rows */
        }
    </style>

    <h1>Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total Tasks</div>
                <div class="card-body">
                    <p>{{ $tasksCount }} Tasks</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <p>{{ $usersCount }} Users</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Pending Tasks</div>
                <div class="card-body">
                    <p>{{ $pendingTasks }} Pending Tasks</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
