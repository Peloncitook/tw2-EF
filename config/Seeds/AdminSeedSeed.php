<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * AdminSeed seed.
 */
class AdminSeedSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void {
    $data = [
        'role_id' => 1,
        'nombre' => 'Admin',
        'apellido' => 'Sistema',
        'correo' => 'admin@example.com',
        'password' => (new \Authentication\PasswordHasher\DefaultPasswordHasher())->hash('password'),
        'created' => date('Y-m-d H:i:s'),
        'modified' => date('Y-m-d H:i:s'),
    ];
    $this->table('users')->insert($data)->save();
}
}
