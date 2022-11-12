<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\NullType;

class Category_service
{

    public function addCategory($name): bool
    {
        DB::table('categories')
            ->insert([
                'name' => $name,
                'code' => 'C' . mt_rand(1, 9999999),
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);

        return true;
    }


    public function get($code)
    {
        $category = DB::table('categories')
            ->select('name', 'code')
            ->where('code', $code)
            ->get();

        return $category->first();
    }



    public function getAll(): object
    {
        $category = DB::table('categories')
            ->select('name', 'code', 'id')
            ->get();

        return $category;
    }


    public function update($code, $name): bool
    {
        $category = $this->get($code);
        if ($category->name == $name) {
            return false;
        }

        DB::table('categories')
            ->where('code', $code)
            ->update([
                'name' => $name,
                'updated_at' => round(microtime(true) * 1000)
            ]);

        return true;
    }





    public function delete($code): bool
    {
        $category = DB::table('categories')
            ->select('name')
            ->where('code', $code)
            ->get();
        $category = collect($category);

        if ($category->isEmpty()) {
            return false;
        }

        DB::table('categories')
            ->where('code', $code)
            ->delete();

        return true;
    }
}
