@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Detail Work Order" link="{{ route('workorder.index') }}" item="WorkOrder" subItem="{{$wo->nama}}" />

<div class="card m-3">
    <div class="card-body">
        <table width="100%">
            <tbody>
                <tr>
                    <td width="15%">No Surat</td>
                    <td></i></td>
                    <td>{{ $wo->surat->no_surat }}</td>
                </tr>
                <tr>
                    <td>No Kontrak</td>
                    <td>:</td>
                    <td>{{ $wo->no_kontrak }}</td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>:</td>
                    <td>{{ $wo->nama }}</td>
                </tr>
                <tr>
                    <td>Nama Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $wo->nama }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top">Deskripsi</td>
                    <td style="vertical-align: top">:</td>
                    <td>{!! $wo->deskripsi !!}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>{{ $wo->lokasi }}</td>
                </tr>
                <tr>
                    <td>Due Date</td>
                    <td>:</td>
                    <td>{{ ($wo->due_date) ? Carbon\Carbon::parse($wo->due_date)->format('d-m-Y') : '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card m-3">
    <div class="card-body">
        <h5 class="card-title">ACTION</h5>
        
    </div>
</div>

@endsection

