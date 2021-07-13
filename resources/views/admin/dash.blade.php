
@extends('../layouts.app')

@section("{{__('login.Dashboard')}}" , "{{__('admin/dash.Medical Blog | Admin')}}") 


@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card"> --}}
                
                
                
                
                
                <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">{{__('admin/dash.main')}}</div>
                            <a class="nav-link" href="{{route('index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{__('login.Dashboard')}}  
                            </a>
                            <div class="sb-sidenav-menu-heading">  {{__('admin/dash.roles')}}</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                 {{__('admin/dash.members')}} 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('admin.members')}}">  {{__('admin/dash.All Members')}} </a>
                                    <a class="nav-link" href="{{route('newmember')}}">  {{__('admin/dash.Add Member')}} </a>
                                    <a class="nav-link" href="{{route('admin.pendingmembers')}}">  {{__('admin/dash.Pending Members')}} </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                 {{__('admin/dash.Posts')}}  
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        {{__('admin/dash.My Posts')}}   
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{route('show')}}">  {{__('Show Posts')}}  </a>
                                            <a class="nav-link" href="{{route('newpost')}}">  {{__('Add Post')}} </a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        {{__('admin/dash.All Posts')}}   
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{route('show')}}">  {{__('admin/dash.Show Posts')}} </a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>

                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @if(Session::has('success'))
        
                    <div class="alert alert-success">
                      {{Session::get('success')}}
        
                      </div>  
                              @endif
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">  {{__('login.Dashboard')}} </h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">  {{__('admin/dash.Blog Posts')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div  class="large text-white stretched-link" href="#">{{$allposts->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div  class="card bg-warning text-white mb-4">
                                    <div class="card-body">  {{__('admin/dash.Pending Members')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="large text-white stretched-link" href="#"> {{$pending->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">  {{__('admin/dash.Blog Members')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="large text-white stretched-link" href="#">{{$allUsers->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">  {{__('admin/dash.Blog Admins')}} </div>
                                    <div  class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="large text-white stretched-link" href="#">{{$admins->count()}}</div>
                                        {{-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    
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
                                            <th scope="col">  {{__('admin/dash.ID')}} </th>
                                            <th scope="col">  {{__('admin/dash.Title')}} </th>
                                            <th scope="col">  {{__('admin/dash.description')}} </th>
                                            <th scope="col">  {{__('admin/dash.tag')}} </th>
                                            <th scope="col">  {{__('admin/dash.category')}} </th>
                                            <th scope="col">  {{__('admin/dash.Photo')}} </th>
                                            <th style="text-align: center" scope="col" colspan="3">  {{__('admin/dash.Edit')}}   </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($allposts as $post)
                                          <tr>
                                            <th scope="row">{{$post->id}}</th>
                                            <td>{{Str::limit($post->name,  10, '...') }}</td>
                                            <td>{{Str::limit($post->description,  10, '...') }}  </td>
                                            <td>{{Str::limit($post->tag,  10, '...') }}  </td>
                                            <td>{{Str::limit($post->category,  10, '...') }} </td>
                                            <td>{{Str::limit($post->file,  10, '...') }} </td>
                                            <td style="text-align: center"> <a href="{{Url('showpost').'/'.$post->id}}"> <i class="far fa-eye"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{Url('editpost').'/'.$post->id}}"> <i class="far fa-edit"></i> </a> </td>
                                            <td style="text-align: center"> <a href="{{Url('delete').'/'.$post->id}}" onClick="return confirm('Are you sure ?')"> <i class="far fa-trash-alt"></i> </a> </td>
                                        </tr>
                                        @endforeach
                                     
                                      </tbody>
                                      
                                    </table>
                                </div>
                                <div style="text-align: right; with:100%;">
                                    <a href="{{route('newpost')}}" type="button" class="btn btn-success" >  {{__('admin/dash.Create New')}} </a>

                                </div>
                                
                            {{-- <div style="text-align: center">
                                {{$allposts->onEachSide(5)->links();}}

                            </div> --}}
                            </div>



                            
                    </div>




                    
                </main>



                
            </div>
        </div>








@endsection