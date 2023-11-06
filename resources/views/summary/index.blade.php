@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex">
  <h1 class="ml-4">Summary</h1>
</div>
<div class="row ml-3 mr-3">
  <div class="col-12">
    <div class="card">
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap col-12">
          <thead>
              <tr>
                  <th class="col-5">No Surat</th>
                  <th class="col-5">Nama Pekerjaan</th>
                  <th class="col-2">Aksi</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Proyek 1</td>
              <td>
                  <i class="fas fa-solid fa-download"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Proyek 2</td>
              <td>
                  <i class="fas fa-solid fa-download"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Proyek 3</td>
              <td>
                  <i class="fas fa-solid fa-download"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>Proyek 4</td>
              <td>
                  <i class="fas fa-solid fa-download"></i>&nbsp;
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