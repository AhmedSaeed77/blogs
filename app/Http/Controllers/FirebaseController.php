<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function __invoke()
    {

    }

    public function index()
    {
        $firebase = (new Factory)->withServiceAccount(__DIR__.'/laraveltest-e097d-firebase-adminsdk-df63a-a11829ec67.json')
                    ->withDatabaseUri('https://laraveltest-e097d-default-rtdb.firebaseio.com/');

        $database = $firebase->createDatabase();
        $data = $database->getReference('data');

        return $data->getValue();
    }
}
