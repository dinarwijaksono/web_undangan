<?php

namespace App\Services;

use App\Models\Section_category;
use Illuminate\Support\Facades\Log;

class Section_service
{
    // create
    public function createCategory(string $name): void
    {
        try {

            Section_category::insert([
                'name' => $name,
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000)
            ]);

            Log::info("create sectiontype success", [
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'class' => "Section_service",
            ]);
        } catch (\Throwable $th) {
            Log::error("create sectiontype failed", [
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'class' => "Section_service",
                'message_error' => $th->getMessage()
            ]);
        }
    }

    // Read
    public function getTheListCategory(): object
    {
        try {
            $sectionCategory = Section_category::select('id', 'name', 'created_at', 'updated_at')
                ->orderBy('name')
                ->get();

            Log::info('get the list category', [
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'class' => "Section_service",
            ]);

            return $sectionCategory;
        } catch (\Throwable $th) {
            Log::error("get the list category", [
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'class' => "Section_service",
                'message_error' => $th->getMessage()
            ]);

            return collect([]);
        }
    }
}
