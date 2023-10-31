@extends('dashboard.layouts.main')

@section('content')
<h1 class="ml-4">Berkas</h1> 
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
              <td>PENAWARAN</td>
              <td>
                  <i class="fas fa-solid fa-upload"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>DO</td>
              <td>DELIVERY ORDER</td>
              <td>
                  <i class="fas fa-solid fa-upload"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>DOK</td>
              <td>DOKUMENTASI</td>
              <td>
                  <i class="fas fa-solid fa-upload"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>ST</td>
              <td>SURAT TUGAS</td>
              <td>
                  <i class="fas fa-solid fa-upload"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>BAST</td>
              <td>BERITA ACARA SERAH TERIMA</td>
              <td>
                  <i class="fas fa-solid fa-upload"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
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