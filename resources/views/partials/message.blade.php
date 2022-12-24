{{-- @include('partials.successdismiss') --}}

@if (session()->has('successdismiss'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {{session()->get('successdismiss')}}    
    </div>            
@endif


{{-- @include('partials.errordismiss') --}}
@if (session()->has('errordismiss'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {{session()->get('errordismiss')}}    
    </div>            
@endif
