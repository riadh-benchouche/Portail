<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Actualite extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'actualite';

    public function updateMedia(array $newMediaArray, string $collectionName = 'default') : array
    {
        $this->removeMediaItemsNotPresentInArray($newMediaArray, $collectionName);

        $orderColumn = 1;

        $updatedMedia = [];
        foreach ($newMediaArray as $newMediaItem) {
            $mediaClass = config('laravel-medialibrary.media_model');
            $currentMedia = $mediaClass::findOrFail($newMediaItem['id']);

            if ($currentMedia->collection_name != $collectionName) {
                throw MediaCannotBeUpdated::doesNotBelongToCollection($collectionName, $currentMedia);
            }

            if (array_key_exists('name', $newMediaItem)) {
                $currentMedia->name = $newMediaItem['name'];
            }

            if (array_key_exists('custom_properties', $newMediaItem)) {
                $currentMedia->custom_properties = $newMediaItem['custom_properties'];
            }

            $currentMedia->order_column = $orderColumn++;

            $currentMedia->save();

            $updatedMedia[] = $currentMedia;
        }

        return $updatedMedia;
    }

}
