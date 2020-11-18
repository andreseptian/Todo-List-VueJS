<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiTodoListController extends Controller
{
    public function getList()
    {
        $result = DB::table("todolist")->orderBy("id", "desc")->get();
        return response()->json($result);
    }

    public function postCreate()
    {
        $content = request('content');
        DB::table('todolist')
            ->insert([
                'create_at' => date('Y-m-d H:i:s'),
                'content' => $content
            ]);
        return response()->json(['status' => true, 'message' => 'Data berhasil ditambahkan!']);
    }

    public function postUpdate($id)
    {
        $content = request('content');
        DB::table('todolist')
            ->where("id", $id)
            ->update([
                'update_at' => date('Y-m-d H:i:s'),
                'content' => $content
            ]);
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate!']);
    }

    public function postDelete($id)
    {
        $content = request('content');
        DB::table('todolist')
            ->where("id", $id)
            ->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
