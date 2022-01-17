<?php

namespace App\Http\Resources;

use App\Http\Controllers\RecordController;
use App\Models\Record;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        $keystrokes = Record::where('type', 'keystroke')->count();
//        $screenshots = Record::where('type', 'screenshot')->count();
//        $websites = Record::where('type', 'website')->count();
//
//        return [
//            'data' => parent::toArray($request),
//            'total_keystrokes' => $keystrokes,
//            'total_screenshots' => $screenshots,
//            'total_websites' => $websites
//        ];
        return parent::toArray($request);
    }
}
