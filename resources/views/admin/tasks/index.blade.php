
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @if(Session::has('meassage'))
                <div class="alert alert-success" >{{Session::get('meassage')}}
                </div>
                @endif
            <div class="panel panel-default">
                <div class="panel-heading">Task</div>

                <div class="panel-body">
                
                  <table class ="table">
                  <tr>
                    <th>Title</th>
                     <th>BOdy</th>
                     <th>action</th>
                  </tr>
                      @foreach($task as $task)
                  <tr>
                     <td>
                         {{$task->title}}
                     </td>
                     <td>
                         {{$task->body}}
                      </td>
                        <td>
     {!! Form::open(array('route'=>['task.destroy',$task->id],'method'=>'DELETE')) !!}

                           {{ link_to_route('task.edit','EDIT task',[$task->id],['class'=>'btn btn-success']) }}
                             |
                
                  {!! Form::button('Delete',['type'=>'submit','class'=>'btn btn-danger']) !!}
                   {!! Form::close() !!}
                          
                  </td>
                  </tr>
                  @endforeach
                  </table>
                  
                </div>
            </div>
              {{ link_to_route('task.create','Add task',null,['class'=>'btn btn-primary'])}}
             
        </div>

    </div>
</div>
@endsection
