@extends('../layouts.app')


@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">



              <form method="POST" enctype="multipart/form-data" action="{{route('store')}}">
                @csrf
                <div>
    {{-- {{$userid}} --}}
    <div class="mb-3">

        <label for="" class="form-label"> {{__('user/dash.Title')}} </label>
        <input type="text" name="name" class="form-control" id="" >
        <input type="hidden" name="userid"  class="form-control" id="" >
        
      </div>
      @if ($errors->any())
      @error('name')
      <div class="alert alert-danger">
          {{$message}}
        </div>
    @enderror
  @endif

      <div class="mb-3">
        <label for="" class="form-label">  {{__('user/dash.description')}}</label>
        <input type="text" name="description" class="form-control" id="" >
      </div>
      @if ($errors->any())
      @error('description')
      <div class="alert alert-danger">
          {{$message}}
        </div>
        @enderror
  @endif


      <div class="mb-3">
        <label for="" class="form-label"> {{__('user/dash.tag')}} </label>
        <input type="text" name="tag" class="form-control" id="" >
        
      </div>
      @if ($errors->any())
      @error('tag')
      <div class="alert alert-danger">
          {{$message}}
        </div>
    @enderror
  @endif

      <div class="mb-3">
        <label for="" class="form-label">{{__('user/dash.category')}} </label>
        <input type="text" name="category" class="form-control" id="" >
      </div>
      @if ($errors->any())
      <div class="alert alert-danger">
        @error('category')
          {{$message}}
          @enderror
        </div>
  @endif


  <div class="mb-3">
    <label for="" class="form-label">  {{__('user/dash.Photo')}}  </label>
    <input type="file" name="file" class="form-control" id="" > 
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    @error('file')
      {{$message}}
      @enderror
    </div>
@endif

</div>
<button type="submit" class="btn btn-success"> {{__('user/dash.Create New')}} </button>
</form>
</div>
            </div>
        </div>
    </div>
@endsection

{{-- 
helllllllllll

@foreach ($posts as $post)
{{$post->id}}
{{$post->name}}
{{$post->description}}
{{$post->tag}}
{{$post->category}}
<br>
@endforeach --}}