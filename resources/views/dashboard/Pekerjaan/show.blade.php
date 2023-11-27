@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Detail Pekerjaan" link="{{ route('pekerjaan.index') }}" item="Pekerjaan" subItem="{{$pekerjaan->nama}}" />

<div class="card m-3">
    <div class="card-body">
        <table width="100%">
            <tbody>
                <tr>
                    <td width="15%">No Surat</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->surat_no }}</td>
                </tr>
                @if($pekerjaan->no_kontrak)
                <tr>
                    <td>No Kontrak</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->no_kontrak }}</td>
                </tr>
                @endif
                <tr>
                    <td>Instansi</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->instansi->nama }}</td>
                </tr>
                <tr>
                    <td>Nama Pekerjaan</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->nama }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top">Deskripsi</td>
                    <td style="vertical-align: top">:</td>
                    <td>&nbsp;{!! $pekerjaan->deskripsi !!}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->lokasi }}</td>
                </tr>
                <tr>
                    <td>Jenis Pekerjaan</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->jenis }}</td>
                </tr>
                <tr>
                    <td>To Email</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->to_email }}</td>
                </tr>
                <tr>
                    <td>To Attn</td>
                    <td>:</td>
                    <td>&nbsp;{{ $pekerjaan->to_attn }}</td>
                </tr>
                @if($pekerjaan->due_date)
                <tr>
                    <td>Due Date</td>
                    <td>:</td>
                    <td>&nbsp;{{ ($pekerjaan->due_date) ? Carbon\Carbon::parse($pekerjaan->due_date)->format('d-m-Y') : '-' }}</td>
                </tr>
                @endif
                @role('manager|finance')
                @if($pekerjaan->nominal)
                <tr>
                    <td>Nominal</td>
                    <td>:</td>
                    <td>{{ $pekerjaan->nominal }}</td>
                    {{-- role manager
                            btn form hidden val status
                            status tidak dapat dirubah ketika sudah di set
                        if btn status == manager
                            role finance
                                status == finance
                                btn form hidden val status
                     --}}
                </tr>
                @endif
                @endrole
            </tbody>
        </table>
    </div>
</div>
<div class="card m-3">
    <div class="card-body">
        <h5 class="card-title">File pendukung</h5>
        @if (count($media) > 0)
            <a href="{{ route('pekerjaan.downloadAll', $pekerjaan->id) }}" class="btn btn-sm btn-success mb-2" title="download all"><i class="fas fa-download"></i> Download All</a>
        @endif
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
            paging: false,
            searching: false,
        });
    });  
</script>

{{-- script spacing list --}}
<script>
   
</script>
    
@endpush