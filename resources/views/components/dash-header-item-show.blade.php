    @if (URL::current() != url('{{$url}}') )
        <div> <a href='{{$url}}'>
            {{$slot}}
        </a> </div>
    @endif
