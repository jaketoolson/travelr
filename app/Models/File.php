<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

/**
 * @property int id
 * @property string uuid
 * @property string file_name
 * @property string file_path
 * @property int fileable_id
 * @property string fileable_type
 * @property string thumbnail
 */
class File extends BaseEloquentModel
{
    use HasUuid;

    protected $table = 'files';

    protected $appends = [
        'thumbnail'
    ];

    protected $fillable = [
        'uuid',
        'file_name',
        'file_path',
        'fileable_id',
        'fileable_type',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function getThumbnailAttribute(): string
    {
        return url('images/planets/thumbs') . DIRECTORY_SEPARATOR . substr($this->file_name, 0, -4) . '-300x300.jpg';
    }
}
