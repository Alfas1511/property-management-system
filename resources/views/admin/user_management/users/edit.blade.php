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
                        <h3 class="mb-0">Edit User</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.index') }}">User
                                    Listing</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit User</a></li>

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
                        <div class="card-title">Basic details</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">

                                <input name="hidden" type="text" class="form-control" id="validationCustom01"
                                    value="{{ $user->id }}" name="user_id" />

                                <input name="hidden" type="text" class="form-control" id="validationCustom01"
                                    value="1" name="form_number" />

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" id="validationCustom01"
                                        value="{{ $user->name }}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control" id="validationCustom02"
                                        value="{{ $user->email }}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <input name="password" type="password" class="form-control" id="validationCustom03" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Role Type <span
                                            class="text-danger">*</span></label>
                                    <select name="roles" class="form-select" id="validationCustom04">
                                        <option value="">Choose...</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($user->userRole->id == $role->id) selected @endif>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
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



            <div class="container-fluid">
                <div class="card card-info card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Other details</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">

                                <input name="hidden" type="text" class="form-control" id="validationCustom01"
                                    value="{{ $user->id }}" name="user_id" />

                                <input name="hidden" type="text" class="form-control" id="validationCustom01"
                                    value="2" name="form_number" />

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" id="validationCustom01"
                                        value="{{ $user->name }}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control" id="validationCustom02"
                                        value="{{ $user->email }}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <input name="password" type="password" class="form-control"
                                        id="validationCustom03" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Role Type <span
                                            class="text-danger">*</span></label>
                                    <select name="roles" class="form-select" id="validationCustom04">
                                        <option value="">Choose...</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($user->userRole->id == $role->id) selected @endif>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
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

            <div class="container-fluid">
                <div class="card card-info card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Address details</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">

                                <input name="hidden" type="text" class="form-control" id="validationCustom01"
                                    value="{{ $user->id }}" name="user_id" />

                                <input name="hidden" type="text" class="form-control" id="validationCustom01"
                                    value="3" name="form_number" />

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" id="validationCustom01"
                                        value="{{ $user->name }}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control" id="validationCustom02"
                                        value="{{ $user->email }}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <input name="password" type="password" class="form-control"
                                        id="validationCustom03" />
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Role Type <span
                                            class="text-danger">*</span></label>
                                    <select name="roles" class="form-select" id="validationCustom04">
                                        <option value="">Choose...</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($user->userRole->id == $role->id) selected @endif>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
        </div>
        <!--end::App Content-->
    </main>
@endsection
