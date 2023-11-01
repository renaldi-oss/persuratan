@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex">
  <h1 class="ml-4">Check List</h1> 
  <div class="card-body justify-content-end">
    <button type="submit" class="btn btn-block btn-primary btn-sm col-2 align-right">
      <i class="fas fa-solid fa-print"></i>&nbsp;Print
    </button>
  </div>
</div>
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
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection