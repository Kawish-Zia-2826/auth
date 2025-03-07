{{-- {{Auth::User()}} --}}
<a  href="{{route('logout')}}">logout</a>


<a href="{{route('inner')}}">inner</a>
{{-- 
@if (Gate::allows('isAdmin'))
<a href="#">admin</a>  
@endif

@if (Gate::denies('isAdmin'))
<a href="#">user</a>  
@endif --}}


@can (Gate::allows('isAdmin'))
{{-- <a href="#">admin</a>   --}}
@endcan

@cannot (Gate::denies('isAdmin'))
<a href="#">user</a>  
@endcan

<a href="{{route('profile.show',Auth::id())}}">usr </a>
<a href="{{route('post.show',Auth::id())}}">posts </a>