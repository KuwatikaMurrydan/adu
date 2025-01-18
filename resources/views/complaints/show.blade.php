@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Complaint Details</h5>
                    <span class="badge bg-{{ $complaint->status === 'pending' ? 'warning' : ($complaint->status === 'processing' ? 'info' : 'success') }}">
                        {{ ucfirst($complaint->status) }}
                    </span>
                </div>
                <div class="card-body">
                    <h4>{{ $complaint->title }}</h4>
                    <p class="text-muted">
                        Submitted by {{ $complaint->user->name }} on {{ $complaint->created_at->format('F d, Y') }}
                    </p>
                    <p><strong>Category:</strong> {{ $complaint->category->name }}</p>
                    <p><strong>Location:</strong> {{ $complaint->location }}</p>
                    <div class="mb-3">
                        <strong>Description:</strong>
                        <p class="mt-2">{{ $complaint->description }}</p>
                    </div>
                    @if($complaint->attachment)
                        <div class="mb-3">
                            <strong>Attachment:</strong>
                            <div class="mt-2">
                                <a href="{{ Storage::url($complaint->attachment) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                    View Attachment
                                </a>
                            </div>
                        </div>
                    @endif
                    <div id="map" style="height: 300px;" class="mb-3"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Responses</h5>
                </div>
                <div class="card-body">
                    @foreach($complaint->responses as $response)
                        <div class="border-bottom mb-3 pb-3">
                            <p class="mb-1">{{ $response->content }}</p>
                            <small class="text-muted">
                            By {{ $response->user->name }} on {{ $response->created_at->format('F d, Y H:i') }}
                            </small>
                        </div>
                    @endforeach

                    @if(auth()->user()->is_admin)
                        <form action="{{ route('admin.store-response', $complaint) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="content">Add Response</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Response</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Status Timeline</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker {{ $complaint->created_at ? 'bg-success' : 'bg-secondary' }}"></div>
                            <div class="timeline-content">
                                <h6>Submitted</h6>
                                <p class="text-muted">{{ $complaint->created_at->format('F d, Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker {{ $complaint->status != 'pending' ? 'bg-success' : 'bg-secondary' }}"></div>
                            <div class="timeline-content">
                                <h6>Processing</h6>
                                @if($complaint->status != 'pending')
                                    <p class="text-muted">{{ $complaint->updated_at->format('F d, Y H:i') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker {{ $complaint->status == 'completed' ? 'bg-success' : 'bg-secondary' }}"></div>
                            <div class="timeline-content">
                                <h6>Completed</h6>
                                @if($complaint->status == 'completed')
                                    <p class="text-muted">{{ $complaint->updated_at->format('F d, Y H:i') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('googlemaps.api_key') }}"></script>
<script>
function initMap() {
    const location = {
        lat: {{ $complaint->latitude }},
        lng: {{ $complaint->longitude }}
    };

    const map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 15,
        mapTypeControl: false,
    });

    // Add marker
    new google.maps.Marker({
        position: location,
        map: map,
        title: '{{ $complaint->title }}'
    });
}

document.addEventListener('DOMContentLoaded', initMap);
</script>
@endpush

<style>
.timeline {
    position: relative;
    padding: 20px 0;
}

.timeline-item {
    position: relative;
    padding-left: 40px;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: 0;
    width: 15px;
    height: 15px;
    border-radius: 50%;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: 7px;
    top: 15px;
    width: 2px;
    height: calc(100% + 5px);
    background-color: #dee2e6;
}

.timeline-item:last-child::before {
    display: none;
}
</style>
@endsection