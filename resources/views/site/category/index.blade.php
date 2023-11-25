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


<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Delayed</th>
        <th scope="col">Destination</th>
        <th scope="col">Slug</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @php $count = request()->count && request()->page > 1 ? request()->count : 0; @endphp
    @foreach ( $categories as $category)
    @php $count++ @endphp
      <tr>
        <th scope="row">{{ $count }}</th>
        <td><a href="{{ route('category.show', ['slugCate' => str_slug($category->name), 'id' => $category->id]) }}">{{ $category->name }}</a></td>
        <td>{{ $category->status }}</td>
        <td>{{ $category->delayed }}</td>
        <td>{{ $category->destination }}</td>
        <td>{{ $category->slug }}</td>
        <td>
            <a href="{{ route('category.show', ['slugCate' => str_slug($category->name), 'id' => $category->id]) }}" class="btn btn-xs btn-primary" title="Detail">Detail</a>
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-xs btn-primary" title="Edit">Edit</a>
            <a href="{{ route('category.delete', $category->id) }}" class="btn btn-xs btn-danger" title="Detail">Delete</a>
            @if ($category->status == 1 && $category->destination == 'San Deigo')
              <a href="{{ route('category.updatedelay', $category->id) }}" class="btn btn-xs btn-danger" title="Update">Delay Update</a>
            @endif
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div style="display: flex; justify-content: center; padding-bottom: 20px; justify-content: space-between; align-items: center;">
    <div class="count-categories">{{ $categories->count() }} Categories total</div>
    {{-- <div class="pagination">{{ $categories->appends(['count' => $count])->links() }}</div> --}}
  </div>
@endsection