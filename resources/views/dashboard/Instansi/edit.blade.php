@extends('dashboard.layouts.main')


@section('content')

<x-breadcrumb title="Edit Instansi" link="{{ route('instansi.create') }}" item="Instansi" subItem="Edit" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('instansi.update', $instansi->id) }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        @include('dashboard.instansi.form', ['tombol' => 'Update'])
    </form>
  </div>
</div>

@endsection

