@extends('dashboard.layouts.main')

{{-- format main content dashboard --}}
@section('content')
        <h1 class="ml-4">Detail Work Order</h1>
        <div class="row ml-3 mr-3">
            <div class="col-12">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <tbody>
                      <tr>
                        <td class="col-2 p-2">No WO</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->no_wo . '/WO/KET/TKI/I/VI/2023' }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Tanggal</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->due_date }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Client</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->instansi->nama }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Nama Pekerjaan</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->nama }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Lokasi</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->lokasi }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Deskripsi Pekerjaan</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->deskripsi }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Tanggal Kontrak</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->created_at }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Scan PO</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">Placeholder</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">No Kontrak</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->no_surat }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

                <div class="d-flex justify-content-evenly">
                  <div class="col-12">
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 15%">
                            <form action="/load-jadwal" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Jadwal Pelaksanaan</button>
                            </form>
                            </td>
                            <td style="width: 15%">
                            <form action="/load-purchaseRequest" method="post">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Purchase Request</button>
                            </form>
                            </td>
                            <td style="width: 15%">
                            <form action="/load-checklist" method="post">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Check List</button>
                            </form>
                            </td>
                            <td style="width: 15%">
                            <form action="/load-qcPass" method="post">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary btn-lg p-2">QC Pass</button>
                            </form>
                            </td>
                            <td style="width: 15%">
                            <form action="/load-persuratan" method="post">
                                @csrf
                                <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Persuratan</button>
                            </form>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
        </div>
@endsection
