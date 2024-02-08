<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Exception;
use Illuminate\Http\Request;
use Validator;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notifications::paginate(50);

        return response()->json($notifications,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject'=>'required',
            'description'=>'nullable',
            'user'=>'required',
            'status'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation' => $validator->errors()]);       
        }

        $input = $request->all();
        
        try{

            $organization = Notifications::create($input);
            return response()->json($organization,200);

        }catch(Exception $exception){
            return response()->json(
                [ 
                    'error' => $exception->getMessage(),
                ],
                400
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the notification by ID
        $notification = Notifications::find($id);

        // Check if the notification exists
        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        // Return a JSON response with the retrieved notification
        return response()->json(['data' => $notification], 200);
    }


    public function show_by_user($user)
    {
        $notification = Notifications::where('user',$user)->get();

        if (!$notification) {
            return response()->json(['message' => 'Notifications not found'], 404);
        }

        return response()->json(['data' => $notification], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'subject' => 'string|max:255',
            'description' => 'nullable|string',
            // 'user'=>'required',
            'status' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => $validator->errors()]);
        }

        // Find the notification by ID
        $notification = Notifications::find($id);

        // Check if the notification exists
        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        // Update the notification with the validated data
        $notification->update($request->all());

        // Optionally, you can return a response with the updated notification
        return response()->json(['message' => 'Notification updated successfully', 'data' => $notification], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the notification by ID
        $notification = Notifications::find($id);

        // Check if the notification exists
        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        // Delete the notification
        $notification->delete();

        // Optionally, you can return a response with a success message
        return response()->json(['message' => 'Notification deleted successfully'], 200);
    }
}
