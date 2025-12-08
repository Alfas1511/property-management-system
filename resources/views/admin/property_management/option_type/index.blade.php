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
                        <h3 class="mb-0">Option Type Listing</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Option Type Listing</li>
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
                                    <h3 class="card-title">Option Type Table</h3>
                                </div>
                                <div class="ms-auto">
                                    <a class="btn btn-primary" href="{{ route('option-type.create') }}">Add Option
                                        Type</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Option Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($optionTypes as $optionType)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $optionType->option_type }}</td>
                                                <td>{{ $optionType->status }}</td>
                                                <td>
                                                    <button class="btn btn-dark editBtn btn-sm"
                                                        data-id="{{ $optionType->id }}"
                                                        data-type="{{ $optionType->option_type }}">
                                                        Edit
                                                    </button>
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

    <!-- Edit Modal -->
    <div class="modal fade" id="editOptionTypeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="editOptionTypeForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Option Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <input type="hidden" class="form-control" id="edit_option_type_id" name="option_type_id" required>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Option Type</label>
                            <input type="text" class="form-control" id="edit_option_type" name="option_type" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            // OPEN EDIT MODAL
            $('.editBtn').on('click', function() {
                let id = $(this).data('id');
                let type = $(this).data('type');

                $('#edit_option_type_id').val(id);
                $('#edit_option_type').val(type);

                $('#editOptionTypeModal').modal('show');
            });

            $('#editOptionTypeForm').on('submit', function(e) {
                e.preventDefault();

                let id = $('#edit_option_type_id').val();
                let url = "{{ route('option-type.update', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {

                        // Close modal
                        $('#editOptionTypeModal').modal('hide');

                        location.reload();

                    },
                    error: function(xhr) {
                        alert("Something went wrong!");
                    }
                });
            });

        });
    </script>
@endpush
