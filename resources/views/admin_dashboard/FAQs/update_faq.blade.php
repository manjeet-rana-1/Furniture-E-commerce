@extends('admin_layout.master')
@section('title', 'Edit FAQ')

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
    }
    form {
        max-width: 500px;
        margin: auto;
    }
    label, textarea, input {
        display: block;
        width: 100%;
        margin-bottom: 15px;
    }
    input[type="submit"], .btn {
        width: auto;
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
    .FAQ-title {
        margin-top: 80px;
        margin-left: 360px;
    }
</style>

@section('content')
@if($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color: red">{{ $error }}</p>
    @endforeach
@endif

<h4 class="FAQ-title">Edit FAQ</h4>

<form action="{{ route('update.faq', $faq->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="question">Question:</label>
    <textarea name="question" id="question" rows="3" required>{{ old('question', $faq->question) }}</textarea><br>

    <label for="answer">Answer:</label>
    <textarea name="answer" id="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea><br>

    <button type="submit" class="btn btn-dark">Update FAQ</button>
    <a href="{{ route('faq-list') }}" class="btn btn-dark">View FAQs</a>
</form>
@endsection
