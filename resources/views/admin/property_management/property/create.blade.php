@extends('admin.layouts.mainapp')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @foreach (['success', 'error', 'warning', 'info'] as $msg)
        @if (session($msg))
            <div class="alert alert-{{ $msg }}">
                {{ session($msg) }}
            </div>
        @endif
    @endforeach

    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Create Property</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('property.index') }}">Property Listing</a></li>
                            <li class="breadcrumb-item"><a href="#">Create Property</a></li>

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
                <div class="card card-info card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Create Property</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('property.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Property Type</label>
                                    <select name="property_type" class="form-select" id="validationCustom04" required>
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($propertyTypes as $propertyType)
                                            <option value="{{ $propertyType->id }}">{{ $propertyType->property_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Property Title</label>
                                    <input name="property_title" type="text" class="form-control" id="validationCustom01"
                                        required />
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Property Description</label>
                                    <textarea name="property_description" type="text" class="form-control" cols="10" rows="5" required></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Property Address</label>
                                    <input name="property_address" type="text" class="form-control"
                                        id="validationCustom02" required />
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Option Type</label>
                                    <select name="option_type" class="form-select" id="validationCustom04" required>
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($optionTypes as $optionType)
                                            <option value="{{ $optionType->id }}">{{ $optionType->option_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Property Area</label>
                                    <input type="text" class="form-control" id="validationCustom02" required
                                        name="property_area" />
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom05" class="form-label">Rate</label>
                                    <input type="text" class="form-control" id="validationCustom05" required
                                        name="property_rate" />
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom05" class="form-label">Property Images</label>
                                    <input type="file" class="form-control" name="property_images[]" multiple />
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                            required />
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button class="btn btn-info" type="submit">Submit</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Form Validation-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection
