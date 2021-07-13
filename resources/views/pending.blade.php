@extends('./layouts.app')

@section('content')
<br>
<br>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="{{asset('assets/img/pending.svg')}}" />
                                    <p class="lead">{{__('errors.Your requested waiting for admin conformation.')}}</p>
                                    <h3 href="{{route('index')}}">
                                       
                                        {{__('errors.Thank you for regestration :) ')}}
                                        </h3>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </div>
        </div>
@endsection
