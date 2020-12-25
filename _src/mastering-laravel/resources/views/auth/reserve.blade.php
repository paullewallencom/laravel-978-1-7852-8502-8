<?php
Form::macro('monthDayYear',function($suffix='')
{
    echo Form::selectMonth(($suffix!=='')?'month-'.$suffix:'month',date('m'));
    echo Form::selectRange(($suffix!=='')?'


    date-'.$suffix:'date',1,31,date('d'));
    echo Form::selectRange(($suffix!=='')?'year-'.$suffix:'year',date('Y'),date('Y')+3,date('Y'));
});
?>
{!! Form::open(['class'=>'form-horizontal',
'role'=>'form',
'method'=>'POST',
'url'=>'/reserve-room']) !!}
{!! Form::label(null, 'Start Date',[]) !!}
{!! Form::monthDayYear('start') !!}
{!! Form::label(null, 'End Date',[]) !!}
{!! Form::monthDayYear('end') !!}
{!! Form::submit('Reserve',['class'=>'btn btn-primary',
'style'=>'margin-right: 15px;']) !!}
{!! Form::close() !!}