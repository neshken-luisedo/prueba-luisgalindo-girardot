<?php

namespace App\Http\Livewire\Componentes;

use App\Models\Api;
use App\Models\CulturalRights;
use App\Models\Expertises;
use App\Models\Nacs;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    private $perPage = 5;
    public $search = '';

    public $selectedID;
    public $consecutive;
    public $monitor;
    public $activity_name;
    public $activity_date;
    public $start_time;
    public $final_hour;
    public $expertise;
    public $nac;
    public $cultural_right;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function rules()
    {
        return [
            'monitor' => 'required',
            'activity_name' => 'required|string|min:3',
            'activity_date' => 'required',
            'start_time' => 'required',
            'final_hour' => 'required',
            'expertise' => 'required',
            'nac' => 'required',
            'cultural_right' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function guardar()
    {
        $validatedData = $this->validate();        

        try {
            $store = Api::create([
                'monitor_id' => $validatedData['monitor'],
                'activity_name' => $validatedData['activity_name'],
                'activity_date' => $validatedData['activity_date'],
                'start_time' => $validatedData['start_time'],
                'final_hour' => $validatedData['final_hour'],
                'expertise_id' => $validatedData['expertise'],
                'nac_id' => $validatedData['nac'],
                'cultural_right_id' => $validatedData['cultural_right'],
            ]);

            Api::where('id', $store->id)->update(['consecutive' => 'F'.$store->id]);

            if ($store) {
                $this->showToastr(
                    'La información ha sido registrada con éxito.',
                    'success'
                );
                $this->clearModal();
                $this->dispatchedBrowserEvent('cerrarModal');
            }
        } catch (\Exception $e) {
            $this->showToastr(
                'Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getCode(),
                'warning'
            );
        }
    }

    public function editar(int $selectedID)
    {
        $registros = Api::findOrFail($selectedID);

        $this->selectedID = $registros->id;
        $this->consecutive = $registros->consecutive;
        $this->monitor = $registros->monitor_id;
        $this->activity_name = $registros->activity_name;
        $this->activity_date = $registros->activity_date;
        $this->start_time = $registros->start_time;
        $this->final_hour = $registros->final_hour;
        $this->expertise = $registros->expertise_id;
        $this->nac = $registros->nac_id;
        $this->cultural_right = $registros->cultural_right_id;
    }

    public function actualizar()
    {
        $validatedData = $this->validate();

        try {
            $update = Api::where('id', $this->selectedID)->update([
                'monitor_id' => $validatedData['monitor'],
                'activity_name' => $validatedData['activity_name'],
                'activity_date' => $validatedData['activity_date'],
                'start_time' => $validatedData['start_time'],
                'final_hour' => $validatedData['final_hour'],
                'expertise_id' => $validatedData['expertise'],
                'nac_id' => $validatedData['nac'],
                'cultural_right_id' => $validatedData['cultural_right'],
            ]);

            if ($update) {
                $this->showToastr(
                    'La información ha sido actualizada con éxito.',
                    'success'
                );
                $this->clearModal();
                $this->dispatchBrowserEvent('cerrarModal');
            }
        } catch (\Exception $e) {
            $this->showToastr(
                'Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getCode(),
                'warning'
            );
        }
    }

    public function clearModal()
    {
        $this->reset();
    }

    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr',[
            'type'    => $type,
            'message' => $message,
        ]);
    }
    
    public function render()
    {
        $monitors = User::orderBy('name', 'asc')->pluck('name','id');
        $culturalRights = CulturalRights::orderBy('name', 'asc')->pluck('name','id');
        $nacs = Nacs::orderBy('name', 'asc')->pluck('name','id');
        $expertises = Expertises::orderBy('name', 'asc')->pluck('name','id');

        $posts = Api::where('consecutive', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('activitye_name', 'LIKE', '%'.$this->search.'%')
                    ->orderBy('id', 'desc')
                    ->paginate($this->perPage);
        
        return view('livewire.componentes.post', compact('monitors', 'culturalRights', 'nacs', 'expertises', 'posts'));
    }
}
