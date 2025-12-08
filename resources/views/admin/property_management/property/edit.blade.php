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
                        <h3 class="mb-0">Edit Property</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('property.index') }}">Property Listing</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit Property</a></li>

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
                        <div class="card-title">Edit Property</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('property.update', $property->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Property Type</label>
                                    <select class="form-select" id="validationCustom04" required name="property_type">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($propertyTypes as $propertyType)
                                            <option value="{{ $propertyType->id }}"
                                                @if ($propertyType->id == $property->property_type_id) selected @endif>
                                                {{ $propertyType->property_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Property Title</label>
                                    <input type="text" class="form-control" id="validationCustom01" required
                                        name="property_title" value="{{ $property->property_title }}" />
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Property Description</label>
                                    <textarea type="text" class="form-control" cols="10" rows="5" required name="property_description">{{ $property->property_description }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Property Address</label>
                                    <input type="text" class="form-control" id="validationCustom02" required
                                        name="property_address" value="{{ $property->property_address }}" />
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Option Type</label>
                                    <select class="form-select" id="validationCustom04" required name="option_type">
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($optionTypes as $optionType)
                                            <option value="{{ $optionType->id }}"
                                                @if ($optionType->id == $property->option_type_id) selected @endif>
                                                {{ $optionType->option_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Property Area</label>
                                    <input type="text" class="form-control" id="validationCustom02" required
                                        name="property_area" value="{{ $property->property_area }}" />
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom05" class="form-label">Rate</label>
                                    <input type="text" class="form-control" id="validationCustom05" required
                                        name="property_rate" value="{{ $property->rate }}" />
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom05" class="form-label">Property Images</label>
                                    <input type="file" class="form-control" name="property_images[]" multiple />

                                    <br>
                                    <div class="row">
                                        @if ($property->propertyImages)
                                            <h4>Old Images</h4>
                                            @foreach ($property->propertyImages as $image)
                                                <div class="col-md-4 mt-3" id="image-box-{{ $image->id }}">
                                                    <div class="card shadow-sm">
                                                        <img src="{{ asset($image->image_path) }}" class="card-img-top"
                                                            style="height:180px; object-fit:cover;" alt="Property Image">

                                                        <div class="card-body text-center">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm delete-image"
                                                                data-id="{{ $image->id }}"
                                                                data-url="{{ route('property.image.delete', $image->id) }}">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
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
                            <button class="btn btn-info" type="submit">Update</button>
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

@push('scripts')
    <script>
        $(document).on('click', '.delete-image', function() {
            let imageId = $(this).data('id');
            let url = $(this).data('url');
            let box = $("#image-box-" + imageId);

            if (!confirm("Are you sure you want to delete this image?")) {
                return;
            }

            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status) {
                        box.fadeOut(300, function() {
                            $(this).remove();
                        });
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    alert("Something went wrong!");
                }
            });
        });
    </script>
@endpush
