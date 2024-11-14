@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">@lang('site.users')</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        @include('admin.layouts.inc._breadcrumb')
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
   
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">@lang('site.users')</h3> --}}
        <a href="#" class="btn btn-sm btn-success"><i class="fas fa-user-plus fa-sm mx-1"></i>@lang('site.add new')</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if (session()->has('success')) 
            <div class="alert alert-success mt-1 mx-4 mb-3 py-1">
                    {{ session('success') }}
              </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>@lang('site.id')</th>
            <th>@lang('الاسم')</th>
            <th>@lang('site.Last name')</th>
            <th>@lang('site.email')</th>
            <th>@lang('site.action')</th>
            
          </tr>
          </thead>
          <tbody>
            
              <tr>
                <td>@lang('not found')</td>
                <td>@lang('not found')</td>
                <td>@lang('not found')</td>
                <td>@lang('not found')</td>
                <td>@lang('not found')</td>
              </tr>
         
         
          </tbody>
          <tfoot>
          <tr>
            <th>@lang('site.id')</th>
            <th>@lang('site.First name')</th>
            <th>@lang('site.Last name')</th>
            <th>@lang('site.email')</th>
            <th>@lang('site.action')</th>
          </tr>
          </tfoot>
        </table>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
    
@endsection
