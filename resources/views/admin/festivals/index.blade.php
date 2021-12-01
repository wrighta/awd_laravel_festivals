@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Festivals
            <a href="{{ route('admin.festivals.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($festivals)=== 0)
              <p>There are no Festivals!</p>
            @else
            <table id="table-festivals" class="table table-hover">
                <thead>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Location</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($festivals as $festival)
                    <tr data-id="{{ $festival->id }}">
                      <td>{{ $festival->title }}</td>
                      <td>{{ $festival->description }}</td>
                      <td>{{ $festival->location }}</td>
                      <td>{{ $festival->start_date }}</td>
                      <td>{{ $festival->end_date }}</td>

                      <td>
                        <a href="{{ route('admin.festivals.show', $festival->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.festivals.edit', $festival->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.festivals.destroy', $festival->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                          <button type="submit" class="form-cotrol btn btn-danger">Delete</a>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
