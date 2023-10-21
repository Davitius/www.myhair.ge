<?php

namespace App\Http\Controllers\Job\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventStatusUpdateController extends Controller
{
    public function update(Request $request, $id)
    {
        $Event = Event::find($id);

        if ($request->input('status') == 'reject' || $request->input('status') == 'done') {
            $data['comment'] = $request->input('comment');
            $data['status'] = $request->input('status');
            $data['finished'] = 'true';
        } else {
            $data['comment'] = $request->input('comment');
            $data['status'] = $request->input('status');
        }

        $Event->update($data);

        return redirect()->route('Events');
    }
}
