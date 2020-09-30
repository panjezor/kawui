@extends('layouts.app', ['activePage' => 'programs', 'titlePage' => __('Programs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Programs</h4>
                            <p class="card-category">All configured programs</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Command
                                        </th>
                                        <th>
                                            Version
                                        </th>
                                        <th>
                                            Added
                                        </th>
                                    </thead>
                                    <tbody>
                                        @php($programs = App\Models\Program::all())
                                        @foreach($programs as $key=>$program)
                                            <tr>
                                                <td>
                                                    {{$program->id}}
                                                </td>
                                                <td>
                                                    {{$program->name}}
                                                </td>
                                                <td>
                                                    {{$program->command}}
                                                </td>
                                                <td>
                                                    {{$program->version}}
                                                </td>

                                                <td>
                                                    {{$program->created_at}}
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
