@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Company') }}</div>

                <div class="card-body">
                    {{ Form::open(array('url'=>'admin/company_add' ,'class' => 'form-horizontal', 'id'=>'todoForm','method'=>'POST')) }}
                        {{-- @csrf --}}
                        @if(session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::text('company_name', $value = null, $attributes = array('class' => 'form-control', 'id' => 'company_name', 'placeholder' => 'Enter Company Name')) }}
                                    @if ($errors->has('company_name'))
                                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::text('company_city', $value = null, $attributes = array('class' => 'form-control', 'id' => 'company_city', 'placeholder' => 'Enter Company City')) }}
                                    @if ($errors->has('company_city'))
                                        <span class="text-danger">{{ $errors->first('company_city') }}</span>
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
