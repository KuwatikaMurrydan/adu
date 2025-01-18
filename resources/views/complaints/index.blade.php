@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>My Complaints</h2>
        <div>
            <a href="{{ route('complaints.create') }}" class="btn btn-primary">New Complaint</a>
            <a href="{{ route('complaints.export') }}" class="btn btn-success">Export PDF</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
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
                            <td>{{ $complaint->title }}</td>
                            <td>{{ $complaint->category->name }}</td>
                            <td>
                                <span class="badge bg-{{ $complaint->status === 'pending' ? 'warning' : ($complaint->status === 'processing' ? 'info' : 'success') }}">
                                    {{ ucfirst($complaint->status) }}
                                </span>
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