@extends('workOrder.detail.index')

@section('content')
<div class="row d-flex">
  <h1 class="ml-4">Purchase Request</h1> 
  <div class="card-body justify-content-end">
    <button type="submit" class="btn btn-block btn-primary btn-sm col-2 align-right">
      <i class="fas fa-solid fa-plus"></i>&nbsp;Tambah
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
                  <th>Item barang</th>
                  <th>Jumlah</th>
                  <th>Pembelian(Lokal/Online)</th>
                  <th>Harga Estimasi</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <i class="fas fa-solid fa-pen"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <i class="fas fa-solid fa-pen"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <i class="fas fa-solid fa-pen"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <i class="fas fa-solid fa-pen"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <i class="fas fa-solid fa-pen"></i>&nbsp;
                  <i class="fas fa-solid fa-trash"></i>&nbsp;
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <i class="fas fa-solid fa-pen"></i>&nbsp;
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