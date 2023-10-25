<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $allTasks = [];
        foreach($this->collection as $c) {
            $allTasks = $allTasks + $c->department->tasks->pluck('title')->toArray();
        }
        return $allTasks;
    }
}