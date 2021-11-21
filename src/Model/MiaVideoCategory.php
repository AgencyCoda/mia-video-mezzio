<?php

namespace App\Model;

use Mia\Category\Model\MiaCategory;
use Mia\Video\Model\MiaVideo;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $seminar_id Description for variable
 * @property mixed $practitioner_id Description for variable
 * @property mixed $data Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="seminar_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="practitioner_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="data",
 *  type="string",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class MiaVideoCategory extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'mia_video_category';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function video()
    {
        return $this->belongsTo(MiaVideo::class, 'video_id');
    }
    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category()
    {
        return $this->belongsTo(MiaCategory::class, 'category_id');
    }


    
}