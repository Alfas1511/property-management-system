<?php

namespace App;

use App\Models\ActivityLog;

trait ActivityLogTrait
{
    public function createActivityLog(
        string $title,
        ?string $description  = null,
        ?int $created_by = null,
    ) {

        ActivityLog::create([
            'title' => $title,
            'description' => $description,
            'created_by' => $created_by,
        ]);
    }
}
