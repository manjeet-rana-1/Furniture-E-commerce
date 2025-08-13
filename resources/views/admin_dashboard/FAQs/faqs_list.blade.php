@extends('admin_layout.master')
@section('title', 'FAQs')
<style>
    .Add-button{
        height: auto;
        margin-left:350px;
        margin-top:100px;
    }
    .table-section{
        width: 80%;
        margin-left: 300px;
        margin-top: 30px;
    }
    .answer{
        width: 40%;
    }
    .question{
        width:25%;
    }
</style>
@section( 'content')
<a href="{{ route('show.faq') }}" class="btn btn-dark Add-button">Add Faqs</a>
<section class="table-section">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Questions</th>
        <th scope="col">Answers</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($faqs as $faq)
      <tr>
        <th scope="row">{{$faq->id}}</th>
        <td class="question">{{ $faq->question }}</td>
        <td class="answer">{{ $faq->answer }}</td>
        <td>
            <a href="{{ route('edit.faq', $faq->id) }}" class="btn btn-dark">Update</a>
            <a href="{{ route('delete.faq', $faq->id) }}" class="btn btn-dark">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
