@extends('layouts.app')

@section('content')
<h1>Contact Details</h1>

<p><strong>Name:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Phone:</strong> {{ $contact->phone }}</p>
<p><strong>Address:</strong> {{ $contact->address }}</p>
@endsection