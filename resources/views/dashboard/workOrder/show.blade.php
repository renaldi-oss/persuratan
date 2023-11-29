@extends('dashboard.layouts.main')

@section('style')
<link rel="stylesheet" href="{{ asset('./plugins/summernote/summernote-bs4.css') }}">

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
                    <td>Client</td>
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
                        {{ csrf_field() }}
                        @include('dashboard.WorkOrder.partials.resiko', ['tombol' => 'Submit'])
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



