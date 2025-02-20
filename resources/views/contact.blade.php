@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contactstyle.css') }}">
@endpush

<div class="container">
    <h1>Contact Us</h1>
    <p>Email: queriesessential@gmail.com</p>
    <p>Phone: +44 7713345678</p>

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send</button>
    </form>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

</div>
@endsection
