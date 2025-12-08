<?php

namespace App\Http\Actions\PropertyManagement;

use App\Models\OptionType;

class OptionTypeStoreAction
{
    public function execute(array $data)
    {
        try {
            OptionType::create([
                'option_type' => $data['option_type'],
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
