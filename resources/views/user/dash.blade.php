
@extends('../layouts.app')


@section('content')

<br>
<br>
<br>
<div class="container">
  
  @if(Session::has('success'))
  
  <div class="alert alert-success">
  {{Session::get('success')}}
     </div>  
  @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              
              <table class="table">
                <thead>
                      <tr>
                        <th scope="col"> {{__('user/dash.ID')}} </th>
                        <th scope="col"> {{__('user/dash.Title')}} </th>
                        <th scope="col"> {{__('user/dash.description')}} </th>
                        <th scope="col"> {{__('user/dash.tag')}} </th>
                        <th scope="col"> {{__('user/dash.category')}} </th>
                        <th scope="col"> {{__('user/dash.Photo')}} </th> 
                        <th scope="col" colspan="3">  {{__('user/dash.Edit')}}   </th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post) 
                      <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{Str::limit($post->name,  10, '...') }}</td>
                        <td>{{Str::limit($post->description,  10, '...') }}  </td>
                        <td>{{Str::limit($post->tag,  10, '...') }}  </td>
                        <td>{{Str::limit($post->category,  10, '...') }} </td>
                        <td>{{Str::limit($post->file,  10, '...') }} </td>

                        <td> <a href="{{Url('showpost').'/'.$post->id}}"> <i class="far fa-eye"></i> </a> </td>

                        <td> <a href="{{Url('editpost').'/'.$post->id}}"> <i class="far fa-edit"></i> </a> </td>
                        <td> <a href="{{Url('delete').'/'.$post->id}}" onClick="return confirm('Are you sure ?')"> <i class="far fa-trash-alt"></i> </a> </td>
                    </tr>
                    @endforeach
                   </tbody>
                  </table>
                  
                  
                  
                  <a href="{{route('newpost')}}"  class="btn btn-success">   {{__('user/dash.Create New')}} </a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
 <br>
 
   {{-- <div>
          {{$posts->links();}}

        </div> --}}
@endsection
