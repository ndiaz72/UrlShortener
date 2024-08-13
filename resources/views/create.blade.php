@extends('layouts.app')
@section('title', 'Url | Create')
@include('layouts.header') 
@section('content')

<div class="container mt-5">
    <!-- Table -->
    <div class="row">

        <div class="col-md-6 mx-auto">
            <h3>Create a New URL</h3>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('url.store')  }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="original_url" class="form-label">Original URL</label>
                            <input type="url" class="form-control" id="original_url" name="original_url" placeholder="Enter the original URL" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Create URL</button>
                    </form>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100"> Return to Home</a>
                </div>
            </div>
        </div>
    </div>





</div>

@endsection