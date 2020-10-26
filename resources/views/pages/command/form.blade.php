@extends('layouts.app', ['activePage' => 'programs', 'titlePage' => __('Programs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{strtoupper($program->name)}} {{$program->version ?? ''}}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('command.dispatch')}}">
                                @csrf
                                <fieldset class="container">
                                    <legend>{{__('Specify Target')}}</legend>
                                    <input type="hidden" value="{{$program->id}}" name="program_id">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="custom-control custom-checkbox d-flex justify-content-between">
                                                <div class="col-md-6 col-sm-12">
                                                    <label class="form-check-label"
                                                           for="param[0]">Target for {{$program->name}}</label>
                                                    <input type="text" class="form-control"
                                                           id="param[0]"
                                                           name="param[0]"
                                                           >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div >
                                        <button type="submit"
                                                class="btn btn-primary  btn-lg">{{ __('Dispatch task') }}</button>
                                    </div>
                                </fieldset>
                                @foreach($program->paramCategories as $paramCategory)
                                    <fieldset class="container">
                                        <legend>{{ucfirst(implode(' ',explode('-',$paramCategory->name)))}}</legend>
                                        <div class="row">

                                            @foreach($paramCategory->parameters as $parameter)
                                                <div class="form-group col-md-6 col-sm-12">
                                                    <div class="custom-control custom-checkbox d-flex justify-content-between">
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="paramcommand[{{$parameter->id}}]"
                                                                   name="paramcommand[{{$parameter->id}}]" value="true">
                                                            <label class="custom-control-label"
                                                                   for="paramcommand[{{$parameter->id}}]">Apply {{$parameter->param}}{{' - '.$parameter->description}}</label>
                                                        </div>

                                                        @if($parameter->accepts_values)
                                                            <div class="col-md-6 col-sm-12">
                                                                <label class="form-check-label"
                                                                       for="param[{{$parameter->id}}]">{{$parameter->tip_for_values}}</label>
                                                                <input type="text" class="form-control"
                                                                       id="param[{{$parameter->id}}]"
                                                                       name="param[{{$parameter->id}}]"
                                                                       placeholder="{{$parameter->example ?? ''}}">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </fieldset>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
