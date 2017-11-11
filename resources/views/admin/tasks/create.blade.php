
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Task</div>

                <div class="panel-body">
 {!! Form::open(array('route'=>'task.store')) !!}
<div class="form-group">
{!! Form::label('title','Enter Title') !!}
{!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('body','Enter Title') !!}
{!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">

{!! Form::button('Create',['type'=>'submit','class'=>'btn btn-primary']) !!}
</div>

                  {!! Form::close() !!}
                  
                  


                </div>
            </div>
           
            </ul>
       
        </div>
    </div>
</div>
@endsection
