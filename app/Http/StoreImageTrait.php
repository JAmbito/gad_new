<?php

namespace App\Http;

use Illuminate\Http\Request;

trait StoreImageTrait
{
    public function verifyAndStoreImage(Request $request, $filename = 'image', $directory = 'unknown')
    {
        if ($request->hasFile($filename)) {
            if (!$request->file($filename)->isValid()) {
                return redirect()->back()->withInput();
            }
            return $request->file($filename)->store('img/' . $directory, 'public');
        }
        return null;
    }
}
