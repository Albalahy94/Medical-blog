@extends('../layouts.app')


@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
          
          
          <form method="POST" action="{{route('update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
    <div class="mb-3">
        <label for="" class="form-label"> {{__('user/dash.Title')}} </label>
        <input style="text-align: center" value="{{$post->name}}" type="text" name="name" class="form-control" id="" >
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
        <input style="text-align: center" value="{{$post->description}}" type="text" name="description" class="form-control" id="" >
      </div>
       @if ($errors->any())
      @error('description')
      <div class="alert alert-danger">
          {{$message}}
        </div>
        @enderror
  @endif

      <div class="mb-3">
        <label for="" class="form-label">  {{__('user/dash.tag')}} </label>
        <input style="text-align: center" value="{{$post->tag}}"  type="text" name="tag" class="form-control" id="" >
   </div>
      @if ($errors->any())
      @error('tag')
      <div class="alert alert-danger">
          {{$message}}
        </div>
    @enderror
  @endif

      <div class="mb-3">
        <label for="" class="form-label"> {{__('user/dash.category')}} </label>
        <input style="text-align: center" value="{{$post->category}}" type="text" name="category" class="form-control" id="" >
    </div>
      @if ($errors->any())
      <div class="alert alert-danger">
        @error('category')
          {{$message}}
          @enderror
        </div>
  @endif

  
  <div class="mb-3">
    <label for="photo" class="form-label"> {{__('user/dash.Photo')}}  </label>
    <input   type="file" name="file" class="form-control" id="photo" >

    <label for="photo" class="form-label"> {{__('user/dash.Old photo')}}  </label> <br>
   <div style="text-align: center">
     <img  width="500px"  height="500px" src="{{asset('images/' . $post->file)}}" name="old_file" value="{{$post->file}}" alt=""> 
     </div>
</div>
  @if ($errors->any())
  <div class="alert alert-danger">
    @error('category')
      {{$message}}
      @enderror
    </div>
@endif


  <button type="submit"  class="btn btn-success" > {{__('user/dash.Update')}}  </button>
</div>
  </form>


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