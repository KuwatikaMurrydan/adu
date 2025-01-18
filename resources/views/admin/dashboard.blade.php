@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                            <td>{{ $complaint->user->name }}</td>
                            <td>{{ $complaint->title }}</td>
                            <td>{{ $complaint->category->name }}</td>
                            <td>
                                <form action="{{ route('admin.update-status', $complaint) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $complaint->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $complaint->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $complaint->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('complaints.show', $complaint) }}" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $complaints->links() }}
        </div>
    </div>
</div>
@endsection