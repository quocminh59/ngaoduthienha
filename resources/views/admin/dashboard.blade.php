@extends('layouts.admin')

@section('breadcrumb')
<div class="page-title">
    <h3>Dashboard</h3>
    {{ Breadcrumbs::render('dashboard') }}
</div>
@endsection

@section('content')
    <h1>This is dashboard page</h1>
@endsection