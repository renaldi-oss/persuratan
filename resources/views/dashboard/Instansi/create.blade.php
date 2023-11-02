@extends('dashboard.layouts.main')


@section('content')

<x-breadcrumb title="Create Instansi" link="{{ route('instansi.create') }}" item="Instansi" subItem="Create" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('instansi.store') }}" method="POST">
        {{ csrf_field() }}
        @include('dashboard.instansi.form', ['tombol' => 'Create'])
    </form>
  </div>
</div>

@endsection

