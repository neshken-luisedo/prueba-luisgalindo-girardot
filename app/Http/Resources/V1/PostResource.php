<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'consecutive' => $this->consecutive, 
            'monitor_id' => $this->monitor_id,
            'activity_name' => $this->activity_name,
            'activity_date' => $this->activity_date,
            'start_time' => $this->start_time,
            'final_hour' => $this->final_hour,
            'expertise_id' => $this->expertise_id,
            'nac_id' => $this->nac_id,
            'cultural_right_id' => $this->cultural_right_id,
        ];
    }
}
