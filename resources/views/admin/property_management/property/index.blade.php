@extends('admin.layouts.mainapp')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Property Listing</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Property Listing</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-12">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="card-title">Property Table</h3>
                                </div>
                                <div class="ms-auto">
                                    <a class="btn btn-primary" href="{{ route('property.create') }}">Add Property</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Option Type</th>
                                            <th>Area</th>
                                            <th>Rate</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $property)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $property->property_title }}</td>
                                                <td>{{ $property->propertyType->property_type }}</td>
                                                <td>{{ $property->optionType->option_type }}</td>
                                                <td>{{ $property->property_area }}</td>
                                                <td>₹{{ number_format($property->rate, 2) }}</td>
                                                <td>
                                                    <a href="{{ route('property.show', $property->id) }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('property.edit', $property->id) }}"
                                                        class="btn btn-dark btn-sm">Edit </a>
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection
