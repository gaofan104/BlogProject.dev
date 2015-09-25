<div class="form-group">
    {!!  Form::label('content', 'Content:') !!}
    {!!  Form::textarea('content', null, ['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['style' => 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
</div>