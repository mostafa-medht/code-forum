@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Channels') }}</div>

                <div class="card-body">
                    <table class="table tabel-hover">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($channels as $channel)
                                <tr>
                                    <td>
                                        {{$channel->title}}
                                    </td>
                                    <td>
                                        <a href="{{route('channels.edit', ['channel' => $channel->id])}}" class="btn btn-sm btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{route('channels.destroy', ['channel' => $channel->id])}}" class="btn btn-sm btn-danger">Destroy</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
