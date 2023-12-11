<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index () {
        $data = [
            [
                'nama' => 'ilman',
                'email' => 'ilmannurhakim0@gmail.com',
                'telp' => '08232323232',
                'alamat' => [
                    'street' => 'jl. dago',
                    'postcode' => '494949'
                ]
            ],
            [
                'nama' => 'Doni',
                'email' => 'doni@gmail.com',
                'telp' => '08982323',
                'alamat' => [
                    'street' => 'jl. kopo',
                    'postcode' => '212121'
                ]
            ],
            [
                'nama' => 'Ahmad',
                'email' => 'ahmad@gmail.com',
                'telp' => '0862323',
                'alamat' => [
                    'street' => 'jl. buah batu',
                    'postcode' => '454545'
                ]
            ]
        ];

        $data2 = [
            [
                'nama' => 'Ali',
                'email' => 'ali@gmail.com',
                'telp' => '0862323',
                'alamat' => [
                    'street' => 'jl. lembang',
                    'postcode' => '454545'
                ]
            ]
        ];

        // debug string
        // echo('sdsdsd');

        //debug string / array
        // var_dump($data);
        dd($data);

        $data = array_merge($data, $data2);

        $id = '111';
        return view('users/user', compact('data', 'id'));

    }

    public function post() {

    }









    public function getDataUser(Request $request) {


    }

    public function createDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['email'] = $request->post('email');
        $arr['no_telp'] = $request->post('no_telp');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Username Valid!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Username Tidak Valid!';
            $code = 401;
        }

        //Contoh response json
        return response()->json($res, $code);
    }

    private static function cekUser($username) {
        if ($username == 'ilman') {
            return true;
        } else {
            return false;
        }
    }

    public function updateDataUser(Request $request) {
        $post = $request->post();
        $arr = [];
        $arr['username'] = $request->post('username');
        $arr['email'] = $request->post('email');
        $arr['no_telp'] = $request->post('no_telp');

        //Buat response seperti ketika insert, silahkan improve sendiri

        return response()->json($arr, 200);
    }

    public function deleteDataUser(Request $request) {
        $arr = [];
        $arr['username'] = $request->get('username');

        $isValid = self::cekUser($arr['username']);
        if ($isValid){
            $res['status'] = true;
            $res['message'] = 'Data berhasil dihapus!';
            $code = 200;
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak ditemukan / username tidak valid!';
            $code = 401;
        }

        return response()->json($res, $code);
    }
}
