<?php

namespace App\Http\Controllers;

use App\Models\OpeningHour;
use Illuminate\Http\Request;

class OpeningHourController extends Controller
{
        // Affiche les horaires
        public function index()
        {
            $hours = OpeningHour::all();
            return view('horaires', compact('hours'));
        }

        // Modifie un horaire
        public function update(Request $request, $id)
{
    // Validate and format the time fields
    $request->validate([
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
        'status' => 'required|in:open,closed',
    ]);

    $hour = OpeningHour::findOrFail($id);

    // Parse and store the time fields as H:i format
    $hour->start_time = \Carbon\Carbon::createFromFormat('H:i', $request->start_time)->format('H:i');
    $hour->end_time = \Carbon\Carbon::createFromFormat('H:i', $request->end_time)->format('H:i');
    $hour->status = $request->status;
    $hour->save();

    session()->flash('success', 'Les horaires ont été mis à jour avec succès!');
    return redirect()->back();
}
}