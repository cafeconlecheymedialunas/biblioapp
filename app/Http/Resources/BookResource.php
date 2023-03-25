<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Editorial;
use App\Models\Author;
use  App\Http\Resources\EditorialResource;
use  App\Http\Resources\AuthorResource;

class BookResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $relationships = $categories  = CategoryResource::collection($this->categories);
        
        $relationships[] =   EditorialResource::make(Editorial::find($this->editorial_id));
        $relationships[] = AuthorResource::make(Author::find($this->author_id));

        $cats = $this->categories->map(function ($cat) {
            return [
                "id" => $cat->id,
                "type" => "category"
            ];
        });
        return [
            'id' => $this->id,
            'type' => 'book',
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
               
            ],
            'relationships' => [
                'categories' => [
                    "data" => $cats,
                    "links" => [
                        "self" => route("categories.index")
                    ]
                ],
                "author" => [
                    "id" => $this->author_id,
                    "type" => "author",
                    "links" => [
                        "self" => route("authors.show",$this->author_id)
                    ]
                ],
                "editorial" => [
                    "id" => $this->editorial_id,
                    "type" => "editorial",
                    "links" => [
                        "self" => route("editorials.show",$this->editorial_id)
                    ]
                ]
                
            ],
            "included" => $relationships
              
            
        ];
    }
}
