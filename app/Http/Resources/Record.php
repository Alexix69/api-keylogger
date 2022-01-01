<?php

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Client as ClientResource;

class Record extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $client = Client::find($this->client_id);
        return [
            'id' => $this->id,
            'app_name' => $this->app_name,
            'window_name' => $this->window_name,
            'event_type' => $this->event_type,
            'archived' => $this->archived,
            'favorite' => $this->favorite,
            'date' => $this->date,
            'time' => $this->time,
            'type' => $this->type,
            'content' => $this->content,
            'client' => new ClientResource($client),
            //'client' => '/api/clients/' . $this->client_id,
            'favorite_category_id' => $this->favorite_category_id
        ];
    }
}
