@extends('layouts.master')

@section('content')
<h1>Update</h1>
<?php
echo Form::open(['method'=>'patch','route'=>'updatelist']);
echo '<table>';
echo '<tr><td>';
echo Form::label('title', 'Title');
echo '</td><td>';
echo Form::text('title',$list->title);
echo '</td><td>';
echo Form::hidden('id', $list->id);
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
