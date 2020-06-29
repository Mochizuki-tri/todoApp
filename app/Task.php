<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    /*　状態定義*/

    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'label-danger'],
        2 => ['label' => '着手中', 'class' => 'label-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];

    /*状態を返すクラス4
    @return　string
    */
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];
        


        // 定義されていない場合空文字を返すように。
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
        ->format('Y/m/d');
    }

    // to show the label status(get and attribute are required)
    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];  
        if (!isset(self::STATUS[$status])) 
            return '';
        return self::STATUS[$status]['label'];
     }

}
