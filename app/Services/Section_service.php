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
}
