@extends('layouts.app')

@section('content')

    <h2>Daftar Member</h2>

    <ul>
        @foreach($members as $member)
            <li>{{ $member }}</li>
        @endforeach
    </ul>

@endsection