<div class="row w-100">
    <div class="form-group col-md-6 @if ($errors->has('pel_inicio')) has-error @endif">
        {!! Form::label('pel_inicio', 'Início*', ['class' => 'control-label']) !!}
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
            {!! Form::text('pel_inicio', old('pel_inicio'), ['class' => 'form-control only-date', 'data-target' => '#reservationdate']) !!}
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        @if ($errors->has('pel_inicio')) <p class="help-block">{{ $errors->first('pel_inicio') }}</p> @endif
    </div>
    <div class="form-group col-md-6 @if ($errors->has('pel_termino')) has-error @endif">
        {!! Form::label('pel_termino', 'Término*', ['class' => 'control-label']) !!}
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
            {!! Form::text('pel_termino', old('pel_termino'), ['class' => 'form-control only-date', 'data-target' => '#reservationdate']) !!}
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        @if ($errors->has('pel_termino')) <p class="help-block">{{ $errors->first('pel_termino') }}</p> @endif
    </div>
    <div class="form-group col-md-12">
        {!! Form::submit('Salvar dados', ['class' => 'btn btn-primary pull-right']) !!}
    </div>
</div>