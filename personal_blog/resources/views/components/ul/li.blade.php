@props(['link', 'value'])
@php
$color = 'color:#0dcaf0';
@endphp
<li >
    <a href="{{$link}}" class="navbar-brand" style="{{strpos(request()->route()->uri, lcfirst($value))? $color: ''}} ">
        {{$value}}
    </a>
</li>
