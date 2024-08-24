<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function changeStatus(Request $request, Photo $photo)
    {
        if($request->status === 'delete') {
            $photo->delete();

            return redirect()
                ->back()
                ->with('success', 'Photo deleted successfully');
        } else {
            $photo->update(['status' => $request->status]);
        }

        return redirect()
                ->back()
                ->with('success', 'Status updated successfully');
    }
}
