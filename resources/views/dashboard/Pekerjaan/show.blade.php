@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Detail Pekerjaan" link="{{ route('pekerjaan.index') }}" item="Pekerjaan" subItem="" />

<div class="card m-3">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">No Surat : {{ $pekerjaan->no_surat }}</li>
            <li class="list-group-item">No Kontrak : {{ $pekerjaan->no_kontrak }}</li>
            <li class="list-group-item">Instansi : {{ $pekerjaan->instansi->nama }}</li>
            <li class="list-group-item">Nama Pekerjaan : {{ $pekerjaan->nama }}</li>
            <li class="list-group-item">Deskripsi : {!! $pekerjaan->deskripsi !!}</li>
            <li class="list-group-item">Lokasi : {{ $pekerjaan->lokasi }}</li>
            <li class="list-group-item">Jenis Pekerjaan : {{ $pekerjaan->jenis }}</li>
            <li class="list-group-item">To Email : {{ $pekerjaan->to_email }}</li>
            <li class="list-group-item">To Attn : {{ $pekerjaan->to_attn }}</li>
            <li class="list-group-item">Due Date : {{ ($pekerjaan->due_date) ? Carbon\Carbon::parse($pekerjaan->due_date)->format('d-m-Y') : '-' }}</li>
            <li class="list-group-item">Nominal : {{ $pekerjaan->nominal }}</li>
        </ul>
    </div>
</div>
<div class="card m-3">
    <div class="card-body">
        <h5 class="card-title">File pendukung</h5>
        {{-- btn download all media --}}
        <a href="{{ route('pekerjaan.downloadAll', $pekerjaan->id) }}" class="btn btn-sm btn-success mb-2" title="download all"><i class="fas fa-download"></i> Download All</a>
        <br>
        <table id="suratTable" class="table table-bordered table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>size</th>
                    <th>Type file</th>
                    <th>created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($media as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->mime_type }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('pekerjaan.download', $item) }}" class="btn btn-sm btn-success" title="download"><i class="fas fa-download"></i></a>
                        <form action="{{ route('pekerjaan.delete', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


@push('script')
{{-- script datatable --}}
<script src="{{ asset('./plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('./plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>


{{-- script table user --}}
<script type="text/javascript">
    $(document).ready(function() {
      $('#suratTable').DataTable({
            deferRender: false,
            processing: true,
            paging: true,
            searching: false,
        });
    });  
</script>

{{-- script spacing list --}}
<script>
   
</script>
    
@endpush