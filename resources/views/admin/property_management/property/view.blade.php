@extends('admin.layouts.mainapp')

@section('content')
    <main class="app-main">

        <!-- Page Header -->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Property Details</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('property.index') }}">Property Listing</a></li>
                            <li class="breadcrumb-item active">Property Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Property Details</div>
                    </div>

                    <div class="card-body">

                        <div class="row g-4">

                            <!-- Property Title -->
                            <div class="col-md-12">
                                <h4 class="fw-bold">{{ $property->property_title }}</h4>
                                <p class="text-muted mb-1">
                                    <strong>Type:</strong> {{ $property->propertyType->property_type ?? 'N/A' }} |
                                    <strong>Option:</strong> {{ $property->optionType->option_type ?? 'N/A' }}
                                </p>
                                <p class="text-muted mb-1">
                                    <strong>Area:</strong> {{ $property->property_area }} sq.ft
                                </p>
                                <p class="text-muted mb-1">
                                    <strong>Rate:</strong> ₹{{ number_format($property->rate, 2) }}
                                </p>
                            </div>

                            <!-- Property Description -->
                            <div class="col-md-12">
                                <h5 class="fw-bold">Description</h5>
                                <p>{{ $property->property_description }}</p>
                            </div>

                            <!-- Property Address -->
                            <div class="col-md-12">
                                <h5 class="fw-bold">Address</h5>
                                <p>{{ $property->property_address }}</p>
                            </div>

                            <!-- Images -->
                            <div class="col-md-12">
                                <h5 class="fw-bold">Property Images</h5>

                                <div class="row">
                                    @forelse ($property->propertyImages as $image)
                                        <div class="col-md-3 mt-3">
                                            <div class="card shadow-sm">
                                                <img src="{{ asset($image->image_path) }}" class="card-img-top"
                                                    style="height:180px; object-fit:cover;" alt="Property Image">
                                            </div>
                                        </div>
                                    @empty
                                        <p>No images available.</p>
                                    @endforelse
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
