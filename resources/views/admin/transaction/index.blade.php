@extends('layouts.admin-layout.master')

@section('title')
    Transaction
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Transaction</h3>
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Data Transaction</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Shipping Cost</th>
                                        <th>Courier</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->user->name }}</td>
                                            <td>{{ $transaction->address }}</td>
                                            <td>{{ $transaction->regency . ', ' . $transaction->province }}</td>
                                            <td>{{ number_format($transaction->shipping_cost, 2, ',', '.') }}</td>
                                            <td class="text-uppercase">{{ $transaction->courier->courier }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            <td>{{ number_format($transaction->total, 2, ',', '.') }}</td>
                                            <td class="justify-content-center">
                                                <div class="mb-2">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#product--{{ $transaction->id }}"
                                                        class="btn btn-info btn-xs">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#proof--{{ $transaction->id }}"
                                                        class="btn btn-primary btn-xs">
                                                        <i class="fa fa-file-photo-o"></i>
                                                    </a>
                                                </div>
                                                @if ($transaction->status == 'Pending')
                                                    <form
                                                        action="{{ route('admin.transaction.accept', $transaction->id) }}"
                                                        method="post" id="form-acc">
                                                        @csrf
                                                        <a onclick="document.getElementById('form-acc').submit()"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Accept Payment" class="btn btn-success btn-xs">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    </form>
                                                @endif
                                                @if ($transaction->status == 'Dalam Pengiriman')
                                                    <form
                                                        action="{{ route('admin.transaction.shipped', $transaction->id) }}"
                                                        method="post" id="form-shipped">
                                                        @csrf
                                                        <a onclick="document.getElementById('form-shipped').submit()"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Has Shipped" class="btn btn-warning btn-xs">
                                                            <i class="fa fa-truck"></i>
                                                        </a>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($transactions as $transaction)
        {{-- modal --}}
        <div class="modal fade" id="product--{{ $transaction->id }}" tabindex="-1" aria-labelledby="productLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productLabel">Transaction ID :
                            #{{ $transaction->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <table class="table table-bordered text-white" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction->products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ number_format($product->price, 2, ',', '.') }}
                                            </td>
                                            <td>{{ $product->pivot->qty }}</td>
                                            <td>{{ $product->pivot->discount }}%</td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal proof payment --}}
        <div class="modal fade" id="proof--{{ $transaction->id }}" tabindex="-1" aria-labelledby="proofLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="proofLabel">Proof Of Payment Transaction ID :
                            #{{ $transaction->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/proof_payment/' . $transaction->proof_of_payment) }}"
                            class="img-fluid">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
        <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    "drawCallback": function() {
                        var tooltipTriggerList = [].slice.call(document.querySelectorAll(
                            '[data-bs-toggle="tooltip"]'))
                        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                            return new bootstrap.Tooltip(tooltipTriggerEl, {
                                container: 'body'
                            })
                        })

                    }
                });
            });
        </script>
    @endpush
@endsection
