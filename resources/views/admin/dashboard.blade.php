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

        .btn-create {
            background-color: #28a745; /* Green color */
            color: white;
            font-size: 1.1em;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            display: block;
            width: 200px;
            margin: 20px auto;
            transition: background-color 0.3s;
        }

        .btn-create:hover {
            background-color: #218838; 
        }
    </style>

    <h1>Admin Dashboard</h1>

    <a href="{{ route('tasks.create') }}" class="btn-create">
        Create Task
    </a>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Total Tasks</div>
                <div class="card-body">
                    <p>{{ $tasksCount }} Tasks</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <p>{{ $usersCount }} Users</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Pending Tasks</div>
                <div class="card-body">
                    <p>{{ $pendingTasks }} Pending Tasks</p>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card">
                <div class="card-header">inProcess Tasks</div>
                <div class="card-body">
                    <p>{{ $inProcessTasks }} inProcess</p>
                </div>
            </div>
        </div>



        
    </div>
</div>
@endsection
