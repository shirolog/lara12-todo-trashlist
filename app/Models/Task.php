<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [

        'task_name',
        'due_date',
        'is_deleted',
    ];

    //taskステータスの更新について
    public static function getActiveTasks() {

        return self::where('is_deleted', false)->get();
    }

    public function maskAsDeleted() {

        $this->is_deleted = true;
        $this->save();
        return $this;
    }

    //上記の処理で✓がついているので逆の処理をする

    public static function getTrashTasks() {

        return self::where('is_deleted', true)->get();
    }

    public  function recoverTask() {

        $this->is_deleted = false;
        $this->save();
        return $this;
    }

    //✓の付いたものをすべて削除
    public static function selctTrashAll() {

        return self::where('is_deleted', true)->delete();
    }


}
