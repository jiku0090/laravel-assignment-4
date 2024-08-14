@extends('layouts.app')

@section('content')
<h1>Contact List</h1>

<form method="GET" action="{{ route('contacts.index') }}">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th><a href="{{ route('contacts.index', ['sort_by' => 'name', 'order' => request('order', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
            <th>Email</th>
            <th><a href="{{ route('contacts.index', ['sort_by' => 'created_at', 'order' => request('order', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Created At</a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection