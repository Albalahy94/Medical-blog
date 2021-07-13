
@extends('../layouts.app')
@section("{{__('login.Dashboard')}}" , "{{__('admin/editmember.Medical Blog | Edit Member')}}") 

@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
          
          <form method="POST" action="{{route('admin.update',$allUsers->id)}}">
            @csrf
            <div class="card">
                <div class="card-header">{{ __('admin/editmember.Edit Member') }}</div>

    <div class="mb-3">

        <label for="" class="form-label"> {{__('admin/editmember.name')}}</label>
        <input value="{{$allUsers->name}}" type="text" name="name" class="form-control" id="" >
      </div>

      @if ($errors->any())
      @error('name')
      <div class="alert alert-danger">
        {{$message}}
      </div>
          @enderror
  @endif


      <div class="mb-3">
        <label for="" class="form-label"> {{__('admin/editmember.email')}}</label>
        <input value="{{$allUsers->email}}" type="text" name="email" class="form-control" id=""  >
      </div>

      @if ($errors->any())
      @error('email')
      <div class="alert alert-danger">
          {{$message}}
        </div>
          @enderror
  @endif

      <div class="mb-3">
        <label for="" class="form-label">{{__('admin/editmember.password')}}  </label>
        <input value="{{$allUsers->password}}"  type="password" name="password" class="form-control" id="" >
      </div>
      @if ($errors->any())
      @error('password')
      <div class="alert alert-danger">
          {{$message}}
        </div>
          @enderror
  @endif

  
  <div class="mb-3">
    <label for="password-confirm" class="form-label ">{{ __('admin/editmember.Confirm Password') }}</label>

    <div class="mb-3">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
@if ($errors->any())
@error('password_confirmation')
<div class="alert alert-danger">
    {{$message}}
  </div>
    @enderror
@endif


      
      <button type="submit"  class="btn btn-success">{{__('admin/editmember.update')}}</button>
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