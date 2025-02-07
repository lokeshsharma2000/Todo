@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 20px;
        padding: 20px;
        text-align: center;
    }

    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
    }

    .btn-pending {
        background-color: orange;
        color: white;
    }

    .btn-inprocess {
        background-color: blue;
        color: white;
    }

    .btn-completed {
        background-color: green;
        color: white;
    }

    .btn:hover {
        opacity: 0.8;
    }
    .btn-create {
            background-color: #28a745; 
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
            background-color: #218838; /* Darker green on hover */
        }
</style>

@if($tasks->isEmpty())
    <p class="no-tasks">You don't have any tasks at the moment.</p>
@else
    <h2>Task List</h2>

    @if(Auth::user()->is_admin)
    <a href="{{ route('tasks.create') }}" class="btn-create">
        Create Task
    </a>
    @endif

    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->user ? $task->user->name : 'Unassigned' }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <span class="{{ $task->status == 'pending' ? 'btn-pending' : ($task->status == 'inProcess' ? 'btn-inprocess' : 'btn-completed') }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </td>
                <td>
                    @if($task->status == 'pending')
                        <button class="btn btn-inprocess" onclick="updateStatus({{ $task->id }}, 'inProcess')">
                            Mark as In Process
                        </button>
                        <button class="btn btn-completed" onclick="updateStatus({{ $task->id }}, 'completed')">
                            Mark as Completed
                        </button>
                    @elseif($task->status == 'inProcess')
                        <button class="btn btn-completed" onclick="updateStatus({{ $task->id }}, 'completed')">
                            Mark as Completed
                        </button>
                    @else
                        <button class="btn btn-completed" disabled>
                            Completed
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function updateStatus(taskId, status) {
            fetch(`/tasks/${taskId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: status })
            }).then(() => location.reload());
        }
    </script>
@endif
@endsection
