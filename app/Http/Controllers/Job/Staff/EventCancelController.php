<?php

namespace App\Http\Controllers\Job\Staff;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventCancelController extends Controller
{
    public function update($id)
    {
        $event = Event::find($id);
        $data['finished'] = 'true';
        $data['comment'] = 'გაუქმდა კლიენტის მიერ';

        $event->update($data);

        return redirect()->route('Reservations');
    }
}
