@extends('dashboard.layouts.main')

@section('content')
<h1 class="ml-4">QC Pass</h1> 
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
                                <th>Upload Foto</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Solar Panel</td>
                            <td>2</td>
                            <td>online</td>
                            <td>
                                <a href="" class="btn btn-warning btn-xs"><i class="fas fa-solid fa-camera"></i>&nbsp;</a>
                            </td>
                            <td>aman</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Solar Panel</td>
                            <td>2</td>
                            <td>online</td>
                            <td>
                                <a href="" class="btn btn-warning btn-xs"><i class="fas fa-solid fa-camera"></i>&nbsp;</a>
                            </td>
                            <td>aman</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Solar Panel</td>
                            <td>2</td>
                            <td>online</td>
                            <td>
                                <a href="" class="btn btn-warning btn-xs"><i class="fas fa-solid fa-camera"></i>&nbsp;</a>
                            </td>
                            <td>aman</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Solar Panel</td>
                            <td>2</td>
                            <td>online</td>
                            <td>
                                <a href="" class="btn btn-warning btn-xs"><i class="fas fa-solid fa-camera"></i>&nbsp;</a>
                            </td>
                            <td>aman</td>
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