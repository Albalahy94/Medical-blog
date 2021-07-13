@extends('../layouts.app')


@section('content')

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <table class="table">
                    <thead>
                        <tr>
                          <th  scope="col" colspan="5">{{__('user/dash.ID')}} </th>

                        </tr>
                      </thead>
                      <tbody>

                        <tr style="text-align: center">
                          <th scope="row">{{$post->id}}</th>
                     
                    </tr>

                </tbody>
                      <thead>
                        <tr>
                          <th  scope="col" colspan="5">{{__('user/dash.Title')}} </th>
                        
  
                        </tr>
                      </thead>
                      <tbody>

                        <tr style="text-align: center">
                      
                        <td>{{$post->name}}</td>
                       
                    </tr>

                </tbody>

                      <thead>
                        <tr>
                       
                          <th  scope="col" colspan="5" >{{__('user/dash.description')}} </th>
                        
  
                        </tr>
                      </thead>
                      <tbody>

                        <tr style="text-align: center">
                       
                        <td >{{$post->description}}  </td>
                    
                    </tr>

                </tbody>
                      <thead>
                        <tr>
                      
                          <th  scope="col" colspan="5">{{__('user/dash.tag')}} </th>
                       
  
                        </tr>
                      </thead>
                      <tbody>

                        <tr style="text-align: center">
                    
                        <td>{{$post->tag}}  </td>
                         </tr>

                </tbody>


                      <thead>
                        <tr>
                    
                          <th  scope="col" colspan="5">{{__('user/dash.category')}}</th>
                    
                        </tr>
                      </thead>
                      <tbody>

                        <tr style="text-align: center">
                          <td>{{$post->category}} </td>
                          </tr>

                </tbody>


                <thead>
                  <tr>
              
                    <th  scope="col" colspan="5">{{__('user/dash.Photo')}}</th>
              
                  </tr>
                </thead>
                <tbody>

                  <tr style="text-align: center">
                <td> <img width="500px"  height="500px" src="{{asset('images/' . $post->file)}}" alt=""> </td>
                    </tr>

          </tbody>

                      <thead>
                        <tr>
                        
                          <th  scope="col"  colspan="5"> {{__('user/dash.Edit')}} </th>
  
                        </tr>
                      </thead>
                    <tbody>

                        <tr>
                     

                        <td> <a href="{{Url('editpost').'/'.$post->id}}"> <i class="far fa-edit"></i> </a> </td>
                        <td> <a href="{{Url('delete').'/'.$post->id}}" onClick="return confirm('Are you sure ?')"> <i class="far fa-trash-alt"></i> </a> </td>
                    </tr>

                </tbody>
                  </table>




<a href="{{route('newpost')}}"  class="btn btn-success">{{__('user/dash.Create New')}} </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


