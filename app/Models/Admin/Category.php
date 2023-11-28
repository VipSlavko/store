<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',

    ];

    /**
     * Створення категорії
     */
    public function createCategory($data)
    {
        DB::table($this->table)
            ->insert($data);

    }

    /**
     * Отримання даних всіх категорій
     */
    public function readCategories()
    {
        return self::all();
    }

    /**
     * Отримання даних видалених категорій
     */
    public function readDeletedCategories()
    {
        return self::onlyTrashed()->get();
    }

    /**
     * Витягування 1 категорії
     */
    public function showCategory($id_category)
    {
        return DB::table($this->table)
            ->find($id_category);

    }

    /**
     * Оновлення даних категорії
     */
    public function updateCategory($id_category, $data)
    {
        return DB::table($this->table)
            ->where($this->primaryKey, $id_category)
            ->update($data);

    }

    /**
     * видалення катергорії
     */
    public function deleteCategory($id_category)
    {
        $category = self::find($id_category);
        $category->delete();

    }

    /**
     * відновлення категорії
    */
    public function restoreCategory($id_category)
    {
        $category = self::onlyTrashed()->find($id_category);
        $category->restore();
    }

    /**
     * видалення категорії з бази - назавжди
     */
    public function destroyCategory($id_category)
    {
        $category = self::onlyTrashed()->find($id_category);
        $category->forceDelete();

    }
}
