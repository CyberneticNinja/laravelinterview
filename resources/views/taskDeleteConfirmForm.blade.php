@extends('layouts.master')

@section('content')
<h1>
  Delete Confirmation: {{ $task->text }}
</h1>
<?php
echo Form::open(['method'=>'delete','url'=>'task/delete']);
echo '<table>';
echo Form::hidden('id', $task->id);
echo '<tr><td>';
echo Form::radio('delete', '1');
echo Form::label('delete', 'yes');
echo '</td><td>';
echo Form::radio('delete', '0',true);
echo Form::label('delete', 'no');
echo '</td></tr>';
echo '<tr><td>';
echo Form::submit('submit');
echo '</td</tr>';
echo '</table>';
echo Form::close();
?>
@endsection
