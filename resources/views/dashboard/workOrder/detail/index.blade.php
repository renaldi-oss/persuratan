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
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Tanggal</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Client</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Nama Pekerjaan</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Lokasi</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Deskripsi Pekerjaan</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Tanggal Kontrak</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Scan PO</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">No Kontrak</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">1111</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              
              <div class="d-flex justify-content-evenly">
                <a href="/load-jadwal"><button type="submit" class="mx-1 flex-fill btn btn-primary">Jadwal Pelaksanaan</button></a>
                <a href="/load-purchaseRequest"><button type="submit" class="mx-1 flex-fill btn btn-primary">Purchase Request</button></a>
                <a href="/load-checklist"><button type="submit" class="mx-1 flex-fill btn btn-primary">Check List</button></a>
                <a href="/load-qcPass"><button type="submit" class="mx-1 flex-fill btn btn-primary">QC Pass</button></a>
                <a href="/load-persuratan"><button type="submit" class="mx-1 flex-fill btn btn-primary">Persuratan</button></a>
              </div>


              {{-- <div class="d-flex justify-content-evenly">
                  <div class="col-12">
                      <div class="card">
                          <table>
                              <tr>
                                  <td>
                                    <form action="/load-jadwal" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Jadwal Pelaksanaan</button>
                                    </form>
                                  </td>
                                  <td>
                                    <form action="/load-purchaseRequest" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Purchase Request</button>
                                    </form>
                                  </td> 
                                  <td>
                                    <form action="/load-checklist" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Check List</button>
                                    </form>
                                  </td> 
                                  <td>
                                    <form action="/load-qcPass" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-block btn-primary btn-lg p-2">QC Pass</button>
                                    </form>
                                  </td> 
                                  <td>
                                    <form action="/load-persuratan" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Persuratan</button>
                                    </form>
                                  </td> 
                              </tr>
                          </table>
                      </div>
                  </div>
              </div> --}}

              

            </div>
          </div>
@endsection