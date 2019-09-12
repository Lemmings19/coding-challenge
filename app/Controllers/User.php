<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

    public function admin()
    {
        $userModel = new UserModel();
        $user = $userModel->where('name', 'admin')->first();

        return view('admin', ['user' => $user, 'flashMessage' => session()->getFlashdata('message')]);
    }

    public function logout()
    {
        $userModel = new UserModel();
        $user = $userModel->where('name', 'user')->first();

        // Destroy the user's session
        session_id($user['session_id']);
        session_start();
        session_destroy();

        // Update their database entry as well...
        $db      = \Config\Database::connect();
        $builder = $db->table('users')->where('name', 'user');
        $builder->update(['session_id' => null]);

        // Send the order to kick the user via socket.io
        // DISABLED, kept in just for the sake of review.
        // $this->sendSocketIoMessage('kicked', 'kicking user...');

        session()->setFlashdata('message', 'User logged out.');

        return redirect()->back();
    }

    public function user()
    {
        $session = session();

        // Update user's database row to have the latest session id for easy retrieval.
        $db      = \Config\Database::connect();
        $builder = $db->table('users')->where('name', 'user');
        $builder->update(['session_id' => 123]);

        $userModel = new UserModel();
        $user = $userModel->where('name', 'user')->first();

        return view('user', ['user' => $user]);
    }

    //--------------------------------------------------------------------

    /**
     * Send data to the local socket.io instance.
     *
     * Original source: https://stackoverflow.com/a/53689887/1196517
     *
     * @param string $message The message name to be sent to socket.io
     * @param string $data    The data to be sent along with the message.
     *
     * @return int $sentByteCount The number of bytes sent.
     */
    private function sendSocketIoMessage($message, $data) {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $result = socket_connect($socket, '127.0.0.1', 3000);
        if(!$result) {
            die('cannot connect ' . socket_strerror(socket_last_error()) . PHP_EOL);
        }
        $message = json_encode(Array("msg" => $message, "data" => $data));
        $sentByteCount = socket_write($socket, $message, strlen($message));
        socket_close($socket);

        return $sentByteCount;
    }
}
