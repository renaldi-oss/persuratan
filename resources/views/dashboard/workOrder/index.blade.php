@extends('dashboard.layouts.main')

{{-- format main content dashboard --}}
@section('content')

        <h1 class="ml-4">Work Order</h1> 
        <div class="row ml-3 mr-3">
            <div class="col-12">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Instansi</th>
                            <th>Pekerjaan</th>
                            <th>Lokasi</th>
                            <th>Due date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>PT Tekno Klop</td>
                        <td>Instalasi Jaringan</td>
                        <td>Instalasi Jaringan</td>
                        <td>Malang</td>
                        <td>13/05/2022</td>
                        <td>
                            <a href="/workOrder/detail" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                            <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                            <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
                        </td>
                      </tr>
                      <tr>
                        <td>PT Tekno Klop</td>
                        <td>Instalasi Jaringan</td>
                        <td>Instalasi Jaringan</td>
                        <td>Malang</td>
                        <td>13/05/2022</td>
                        <td>
                          <a href="/workOrder/detail" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                          <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                          <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
                        </td>
                      </tr>
                      <tr>
                        <td>PT Tekno Klop</td>
                        <td>Instalasi Jaringan</td>
                        <td>Instalasi Jaringan</td>
                        <td>Malang</td>
                        <td>13/05/2022</td>
                        <td>
                          <a href="/workOrder/detail" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                          <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                          <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
                        </td>
                      </tr>
                      <tr>
                        <td>PT Tekno Klop</td>
                        <td>Instalasi Jaringan</td>
                        <td>Instalasi Jaringan</td>
                        <td>Malang</td>
                        <td>13/05/2022</td>
                        <td>
                          <a href="/workOrder/detail" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                          <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                          <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
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