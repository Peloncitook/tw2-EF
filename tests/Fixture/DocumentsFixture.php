<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentsFixture
 */
class DocumentsFixture extends TestFixture
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
                'user_id' => 1,
                'titulo' => 'Lorem ipsum dolor sit amet',
                'tipo' => 'Lorem ipsum dolor sit amet',
                'fecha_emision' => '2026-04-04',
                'entidad_emisora' => 'Lorem ipsum dolor sit amet',
                'archivo_url' => 'Lorem ipsum dolor sit amet',
                'estado' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-04-04 07:32:25',
                'modified' => '2026-04-04 07:32:25',
            ],
        ];
        parent::init();
    }
}
