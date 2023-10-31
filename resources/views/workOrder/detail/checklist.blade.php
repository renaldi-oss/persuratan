@extends('dashboard.layouts.main')

@section('content')
<h1 class="ml-4">Check List</h1> 
              <div class="row ml-3 mr-3">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item Barang</th>
                                <th>Jumlah</th>
                                <th>Pembelian(Lokal/Online)</th>
                                <th>Check List</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Solar Panel</td>
                            <td>2</td>
                            <td>online</td>
                            <td> 
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    {{-- <label class="form-check-label">Checkbox</label> --}}
                                </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
@endsection