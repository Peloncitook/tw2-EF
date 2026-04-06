<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * RolesSeed seed.
 */
class RolesSeedSeed extends BaseSeed
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
    public function run(): void
    {
	$data = [
        ['id' => 1, 'nombre' => 'admin', 'descripcion' => 'Administrador', 'created' => date('Y-m-d H:i:s'), 'modified' => date('Y-m-d H:i:s')],
        ['id' => 2, 'nombre' => 'usuario normal', 'descripcion' => 'Usuario', 'created' => date('Y-m-d H:i:s'), 'modified' => date('Y-m-d H:i:s')],
    ];
    $this->table('roles')->insert($data)->save();
    }
}
