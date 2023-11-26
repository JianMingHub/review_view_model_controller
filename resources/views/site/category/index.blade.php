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
      <th>Created by</th>
      <th>Created date</th>
      <th >Action</th>
    </tr>
  </thead>
  <tbody>
    @php $count = 0; @endphp
    @foreach ( $categories as $category)
    @php $count++ @endphp
      <tr>
        <td>{{ $count }}</td>
        <td><a href="{{ route('category.show', ['slugCate' => str_slug($category->name), 'id' => $category->id]) }}">{{ $category->name }}</a></td>
        <td>{{ $category->slug }}</td>
        <td>{{ $category->slug }}</td>
        <td>{{ $category->created_at }}</td>
        <td>
          <a href="{{ route('category.show', ['slugCate' => str_slug($category->name), 'id' => $category->id]) }}" class="btn btn-sm btn-primary" title="Detail">Detail</a>
          <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary" title="Edit">Edit</a>
          <a href="{{ route('category.delete', $category->id) }}" class="btn btn-sm btn-danger" title="Detail">Delete</a>
          @if ($category->status == 1 && $category->destination == 'San Deigo')
            <a href="{{ route('category.updatedelay', $category->id) }}" class="btn btn-sm btn-danger" title="Update">Delay Update</a>
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Created by</th>
        <th>Created date</th>
        <th >Action</th>
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