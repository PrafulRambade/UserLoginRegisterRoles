@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Company') }}</div>

                <div class="card-body">
                    {{ Form::open(array('url'=>'admin/user_add' ,'class' => 'form-horizontal', 'id'=>'todoForm','method'=>'POST')) }}
                        {{-- @csrf --}}
                        @if(session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::text('name', $value = null, $attributes = array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Name')) }}
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::text('email', $value = null, $attributes = array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter Email')) }}
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{-- {{Form::select('company_name',$company,null,array('multiple'=>'multiple','name'=>'company_name[]'))}} --}}
                                    {{-- {{ Form::select('users[]',$company,  null, ['class' => 'form-control', 'form-control']) }} --}}
                                    <select class='form-control' name='company_name[]' multiple>
                                        @foreach($company as $companies)
                                            <option value="{{$companies->id}}">{{$companies->name}}</option>    
                                        @endforeach
                                    </select>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::text('password', $value = null, $attributes = array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Enter Password')) }}
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="form-group">
                                    {{ Form::submit('Create Company', $attributes = array('class' => 'btn btn-primary','id'=>'add_company')) }}
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
