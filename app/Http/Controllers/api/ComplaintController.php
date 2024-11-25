<?php

namespace App\Http\Controllers\api;

use App\Models\Complaint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ComplaintResource;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    /**
     * index
     *
     * @return ComplaintResource
     */
    public function index(): ComplaintResource
    {
        //get all complaint
        $complaint = Complaint::all();

        //return collection of complaint as a resource
        return new ComplaintResource(true, 'List Data Complaint', $complaint);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/image', $image->hashName());

        //create Complaint
        $complaint = Complaint::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        //return response
        return new ComplaintResource(true, 'Data Complaint Berhasil Ditambahkan!', $complaint);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find Complaint by ID
        $complaint = Complaint::find($id);

        //return single complaint as a resource
        return new ComplaintResource(true, 'Detail Data complaint!', $complaint);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find Complaint by ID
        $complaint = Complaint::find($id);

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/image', $image->hashName());

            //delete old image
            Storage::delete('public/image/' . basename($complaint->image));

            //update complaint with new image
            $complaint->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'description' => $request->description,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        } else {
            //update complaint without image
            $complaint->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'description' => $request->description,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        }

        //return response
        return new ComplaintResource(true, 'Data Complaint Berhasil Diubah!', $complaint);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {

        //find complaint by ID
        $complaint = Complaint::find($id);

        //delete image
        Storage::delete('public/image/'.basename($complaint->image));

        //delete complaint
        $complaint->delete();

        //return response
        return new ComplaintResource(true, 'Data Complaint Berhasil Dihapus!', null);
    }
}
