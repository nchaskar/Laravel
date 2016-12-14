@extends('layouts.app')

@section('content')
<div class="container">

@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="/images/{{ Session::get('path') }}">
@endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Vine</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="admin" role="form" method="POST" action="{{ url('/home/update',$bottle->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ $name = Session::get('name') }}


                        <div class="form-group center">
                            <img src="{{asset('assets/images/')}}/{{$bottle->image}}" alt="" width="30%" height="40%">
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $bottle->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('grapes') ? ' has-error' : '' }}">
                            <label for="grapes" class="col-md-4 control-label">Grapes</label>

                            <div class="col-md-6">
                                <input id="grapes" type="text" class="form-control" name="grapes" value="{{ $bottle->grapes }}" required autofocus>

                                @if ($errors->has('grapes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grapes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ $bottle->country }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                            <label for="region" class="col-md-4 control-label">Region</label>

                            <div class="col-md-6">
                                <input id="region" type="text" class="form-control" name="region" value="{{ $bottle->region }}" required autofocus>

                                @if ($errors->has('region'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control" name="year" value="{{ $bottle->year }}" required autofocus>

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-md-4 control-label">Notes</label>

                            <div class="col-md-6">
                                <textarea id="notes" type="text" class="form-control" name="notes" rows="15" required>{{ $bottle->notes }}
                                </textarea>

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" autofocus>

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                        
                                <a href="{{ url('/home/show',$bottle->id ) }}"><button type="button" class="btn btn-danger">
                                
                                    Cancel

                                </button> </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
