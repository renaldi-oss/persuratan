@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Create" link="{{ route('kodeSurat.index') }}" item="kode surat" subItem="Create" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('kodeSurat.store') }}" method="POST">
        {{ csrf_field() }}
        @include('dashboard.kodeSurat.form', ['tombol' => 'Create'])
    </form>
  </div>
</div>

@endsection
