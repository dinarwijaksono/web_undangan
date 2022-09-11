<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Chat_controllerApi extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'from' => 'required',
            'confirm' => 'required',
            'saying' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Data tidak lengkap',
                'data' => $validator->errors()
            ]);
        }

        $data['order_id'] = $request->order_id;
        $data['from'] = $request->from;
        $data['confirm'] = $request->confirm;
        $data['saying'] = $request->saying;
        $data['created_at'] = round(microtime(true) * 1000);
        $data['updated_at'] = round(microtime(true) * 1000);
        DB::table('chats')->insert($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil input chat'
        ], 200);
    }



    public function getAllWhereOrder(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'order_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'data tidak lengkap.',
                'data' => $validator->errors()
            ], 200);
        }

        $chat = Chat::where('order_id', $request->order_id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $chat
        ], 200);
    }
}
