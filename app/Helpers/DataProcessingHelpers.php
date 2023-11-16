<?php

use Illuminate\Http\Request;

// STRING HELPERS

function populateModelData(Request $request, $model): array
{
    $model = app($model); // this model was sent from the repository
    $data = [];    // an empty array
    if ($model->translatedAttributes) {   // if the model has translatedAttributes

        foreach (config('translatable.locales') as $locale) {    // do foreach on locales=[ 'en' , 'ar' ] array in translatable file in the config
            foreach ($model->translatedAttributes as $attribute) {     // do foreach on the translatedAttributes=['', ''] array in the model we sent
                if ($request->get($attribute.':'.$locale) != null) {   // if the request get('tittle':'en') is not  null
                    $data[$locale][$attribute] = $request->input($attribute.':'.$locale);
                }   // then input it in the data[] array
            }
        }
    }

    foreach ($model->getFillable() as $item) {     // do foreach on the fillable[] array

        if ($request->get($item) != null) {      // if the item in the request which an element of fillable[] array exist in the request then
            $data[$item] = $request->input($item);   // input the element in data[] array
        }
    }

    return $data;  // return tha data[] array
}
