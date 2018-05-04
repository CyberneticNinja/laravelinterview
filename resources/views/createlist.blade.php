@extends('layouts.master')

@section('content')
<h1>Create New List</h1>
<?php
echo Form::open(['method'=>'post','url'=>'createlist']);
echo '<table>';
echo '<tr><td>';
echo Form::label('title', 'Title');
echo '</td><td>';
echo Form::text('title');
echo '</td><td>';
echo Form::submit('submit');
echo '</td></tr>';
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
