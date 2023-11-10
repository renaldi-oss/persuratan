@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex">
  <h1 class="ml-4">Berkas</h1>
  <div class="card-body justify-content-end">
    <a href="/add-persuratan">
      <button type="submit" class="btn btn-block btn-primary btn-sm col-2 align-right">
        <i class="fas fa-solid fa-plus"></i>&nbsp;Tambah
      </button>
    </a>
  </div> 
</div>
<div class="row ml-3 mr-3">
  <div class="col-12">
    <div class="card">
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
              <tr>
                  <th>Kode Surat</th>
                  <th>Tipe Surat</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>PEN</td>
              <td>proyek</td>
              <td>
                  <a href="" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                  <a href="" class="btn btn-success btn-xs"><i class="fas fa-solid fa-upload"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>DO</td>
              <td>DELIVERY ORDER</td>
              <td>
                  <a href="" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                  <a href="" class="btn btn-success btn-xs"><i class="fas fa-solid fa-upload"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>DOK</td>
              <td>DOKUMENTASI</td>
              <td>
                  <a href="" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                  <a href="" class="btn btn-success btn-xs"><i class="fas fa-solid fa-upload"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>ST</td>
              <td>SURAT TUGAS</td>
              <td>
                  <a href="" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                  <a href="" class="btn btn-success btn-xs"><i class="fas fa-solid fa-upload"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>BAST</td>
              <td>BERITA ACARA SERAH TERIMA</td>
              <td>
                  <a href="" class="btn btn-primary btn-xs"><i class="fas fa-solid fa-eye"></i>&nbsp;</a>
                  <a href="" class="btn btn-success btn-xs"><i class="fas fa-solid fa-upload"></i>&nbsp;</a>
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