

@extends('../layouts.app')

{{-- @section(__('login.Dashboard '), __('Medical Blog | Members '))  --}}
@section("__('login.Dashboard ')" , "{{__('admin/members.Medical Blog | Members')}}") 

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
        <div class="col-md-8">
            <div class="card">

                          

                          <div id="layoutSidenav_content">
                            <main>
                                <div class="container-fluid px-4">
                                    <h1 class="mt-4">{{__('admin/dash.All Members')}}</h1>
                                    


                          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                {{__('admin/dash.Blog Posts')}} 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    {{-- <table style="width: auto" class="table"> --}}
                                        <thead>
                                          <tr>
                                            <th scope="col">{{__('admin/dash.ID')}} </th>
                                            <th scope="col">{{__('login.Name')}} </th>
                                            <th scope="col">{{__('login.E-Mail')}} </th>

                                            <th style="text-align: center" scope="col" colspan="2">{{__('admin/dash.Edit')}}  </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($allUsers as $user)
                                          <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{Str::limit($user->name,  10, '...') }}</td>
                                            <td>{{Str::limit($user->email,  10, '...') }}  </td>
                                            <td style="text-align: center"> <a href="{{route('editmember', $user->id )}}"><i class="far fa-edit"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{route('removemember', $user->id)}}" onClick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i> </a>  </td>
                                        </tr>
                                        @endforeach
                                     
                                      </tbody>
                                      
                                    </table>
                                </div>
                                <div style="text-align: right; with:100%;">
                                    <a href="{{route('newmember')}}" type="button" class="btn btn-success" >
                                      {{ __('admin/dash.Add Member') }}
                                    </a>

                                </div>
                                
                            {{-- <div style="text-align: center">
                                {{$allposts->onEachSide(5)->links();}}

                            </div> --}}
                            </div>



                            
                    </div>





                    


                </div>
                
              </div>
            </div>
            @endsection
            
            


