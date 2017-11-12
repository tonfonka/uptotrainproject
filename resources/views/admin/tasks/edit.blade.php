
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update task</div>

                <div class="panel-body">
 {!! Form::model($task,array('route'=>['task.update',$task->id],'method'=>'PUT')) !!}
<div class="form-group">
{!! Form::label('title','Enter Title') !!}
{!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('body','Enter Title') !!}
{!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">

{!! Form::button('Update',['type'=>'submit','class'=>'btn btn-primary']) !!}
</div>

                  {!! Form::close() !!}
                  
                  


                </div>
            </div>
           
            </ul>
       
        </div>
    </div>
</div>
@endsection
