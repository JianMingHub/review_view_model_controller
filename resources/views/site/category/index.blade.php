@extends('layouts.site')
@section('title', $pageTitle)

@section('content')
<div>
  <h3 id="title" align="center">{{ $listTitle }}</h3>
  <p align="right">
      <a href="{{ route('category.create') }}" class="btn btn-primary" title="Create">{{ $createTitle }}</a>
  </p>
</div>


@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif


<table id="category" class="table table-striped" style="width:100%">
  <thead>
      <tr>
          <th>#</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Created Date</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      @php
          $count = 0;
          $tableData = getCategoriesTable($categories);
      @endphp

      @foreach ($tableData as $row)
          @php
              $count++;
          @endphp

          <tr>
              <td>{{ $count }}</td>
              <td>{!! $row['name'] !!}</td>
              <td>{!! $row['slug'] !!}</td>
              <td>{!! $row['created_at'] !!}</td>
              <td>
                  {!! $row['edit'] !!}
                  {!! $row['delete'] !!}
                  {!! $row['link'] !!}
              </td>
          </tr>
      @endforeach
  </tbody>
  <tfoot>
      <tr>
          <th>#</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Created Date</th>
          <th>Action</th>
      </tr>
  </tfoot>
</table>

<script>
  $(document).ready(function() {
    $('#category').DataTable({
      "lengthMenu": [5, 10, 25, 50, 100, 500, 1000],
      "pageLength": 25
    });
  });
</script>
@endsection