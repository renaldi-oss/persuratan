@extends('dashboard.layouts.main')

@section('style')

@endsection

@section('content')
<x-breadcrumb title="Detail Work Order" link="{{ route('workorder.index') }}" item="WorkOrder" subItem="{{$wo->nama}}" />

<div class="card m-3">
    <div class="card-body">
        <table width="100%">
            <tbody>
                <tr>
                    <td width="15%">No Surat</td>
                    <td>:</td>
                    <td> &nbsp; {{ $wo->pekerjaan->surat_no }}</td>
                </tr>
                <tr>
                    <td>No Kontrak</td>
                    <td>:</td>
                    <td>&nbsp; {{ $wo->pekerjaan->no_kontrak }}</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>:</td>
                    <td>&nbsp;{{ $wo->pekerjaan->instansi->nama }}</td>
                </tr>
                <tr>
                    <td>Nama Pekerjaan</td>
                    <td>:</td>
                    <td>&nbsp;{{ $wo->nama }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top">Deskripsi</td>
                    <td style="vertical-align: top">:</td>
                    <td>&nbsp;{!! $wo->deskripsi !!}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>&nbsp;{{ $wo->lokasi }}</td>
                </tr>
                <tr>
                    <td>Due Date</td>
                    <td>:</td>
                    <td>&nbsp;{{ ($wo->due_date) ? Carbon\Carbon::parse($wo->due_date)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Resiko</td>
                    <td>:</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <div>
                                &nbsp;{{ isset($resiko) ? $resiko : '-' }}
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                                    Resiko
                                </button>
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Resiko Matrix</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form wire:submit.prevent="save">
                                                <div class="form-group">
                                                    <label for="frequency">Frequency</label>
                                                    <input type="text" class="form-control" id="frequency" wire:model="frequency">
                                                </div>
                                        
                                                <div class="form-group">
                                                    <label for="consequency">Consequency</label>
                                                    <input type="text" class="form-control" id="consequency" wire:model="consequency">
                                                </div>
                                        
                                                <button type="submit" data-dismiss="modal" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card m-3">
    <div class="card-body">
        @include('dashboard.WorkOrder.partials.navigasi')
    </div>
</div>

@endsection

@push('script')

@endpush

