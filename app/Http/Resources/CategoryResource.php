<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
 

        
        
        $books_data = $this->books->map(function ($cat) {
            return [
                "id" => $cat->id,
                "type" => "book"
            ];
        });

    
        return [
            'id' => $this->id,
            'type' => 'category',
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
               
            ],
            'relationships' => [
                'books' => [
                    "data" => $books_data,
                    "links" => [
                        "self" => route("books.index")
                    ]
                ]
                
            ],
            "included" => $this->books
              
            
        ];
    }
}
