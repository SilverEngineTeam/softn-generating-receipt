<?php

namespace App\Controllers;

use App\Facades\Response;
use App\Models\Clients;
use Silver\Core\Controller;
use Silver\Http\Redirect;
use Silver\Http\Request;
use Silver\Http\View;

/**
 * clients controller
 */
class ClientsController extends Controller {
    
    public function index() {
        return View::make('clients.index')
                   ->with('clients', Clients::query()
                                            ->orderBy('id', 'desc')
                                            ->all());
    }
    
    public function form($id = FALSE) {
        $client      = new Clients();
        $isUpdate    = FALSE;
        $actionValue = 'Nuevo';

        if ($id) {
            $client      = Clients::find($id);
            $isUpdate    = TRUE;
            $actionValue = 'Actualizar';
        }

        return $this->viewForm($isUpdate, $actionValue, $client);
    }
    
    private function viewForm($isUpdate, $actionValue, $client) {
        return View::make('clients.form')
                   ->with('isUpdate', $isUpdate)
                   ->with('actionValue', $actionValue)
                   ->with('client', $client);
    }
    
    public function postForm(Request $request) {
        $client                                 = new Clients();
        $id                                     = $request->input('id');
        $client->client_name                    = $request->input('client_name');
        $client->client_address                 = $request->input('client_address');
        $client->client_identification_document = $request->input('client_identification_document');
        $client->client_city                    = $request->input('client_city');
        
        if (empty($id)) {
            $client->client_number_receipts = 0;
            $client                         = Clients::create($client->data());
        } else {
            $client->id = $id;
            $client->save();
        }
        
        return $this->viewForm(TRUE, 'Actualizar', $client);
    }
    
    public function postDelete(Request $request) {
        $client     = new Clients();
        $client->id = $request->input('id');
        $client->delete();
        Redirect::to('/clients');
    }
    
}