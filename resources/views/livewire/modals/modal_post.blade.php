<div wire:ignore.self class="modal modal-blur fade" id="addModal" tabindex="-1" role="dialog"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="clearModal"
                aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="guardar" autocomplete="off">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
            {!! Form::label('activity_name', 'NOMBRE ACTIVIDAD *', ['class' => 'form-label
            required']) !!}
            {!! Form::text('activity_name', '', ['id' => 'activity_name', 'class' => 'form-control
            text-uppercase', 'wire:model' => 'activity_name', 'placeholder' => 'Nombre de la actividad'])
             !!}
            @error('activity_name')
            <span class="text-danger m-b-none">{{ $message }}</span>
            @enderror
          </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('activity_date', 'FECHA *', ['class' => 'form-label required']) !!}
                {!! Form::date('activity_date', '', ['id' => 'activity_date', 'class' => 'form-control', 'wire:model' => 'activity_date'])
                !!}
                @error('activity_date')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('start_time', 'HORA INICIO *', ['class' => 'form-label required']) !!}
                {!! Form::time('start_time', '', ['class' => 'form-control', 'wire:model' => 'start_time']) !!}
                @error('start_time')
                  <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('final_hour', 'HORA FINAL *', ['class' => 'form-labl required']) !!}
                {!! Form::time('final_hour', '', ['class' => 'form-control', 'wire:model' => 'final_hour']) !!}
                @error('final_hour')
                  <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('cultural_right', 'DERECHOS CULTURALES *', ['class' => 'form-label required']) !!}
                {!! Form::select('cultural_right', $culturalRights, '', ['id' => 'cultural_right', 'class' => 'form-select', 'placeholder' => 'Seleccione...', 'wire:model' => 'cultural_right']) !!}
                @error('cultural_right')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('nac', 'NAC', ['class' => 'form-label required']) !!}
                {!! Form::select('nac', $nacs, '', ['id' => 'nac', 'class' => 'form-control', 'placeholder' => 'Seleccione', 'wire:model' => 'nac']) !!} 
                @error('nac')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('expertise', 'Experticias *', ['class' => 'form-label required']) !!}
                {!! Form::select('expertise', $expertises, '', ['id' => 'expertise', 'class' => 'form-select', 'placeholder' => 'Seleccione', 'wire:model' => 'expertise']) !!}
                @error('expertise')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('monitor', 'Monitor *', ['class' => 'form-label required']) !!}
                {!! Form::select('monitor', $monitors, '', ['id' => 'monitor', 'class' => 'form-select', 'placeholder' => 'Seleccione', 'wire:model' => 'monitor']) !!}
                @error('monitor')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal" wire:click="clearModal">Cerrar</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div wire:ignore.self class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="clearModal"
                aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="actualizar" autocomplete="off">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
            {!! Form::label('activity_name', 'NOMBRE ACTIVIDAD *', ['class' => 'form-label
            required']) !!}
            {!! Form::text('activity_name', '', ['id' => 'activity_name', 'class' => 'form-control
            text-uppercase', 'wire:model' => 'activity_name', 'placeholder' => 'Nombre de la actividad'])
             !!}
            @error('activity_name')
            <span class="text-danger m-b-none">{{ $message }}</span>
            @enderror
          </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('activity_date', 'FECHA *', ['class' => 'form-label required']) !!}
                {!! Form::date('activity_date', '', ['id' => 'activity_date', 'class' => 'form-control', 'wire:model' => 'activity_date', 'data-date' => '', 'data-date-format' => "YYYY-mm-dd"])
                !!}
                @error('activity_date')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('start_time', 'HORA INICIO *', ['class' => 'form-label required']) !!}
                {!! Form::time('start_time', '', ['class' => 'form-control', 'wire:model' => 'start_time']) !!}
                @error('start_time')
                  <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('final_hour', 'HORA FINAL *', ['class' => 'form-labl required']) !!}
                {!! Form::time('final_hour', '', ['class' => 'form-control', 'wire:model' => 'final_hour']) !!}
                @error('final_hour')
                  <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('cultural_right', 'DERECHOS CULTURALES *', ['class' => 'form-label required']) !!}
                {!! Form::select('cultural_right', $culturalRights, '', ['id' => 'cultural_right', 'class' => 'form-select', 'placeholder' => 'Seleccione...', 'wire:model' => 'cultural_right']) !!}
                @error('cultural_right')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('nac', 'NAC', ['class' => 'form-label required']) !!}
                {!! Form::select('nac', $nacs, '', ['id' => 'nac', 'class' => 'form-control', 'placeholder' => 'Seleccione', 'wire:model' => 'nac']) !!} 
                @error('nac')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('expertise', 'Experticias *', ['class' => 'form-label required']) !!}
                {!! Form::select('expertise', $expertises, '', ['id' => 'expertise', 'class' => 'form-select', 'placeholder' => 'Seleccione', 'wire:model' => 'expertise']) !!}
                @error('expertise')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                {!! Form::label('monitor', 'Monitor *', ['class' => 'form-label required']) !!}
                {!! Form::select('monitor', $monitors, '', ['id' => 'monitor', 'class' => 'form-select', 'placeholder' => 'Seleccione', 'wire:model' => 'monitor']) !!}
                @error('monitor')
                <span class="text-danger m-b-none">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal" wire:click="clearModal">Cerrar</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>