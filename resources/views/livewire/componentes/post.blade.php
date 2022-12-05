<div>
    @include('livewire.modals.modal_post')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Utilce la siguiente tabla para navegar o filtrar resultados.</h3>
        </div>
        <div class="card-body border-bottom py-3">
            @include('livewire.commons.busqueda')
        </div>
        <div class="table-responsive">
            <table class="table table-striped mx-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CONSECUTIVO</th>
                        <th>MONITOR</th>
                        <th>DERECHOS CULTURALES</th>
                        <th>NAC</th>
                        <th>FECHA</th>
                        <th>HORA INICIO</th>
                        <th>HORA FINAL</th>
                        <th>EXPERTICIA</th>
                        <th>FECHA db</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->consecutive }}
                            </td>
                            <td>
                                {{ $item->monitor_name }}
                            </td>
                            <td>
                                {{ $item->cultural }}
                            </td>
                            <td>
                                {{ $item->origen }}
                            </td>
                            <td>
                                {{ $item->activity_date }}
                            </td>
                            <td>
                                {{ $item->start }}
                            </td>
                            <td>
                                {{ $item->end }}
                            </td>
                            <td>
                                {{ $item->expertises }}
                            </td>
                            <td>
                                {{ $item->created_at->toDateString('Y-m-d') }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-md btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                    wire:click="editar({{ $item->id }})">
                                Editar
                            </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    </div>
</div>
