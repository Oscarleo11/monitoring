<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Jobs\RappelEmailJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
// use App\Mail\ReminderMail; 
use App\Mail\ContractReminderMail;
class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($contractId)
    {
        $contract = Contract::findOrFail($contractId);
        return view('reminders.create', compact('contract'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $contractId)
    {
        $request->validate([
            'email' => 'required|email',
            'reminder_date' => 'required|date|after:now',
        ]);

        $contract = Contract::findOrFail($contractId);

        // Enregistrement du rappel
        $reminder = Reminder::create([
            'contract_id' => $contractId,
            'email' => $request->email,
            'reminder_date' => $request->reminder_date,
        ]);

        // ✅ Envoi immédiat de l'email avec ReminderMail
        Mail::to($request->email)->send(new ContractReminderMail(
            $contract->title,
            $contract->description,
            $contract->start_date,
            $contract->end_date
        ));


        // ⏱️ Planification du rappel différé (email automatique à la date)
        RappelEmailJob::dispatch($contract, $request->email)
            ->delay(Carbon::parse($request->reminder_date));

        return redirect()->route('contracts.index')->with('success', 'Rappel programmé et email envoyé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
