<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Str;

class Subscriber extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    /* protected static function booted()
    {
        static::creating(function ($model) {
            $model->uid = self::uid();
        });
    } */

    public static function uid()
    {
        $rd = Str::random(9);
        $item = self::where('uid', $rd)->first();
        if ($item) {
            return self::uid();
        }
        return $rd;
    }


    public function list()
    {
        return $this->belongTo(Lists::class, 'list_id');
    }

    public function contact()
    {
        return $this->belongTo(Contact::class);
    }
}
