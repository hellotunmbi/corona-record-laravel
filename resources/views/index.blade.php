@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <div class="row py-4">
      <div class="col"><a type="button" class="btn btn-primary" href="{{ route('coronas.create') }}">Add New Case</a></div>
  </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Country Name</td>
          <td>Symptoms</td>
          <td>Cases</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($coronacases as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->country_name}}</td>
            <td>{{$case->symptoms}}</td>
            <td>{{$case->cases}}</td>
            <td><a href="{{ route('coronas.edit', $case->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('coronas.destroy', $case->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection