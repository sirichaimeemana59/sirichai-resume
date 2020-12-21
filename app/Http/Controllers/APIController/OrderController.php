<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use Kreait\Firebase\ServiceAccount;
//use kreait\firebase\src\Firebase\ServiceAccount;

class OrderController extends Controller
{

    public function index()
    {
        //$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Laraveltesting-6aeda3a963f2.json');

        $firebase = (new Factory)

            ->withServiceAccount($serviceAccount)

            ->withDatabaseUri('https://laraveltesting-bd2b9.firebaseio.com/')

            ->create();

        $database = $firebase->getDatabase();

        $newPost = $database

            ->getReference('blog/posts')

            ->push([

                'title' => 'Post title',

                'body' => 'This should probably be longer.'

            ]);

//$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-

//$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-

//$newPost->getChild('title')->set('Changed post title');

//$newPost->getValue(); // Fetches the data from the realtime database

//$newPost->remove();

        echo"<pre>";

        print_r($newPost->getvalue());

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
