@extends('layouts/layoutMaster')

@section('title', ' View Transation - Transaction')

@section('content')
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl mb-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">View Transaction Details</h5>
                    <a href="{{ route('app-transaction') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Back</a>
                </div>

                <div class="card-body">
                    <form>
                        <div class="mb-4">
                            <h5>Cargo Details</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="company-name">Category</label>
                                    <input type="text" class="form-control" id="company-name"
                                        placeholder="ABC Pvt. Ltd." />
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h5>Request Details</h5>

                            <!-- Nav Tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="shipping-tab" data-bs-toggle="tab"
                                        data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping"
                                        aria-selected="true">
                                        Shipping
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="warehouse-tab" data-bs-toggle="tab"
                                        data-bs-target="#warehouse" type="button" role="tab" aria-controls="warehouse"
                                        aria-selected="false">
                                        Warehouse
                                    </button>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content" id="myTabContent">
                                <!-- Shipping Tab -->
                                <div class="tab-pane fade show active" id="shipping" role="tabpanel"
                                    aria-labelledby="shipping-tab">
                                    <div class="row mt-4">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="transaction_by">Transaction By</label>
                                            <select class="form-select" id="transaction_by">
                                                <option value="20ft">20' Standard</option>
                                                <option value="40ft">40' Standard</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="container_type">Container Type</label>
                                            <select class="form-select" id="container_type">
                                                <option value="20ft">20' Standard</option>
                                                <option value="40ft">40' Standard</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="container_quantity">Container Quantity</label>
                                            <input type="text" class="form-control" id="container_quantity"
                                                placeholder="Enter quantity" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="weight">Weight</label>
                                            <input type="text" class="form-control" id="weight"
                                                placeholder="Enter weight" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="from">From</label>
                                            <input type="text" class="form-control" id="from"
                                                placeholder="Enter origin" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="to">To</label>
                                            <input type="text" class="form-control" id="to"
                                                placeholder="Enter destination" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="freight_basis">Freight Basis (Liner
                                                Terms)</label>
                                            <select class="form-select" id="freight_basis">
                                                <option value="20ft">20' Standard</option>
                                                <option value="40ft">40' Standard</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="ready_to_load">Ready To Load</label>
                                            <input type="date" class="form-control" id="ready_to_load"
                                                name="ready_to_load" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Warehouse Tab -->
                                <div class="tab-pane fade" id="warehouse" role="tabpanel"
                                    aria-labelledby="warehouse-tab">
                                    <div class="row mt-4">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="warehouse_type">Warehouse Type</label>
                                            <select class="form-select" id="warehouse_type">
                                                <option value="bonded">Open</option>
                                                <option value="non-bonded">Covered</option>
                                                <option value="bonded">Fulfillment Center</option>
                                                <option value="non-bonded">Refrigerated</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 d-flex align-items-center">
                                            <div class="form-check" style= "margin-top:25px;">
                                                <input type="checkbox" class="form-check-input" id="bonded_warehouse" />
                                                <label class="form-check-label ms-2" for="bonded_warehouse">Bonded
                                                    Warehouse</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="warehouse_location">Warehouse Location</label>
                                            <input type="text" class="form-control" id="warehouse_location"
                                                placeholder="Enter location" />
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="required_space">Required Space</label>
                                            <input type="text" class="form-control" id="booking_period"
                                                placeholder="Enter period" />
                                        </div>
                                        <div class="col-md-6 mb-3" style= "margin-top:10px;">
                                            <label class="form-label" for="radius">Radius</label>
                                            <input type="range" id="radius" max="1000" />
                                        </div>
                                        <div class="col-md-6 mb-3 d-flex align-items-center" style= "margin-top:10px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="within_country" />
                                                <label class="form-check-label ms-2" for="within_country">Within
                                                    Country</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="booking_period">Booking Period</label>
                                            <input type="date" class="form-control" id="booking_period"
                                                placeholder="Enter period" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- <hr class="my-4">

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <h5>Upload Documents</h5>
                            <button type="button" id="add-document" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive mb-4">
                            <table class="table table-borderless" id="member-document">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="document-row-0">
                                        <td>
                                            <input type="text" class="form-control" id="document_name"
                                                name="document_name_0" placeholder="Enter File Name" required />
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" id="document_file"
                                                name="document_file_0" accept=".png,.jpg,.jpeg,.pdf,.xls,.doc,.docx"
                                                required />
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
