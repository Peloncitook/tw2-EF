<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'apellido' => 'Lorem ipsum dolor sit amet',
                'correo' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'language' => 'Lorem ip',
                'created' => '2026-04-02 00:40:47',
                'modified' => '2026-04-02 00:40:47',
                'direccion' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
