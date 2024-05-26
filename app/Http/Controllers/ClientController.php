<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Traits\UploadFile;

class ClientController extends Controller
{
    use UploadFile;
    //private $columns = ['clientName','phone', 'email','website'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::get();
        return view('clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $client = new Client();
        // $client->clientName = $request->clientName;
        // $client->phone = $request->phone;
        // $client->email = $request->email;
        // $client->website = $request->website;
        // $client->save();
        //return "Inserted Successfully";

        $messages = $this->errMsg();

        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' => 'required',
            'city' => 'required|max:30',
            'image' => 'sometimes|nullable|image|max:2048',
        ], $messages);

        // $imgExt = $request->image->getClientOriginalExtension();
        // $fileName = time() . '.' . $imgExt;
        // $path = 'assets/images';
        // $request->image->move($path, $fileName);
        $fileName = $this->upload($request->image, 'assets/images');

        $data['image'] = $fileName;
        $data['active'] = isset($request->active);

        Client::create($data);
        return redirect('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return view('showClient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $messages = $this->errMsg();

        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' => 'required',
            'city' => 'required|max:30',
            'image' => 'sometimes|nullable|image|max:2048',
        ], $messages);

        $client = Client::findOrFail($id);

            // If a new image is uploaded, handle the file upload
        //dd("Existing image:", $client->image);
        if ($request->hasFile('image')) {
            // $imgExt = $request->image->getClientOriginalExtension();
            // $fileName = time() . '.' . $imgExt;
            // $path = 'assets/images';
            // //dd("File uploaded successfully", $fileName, $path);
            // $request->image->move($path, $fileName);
            $fileName = $this->upload($request->image, 'assets/images');
            $data['image'] = $fileName;
        } else {
            // Keep the existing image if no new image is uploaded
            $data['image'] = $client->image;
        }

        // If the active checkbox is not checked, it won't be present in the request
        // So we explicitly check if it's set
        $data['active'] = $request->has('active') ? 1 : 0;
        //dd("New image:", $fileName);
        Client::where('id', $id)->update($data);
        return redirect('clients');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->delete();
        return redirect('clients');
    }

    /**
     * Trash.
     */
    public function trash()
    {
        $trashed = Client::onlyTrashed()->get();
        return view('trashClient', compact('trashed'));
    }

    /**
     * Restore.
     */
    public function restore(string $id)
    {
        Client::where('id', $id)->restore();
        return redirect('clients');
    }

    /**
     * Force Delete.
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->forceDelete();
        return redirect('trashClient');
    }

    /**
     * error custom messages
     */
    public function errMsg(){
        return [
            'clientName' => 'The Client Name is Missed !!, Please Insert It',
            'clientName.min' => 'Length is less than 5, Please Insert more Characters',
            'phone' => 'The Phone Number is Missed !!, Please Insert It',
            'phone.min' => 'Length in less than 11, Please Insert more Numbers',
            'email' => 'The Email Address is Missed !!, Please Insert It',
            'website' => 'The Website Name is Missed !!, Please Insert It',
            'city' => 'The City is Missed !!, Please Choose One of the Available Options',
        ];
    }
}