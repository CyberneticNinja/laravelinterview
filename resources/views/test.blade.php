@extends('layouts.master')

@section('content')
<h1>Preamble</h1>
<h2>Form</h2>
<?php
echo Form::open(['method'=>'post','url'=>'/']);
echo '<table>';
echo '<tr><td>';
echo Form::label('firstName', 'First Name');
echo '</td><td>';
echo Form::text('firstName');
echo '</td></tr>';
echo '<tr><td>';
echo Form::label('lastName', 'Last Name');
echo '</td><td>';
echo Form::text('lastName');
echo '</td></tr>';
echo '<tr><td>';
echo Form::label('userName', 'Username');
echo '</td><td>';
echo Form::text('userName');
echo '</td></tr>';
echo '<tr><td>';
echo Form::label('email', 'Email');
echo '</td><td>';
echo Form::text('email');
echo '</td></tr>';
echo '<tr><td>';
echo Form::label('password', 'Password');
echo '</td><td>';
echo Form::password('password');
echo '</td></tr>';
echo '<tr><td>';
echo Form::label('password_confirmation', 'Password Confirm');
echo '</td><td>';
echo Form::password('password_confirmation');
echo '</td></tr>';
echo '</td><td>';
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
