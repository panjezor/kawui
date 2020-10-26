@extends('layouts.app', ['activePage' => 'tasks', 'titlePage' => __('Tasks')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Jobs</h4>
                            <p class="card-category"> Here you can see awaiting tasks</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('programs')}}" class="btn btn-sm btn-primary">New task</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Command
                                        </th>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Output
                                        </th>
                                        <th>
                                            Creation date
                                        </th>
                                        <th>
                                            Last Update
                                        </th>
                                        <th>Completed</th>
                                        <th>
                                            Finished at
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(($results ?? []) as $result)
                                        <tr>
                                            <td>
                                                {{$result->getKey()}}
                                            </td>
                                            <td>
                                                {{$result->command}}
                                            </td>
                                            <td>
                                                {{$result->user->name ?? ''}}
                                            </td>
                                            <td>
                                                <pre>{{$result->output ?? ''}}</pre>
                                            </td>
                                            <td>
                                                {{$result->created_at}}
                                            </td>
                                            <td>
                                                {{$result->updated_at}}
                                            </td>
                                            <td>
                                                {{$result->completed ? 'Yes' : 'No'}}
                                            </td>
                                            <td>
                                                {{$result->completed_at}}
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
        </div>
    </div>
@endsection
