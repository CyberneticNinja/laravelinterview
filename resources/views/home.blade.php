@extends('layouts.master')

@section('content')
<div class="starter-template">
    <!-- <div class="row justify-content-center"> -->
      <h2>Member Dash</h2>
      @if(count($lists) > 0)
        <table style="width:100%">
            @foreach($lists as $list)
            @php
              $urlupdate = "list/update/".$list->id;
              $urldelete = "list/delete/".$list->id;
              $url = "list/".$list->id."/tasks";
            @endphp
            <tr>
              <td>
                {{$list->title }}
              </td>
              <td>
                <a class="nav-link" href="{{ url($urlupdate) }}">Update</a>
              </td>
              <td>
                <a class="nav-link" href="{{ url($urldelete) }}">Delete</a>
              </td>
              <td>
                <a class="nav-link" href='{{ url($url) }}'>Tasks</a>
              </td>
              </tr>
            @endforeach
        </table>
        <a class="nav-link" href="{{ route('showcreateList') }}">NEW LIST</a>
      @else
            <a class="nav-link" href="{{ route('showcreateList') }}">NEW LIST</a>
      @endif

    <!-- </div> -->
</div>
@endsection
