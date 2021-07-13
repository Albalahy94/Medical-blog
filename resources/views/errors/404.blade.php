@extends('./layouts.app')

@section('content')

        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="{{asset('assets/img/error-404-monochrome.svg')}}" />
                                    <p class="lead">
                                        {{__('errors.This requested URL was not found on this server.')}}
                                        
                                        </p>
                                    <a href="{{route('index')}}">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        {{__('errors.Return to Dashboard')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        </div>
        
@endsection
