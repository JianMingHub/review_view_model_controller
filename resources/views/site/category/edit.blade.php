@extends('layouts.site')
@section('title', $pageTitle)
@section('content')

<ul class="breadcrumb">
   @foreach ($breadcrumbs as $breadcrumb)
      {{ $breadcrumb['name'] }}
      @unless ($loop->last)
         /
      @endunless
   @endforeach
</ul>


<div class="btn-back"><a href="{{ route('category.index') }}" class="btn btn-primary" title="Back">Back</a></div>

<form action="{{ route('category.update', $category->id)}}" method="post">
   <div class="row">
      <div class="col-6">
         <div class="mb-3">
            <label for="">Name</label>
            <input type="text" onchange="getSlug()" name="name" class="form-control title {{ $errors->has('name')? 'is-invalid':''}}" placeholder="Name..." value="{{ old('name') ?? $category->name }}">
            @error('name')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control slug {{ $errors->has('slug')? 'is-invalid':''}}" placeholder="Slug..." value="{{ old('slug') ?? $category->slug }}">
            @error('slug')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Group</label>
            <select name="parent_id" id="" class="form-select">
               <option value="0">Not Parent</option>
               {{!! getCategories($categories, old('parent_id') ?? $category->parent_id) !!}}
            </select>
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Meta title</label>
            <input type="text" name="meta_title" class="form-control title " placeholder="Meta_title..." value="{{ old('meta_title') ?? $category->meta_title }}">
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Meta keyword</label>
            <input type="text" name="meta_keyword" class="form-control title " placeholder="Meta_keyword..." value="{{ old('meta_keyword') ?? $category->meta_keyword }}">
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Meta description</label>
            <textarea name="meta_description" class="form-control" rows="4" placeholder="Meta_description...">{{ old('meta_description') ?? $category->meta_description }}</textarea>
         </div>
      </div>

      <div class="col-12">
         <button type="submit" class="btn btn-primary">Save</button>
         <a href="{{ route('category.index') }}" class="btn btn-danger">Canel</a>
      </div>
   </div>
   @csrf
   @method('PUT')
</form> 
@endsection