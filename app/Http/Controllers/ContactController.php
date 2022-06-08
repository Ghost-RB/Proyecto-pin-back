<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactPostRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  LUEGO VER SI SE PUEDE LLEGAR A HACER ALGUNA VALIDACION O MANERA DE QUE SOLO TRAIGA LOS MENSAJES DEL MAIL CORRESPONDIENTE */
        $contact = Contact::all();
        return response()->json($contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactPostRequest $request)
    {
        $contact = Contact::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'message' => $request['message']
        ]);
        $details = [
            'title' => 'SE HA RECIBIDO UNA NUEVA PETICION DE CONTACTO DE : ' . $request['email'],
            'name' => 'Nombre: ' . $request['name'],
            'body' => 'LA PETICION ES: ' . $request['message']
        ];
        Mail::to('dcav.ber@gmail.com')->send(new \App\Mail\ContactEmail($details));
        return response()->json($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* PENSAR UN POCO MAS ESTO PARA QUE MUESTRE SOLO UN MENSAJE PUNTUAL DEL MAIL SOLICITADO PARA BUSCAR, NO CUALQUIERA */
        $contact = Contact:: findOrFail($id);
        return response()->json($contact);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
