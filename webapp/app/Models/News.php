<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
    ];
    //TEST確認用のサンプルメソッド
    public function ___aaa() {
        return true;
    }
}
