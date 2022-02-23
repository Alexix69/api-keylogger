<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $keystrokes = $this->records->where('type', 'keystroke')->count();
        $screenshots = $this->records->where('type', 'screenshot')->count();
        $websites = $this->records->where('type', 'website')->count();
        $records = $this->records->count();
        return [
            'id' => $this->id,
            'nickname' => $this->nickname,
            'desktop_name' => $this->desktop_name,
            'created_at' =>$this->created_at->format('Y-m-d'),
            'total_records' => $records,
            'keystrokes' => $keystrokes,
            'screenshots' => $screenshots,
            'websites' => $websites
        ];
    }
}


