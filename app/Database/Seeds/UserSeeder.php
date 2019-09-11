<?php namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->table('users')->insert(['name' => 'admin']);
        $this->db->table('users')->insert(['name' => 'user']);
    }
}
