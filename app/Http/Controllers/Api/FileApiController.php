<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Models\File;
use Orion\Travelr\Resources\File\FileTransformer;

class FileApiController extends Controller
{
    public function show(int $id)
    {
        return new FileTransformer(File::findOrFail($id));
    }
}
