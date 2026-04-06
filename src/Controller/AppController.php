<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        $this->loadComponent('Authentication.Authentication');


        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    
    $this->Authentication->addUnauthenticatedActions(['login', 'logout']);

    $usuarioLogueado = $this->request->getAttribute('identity');



    if ($usuarioLogueado) {
        $controladorActual = $this->request->getParam('controller');
        $accionActual = $this->request->getParam('action');
        
        $esAdmin = ($usuarioLogueado->role_id === 1);

        if (!$esAdmin) {
            
            $esRutaPermitida = false;
            
            // 1. Permitimos que inicie sesión sin que le salte el error
            if ($controladorActual === 'Users' && $accionActual === 'login') {
                $esRutaPermitida = true;
            }
            
            // 2. Permitimos que cierre sesión
            if ($controladorActual === 'Users' && $accionActual === 'logout') {
                $esRutaPermitida = true;
            }
            
            // 3. Permitimos que vea sus documentos
            if ($controladorActual === 'Documents' && $accionActual === 'index') {
                $esRutaPermitida = true;
            }

            if (!$esRutaPermitida && in_array($controladorActual, ['Users', 'Documents'])) {
                $this->Flash->error(__('Acceso denegado. Esta sección es exclusiva para Administradores.'));
                return $this->redirect(['controller' => 'Documents', 'action' => 'index']);
            }
        }
    }
}

}
