<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 */
class DocumentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
	// 1. Obtenemos quién está logueado
	    $usuarioLogueado = $this->request->getAttribute('identity');
	    $esAdmin = ($usuarioLogueado->role_id === 1);

	    // 2. Preparamos la consulta base
	    $query = $this->Documents->find()->contain(['Users']);

	    // 3. Si NO es admin, filtramos la consulta para que solo traiga SUS documentos
	    if (!$esAdmin) {
		$query->where(['Documents.user_id' => $usuarioLogueado->id]);
	    }

	    // 4. Paginamos los resultados
	    $documents = $this->paginate($query);

	    // 5. Enviamos los documentos y la variable $esAdmin a la vista
	    $this->set(compact('documents', 'esAdmin'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, contain: ['Users']);
        $this->set(compact('document'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
	$document = $this->Documents->newEmptyEntity();
    
    if ($this->request->is('post')) {

        // Tomamos los datos del formulario
        $data = $this->request->getData();
        
        // 1. Atrapamos el archivo subido
        $archivoFisico = $this->request->getData('archivo_url');

        // 2. Verificamos que se subió un archivo sin errores
        if ($archivoFisico && $archivoFisico->getError() === UPLOAD_ERR_OK) {
            
            // Creamos un nombre único (para que no se sobreescriban si se llaman igual)
            $nombreOriginal = $archivoFisico->getClientFilename();
            $nombreUnico = time() . '_' . $nombreOriginal;
            
            // Definimos la ruta física donde se guardará (dentro de webroot/files/documentos/)
            $rutaDestino = WWW_ROOT . 'files' . DS . 'documentos' . DS . $nombreUnico;
            
            // Movemos el archivo a esa carpeta
            $archivoFisico->moveTo($rutaDestino);
            
            // Reemplazamos el objeto del archivo por la ruta en texto para la base de datos
            $data['archivo_url'] = 'files/documentos/' . $nombreUnico;
        } else {
            // Si no subió nada, lo dejamos nulo
            $data['archivo_url'] = null;
        }

        // Parcheamos la entidad con los datos (incluyendo la nueva ruta de texto)
        $document = $this->Documents->patchEntity($document, $data);
        
        if ($this->Documents->save($document)) {
            $this->Flash->success(__('El documento ha sido guardado.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('No se pudo guardar el documento. Intente de nuevo.'));
    }
    
    $users = $this->Documents->Users->find('list', limit: 200)->all();
    $this->set(compact('document', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
	$document = $this->Documents->get($id, [
        'contain' => [],
    ]);
    
    if ($this->request->is(['patch', 'post', 'put'])) {
        $data = $this->request->getData();
        $archivoFisico = $this->request->getData('archivo_url');
        
        // Si el usuario subió un archivo nuevo, lo procesamos
        if ($archivoFisico && $archivoFisico->getError() === UPLOAD_ERR_OK) {
            $nombreUnico = time() . '_' . $archivoFisico->getClientFilename();
            $rutaDestino = WWW_ROOT . 'files' . DS . 'documentos' . DS . $nombreUnico;
            $archivoFisico->moveTo($rutaDestino);
            $data['archivo_url'] = 'files/documentos/' . $nombreUnico;
        } else {
            // ¡EL SECRETO ESTÁ AQUÍ! 
            // Si no subió nada nuevo, eliminamos 'archivo_url' del arreglo de datos 
            // para que CakePHP ignore este campo y conserve el valor que ya estaba en la BD.
            unset($data['archivo_url']);
        }

        $document = $this->Documents->patchEntity($document, $data);
        
        if ($this->Documents->save($document)) {
            $this->Flash->success(__('El documento ha sido actualizado.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('No se pudo guardar. Intente de nuevo.'));
    }
    
    $users = $this->Documents->Users->find('list', limit: 200)->all();
    $this->set(compact('document', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
