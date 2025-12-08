<?php

namespace App\Http\Actions\PropertyManagement;

use App\Models\OptionType;

class OptionTypeUpdateAction
{
    public function execute(array $data, OptionType $optionType)
    {
        try {
            $optionType->update([
                'option_type' => $data['option_type'],
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
