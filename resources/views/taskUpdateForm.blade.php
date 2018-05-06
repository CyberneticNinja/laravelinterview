@extends('layouts.master')

@section('content')
<h1>Tasks</h1>
<?php
$text = '';
$id = '';
$complete = '';
if($task)
{
  foreach ($task as $instance) {
    $text = $instance->text;
    $id = $instance->id;
    $complete = $instance->complete;
  }
}
echo Form::open(['method'=>'patch','url'=>'task/update']);
echo '<table>';
echo '<tr><td>';
echo Form::label('task', 'Task');
echo '</td></tr>';
echo '<tr><td>';
echo Form::hidden('id', $id);
echo Form::text('task',$text);
echo '</td></tr>';
echo '<tr><td>';
echo Form::label('Task completed', 'Task completed');
echo '</td></tr>';
echo '<tr><td>';
echo Form::radio('complete', '1',true);
echo Form::label('complete', 'yes');
echo '</td></tr>';
echo '<tr><td>';
echo Form::radio('complete', '0');
echo Form::label('complete', 'no');
echo '</td></tr>';
echo '<tr><td>';
echo Form::submit('submit');
echo '</td</tr>';
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
