<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WebHooks\Event;

class WebhookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::get();
    }

    /**
     * Verify with Stripe that the event is genuine.
     *
     * @param string $id
     *
     * @return bool
     */
    protected function eventExistsOnConekta($id)
    {
        try {
            Conekta::setApiKey( env('CONEKTA_PRIVATE_KEY') );

            return !is_null(Conekta_Event::where(['id' => $id]));
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = $request->getContent();

        // if (!$this->eventExistsOnConekta($payload->id)) {
        //     return ;
        // }
        //
        // $conekta_object = $payload->data->object;

        Event::create([
            "content"   => $payload,
        ]);
    }

}
