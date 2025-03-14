@extends('layout.dashboard')
@php
        App::setLocale(auth()->user()->lang);
    @endphp
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
<div class="row">
    <div class="col-12">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Products Price Adjustment</h4>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card bg-white m-b-30">
            <div class="card-body table-responsive new-user">
                <form action="{{route('priceAdjustment.store')}}" method="post">
                    @csrf
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover text-center mb-0" id="datatable1">
                        <thead class="th-color">
                            <tr>
                                <th class="border-top-0">{{ __('lang.Ser') }}</th>
                                <th class="border-top-0">{{ __('lang.Product') }}</th>
                                <th class="border-top-0">Part No.</th>
                                <th class="border-top-0">Model</th>
                                <th class="border-top-0">Brand</th>
                                <th class="border-top-0">Made In</th>
                                <th class="border-top-0">{{ __('lang.Size') }}</th>
                                <th class="border-top-0">P-Price</th>
                                <th class="border-top-0">S-Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $ser = 0;
                            @endphp
                            @foreach ($products as $pro)
                            @php
                            $ser += 1;
                            @endphp
                            <tr>
                                <td> {{ $ser }} </td>
                                <td>{{ $pro->name }}</td>
                                <td>{{ $pro->partno }}</td>
                                <td>{{ $pro->model }}</td>
                                <td>{{ $pro->brand }}</td>
                                <td>{{ $pro->madein }}</td>
                                <td>{{ $pro->size }}</td>
                                <td>
                                    <input type="hidden" name="ids[]" value="{{$pro->id}}">
                                    <input type="number" step="any" name="pprice[]" value="{{$pro->pprice}}" class="form-control text-center">

                                </td>
                                <td>
                                    <input type="number" step="any" name="price[]" value="{{$pro->price}}" class="form-control text-center">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-success w-100" type="submit">Update Prices</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection


@section('scripts')
<style>
    .dataTables_paginate {
        display: block
    }

</style>
<script>
    $('#datatable1').DataTable({
        "bSort": true
        , "bLengthChange": true
        , "bPaginate": true
        , "bFilter": true
        , "bInfo": true,

    });

</script>
@endsection
