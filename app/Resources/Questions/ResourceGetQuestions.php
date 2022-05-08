<?php

namespace App\Resources\Questions;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourceGetQuestions extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'title' => $request['title'],
            'category' => $request['category'],
            'rating' => $request['rating'],
            'answer' => $request['answers']->map(function ($answer) {
                return [

                ];
            })
        ];
    }
}