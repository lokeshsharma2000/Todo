@extends('layouts.app')

@section('content')

<div style="width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Name" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">
        <input type="email" name="email" placeholder="Email" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">
        <input type="password" name="password" placeholder="Password" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%;">Register</button>
    </form>
</div>
@endsection