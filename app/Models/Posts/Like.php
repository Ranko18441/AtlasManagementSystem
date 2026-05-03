<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    const UPDATED_AT = null;

    // ↓は操作できるカラムの設定
    protected $fillable = [
        'like_user_id',
        'like_post_id'
    ];

     // ↓$post_idを受け取って処理する　いいねした投稿のIDから取得してカウントしている。
    public function likeCounts($post_id){
        return $this->where('like_post_id', $post_id)->get()->count();
    }
}
