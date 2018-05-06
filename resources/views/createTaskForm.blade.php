@extends('layouts.master')

@section('content')
<h1>List:{{ $list->title }}</h1>
<h2>Create Task</h2>
<?php
echo Form::open(['method'=>'post','url'=>'list/tasks/create']);
echo '<table>';
echo '<tr><td>';
echo Form::label('task', 'Task');
echo '</td><td>';
echo Form::text('task');
echo Form::hidden('id', $list->id);
echo Form::submit('submit');
echo '<tr><td>';
echo '</table>';
echo Form::close();

if($errors->any())
{
  echo '<ul>';
  foreach ($errors->all() as $error) {
    echo '<li>';
    echo $error;
    echo '</li>';
  }
  echo '</ul>';
}

 ?>
@endsection
