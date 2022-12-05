<div class="mb-3 d-flex justify-content-between">
    <div class="input-icon w-75">
    	{!! Form::text('', '', ['class' => 'form-control', 'placeholder' => 'Buscar...', 'wire:model' => 'search']) !!}
        <span class="input-icon-addon">
            <i class="ti ti-search"></i>
        </span>
    </div>
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addModal">
    	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="12" y1="11" x2="12" y2="17" /><line x1="9" y1="14" x2="15" y2="14" /></svg> Añadir registro
    </button>
</div>