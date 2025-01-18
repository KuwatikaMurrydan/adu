@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Submit New Complaint</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="attachment">Attachment (Image/Document)</label>
                            <input type="file" class="form-control" id="attachment" name="attachment">
                            <small class="text-muted">Allowed formats: jpg, jpeg, png, pdf, doc, docx. Max size: 2MB</small>
                        </div>

                        <div class="mb-3">
                            <label for="location">Location Address</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location..." required value="{{ old('location') }}">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
