
@extends('./layouts.app')

@section('content')

<div id="layoutError">
    <div id="layoutError_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <h1 class="display-1">401</h1>
                            <p class="lead"> 
                                {{__('errors.Unauthorized')}}
                                </p>
                            <p>
                                {{__('errors.Access to this resource is denied.')}}
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
    <div id="layoutError_footer">

    </div>
</div>

@endsection
        