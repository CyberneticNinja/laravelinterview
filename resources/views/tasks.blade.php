@extends('layouts.master')

@section('content')
<div class="starter-template">
      <h2>List {{ $list->title }}::Tasks</h2>
      @php
          $urlcreatetask = 'list/'.$list->id.'/tasks/create';
      @endphp
      @if(count($tasks) > 0)
        <table style="width:100%">
            <tr>
              <td>
                <h4>Task Name</h4>
              </td>
              <td>
                <h4>Completed</h4>
              </td>
            </tr>
          @foreach($tasks as $task)
            <tr>
              <td>
              {{ $task->text }}
              </td>
              @if($task->completed > 0)
                <td>
                  Yes
                </td>
              @else
                <td>
                  No
                </td>
              @endif
              @php
              $urltaskupdate = 'task/'.$task->id.'/update';
              $urltaskdelete = 'task/'.$task->id.'/delete';
              @endphp
              <td>
                <a class="nav-link" href="{{ url($urltaskupdate) }}">Update</a>
              </td>
              <td>
                <a class="nav-link" href="{{ url($urltaskdelete) }}">Delete</a>
              </td>
            </tr>
          @endforeach
        </table>
        <a class="nav-link" href="{{ url($urlcreatetask) }}">New Task</a>
      @else
        <a class="nav-link" href="{{ url($urlcreatetask) }}">New Task</a>
      @endif
</div>
@endsection
