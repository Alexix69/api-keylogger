<?php

namespace App\Http\Resources;
use App\Models\Record;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RecordCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $all_records = Record::all()->count();
        return [
            'all_records' => $all_records,
            'data' => parent::toArray($request),
        ];
        //return parent::toArray($request);
    }
}
