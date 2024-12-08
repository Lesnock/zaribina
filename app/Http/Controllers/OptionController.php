<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->post('name');

        if (Option::where('name', $name)->exists()) {
            return response()->json(['error' => "Opcional {$name} já está cadastrado"], 422);
        }

        $option = Option::create([
            'name' => $request->post('name'),
        ]);

        foreach ($request->post('values') as $value) {
            OptionValue::create([
                'option_id' => $option->id,
                'name' => $value['name']
            ]);
        }

        return response()->json($option);
    }

    public function update(int $id, Request $request)
    {
        $option = Option::with('values')->findOrFail($id);
        $option->update(['name' => $request->post('name')]);

        $incomingValuesIds = collect($request->post('values'))->pluck('id')->toArray();
        $existingValuesIds = $option->values->pluck('id');

        foreach ($existingValuesIds as $optionValueId) {
            if (!in_array($optionValueId, $incomingValuesIds)) {
                OptionValue::destroy($optionValueId);
            }
        }

        foreach ($request->post('values') as $value) {
            if ($value['id']) {
                $option->values->find($value['id'])->update(['name' => $value['name']]);
            } else {
                $option->values()->save(new OptionValue([
                    'name' => $value['name']
                ]));
            }
        }

        return response()->json();
    }
}
