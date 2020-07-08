<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends API_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function userlist_get()
    {
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            // Check if the users data store contains users
            if ( $users )
            {
                // Set the response and exit
                $this->response( $users, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $users ) )
            {
                $this->response( $users[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }


    public function test_post()
    {   
        $ambil_value_dari_luar = modules::run('percobaan/testrun/ambilNilai', $var1 = 'JERRY', $var2 = 'TOM');

        if ($ambil_value_dari_luar) {
            $this->response( [
                'status' => true,
                'message' => $ambil_value_dari_luar
            ], 200 );
        } else {
            $this->response( [
                'status' => false,
                'message' => 'Run modules ERRoR!'
            ], 200 );
        }
    }

    public function users_put()
    {
        $this->response( [
            'status' => true,
            'message' => 'ini users method PUT'
        ], 405 );
    }


}