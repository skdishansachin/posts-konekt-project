<?php

namespace App\Http\Resources\Api\V1\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /** @return array<int|string, mixed> */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
