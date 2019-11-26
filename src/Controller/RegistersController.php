<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Cake\Auth\FormAuthenticate;
use Cake\ORM\Query;
use Cake\Auth\BaseAuthenticate;
use Cake\Auth;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Registers Controller
 *
 *
 * @method \App\Model\Entity\Register[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegistersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $register_table = TableRegistry::get('registers');
        // $register = $register_table->find();
        // $this->set('register',$register);

         $registers = $this->paginate($this->Registers);

        $this->set(compact('registers'));
    }

    /**
     * View method
     *
     * @param string|null $id Register id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $register = $this->Registers->get($id, [
            'contain' => []
        ]);

        $this->set('register', $register);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $register = $this->Registers->newEntity();
        if ($this->request->is('post')) {
            
            $register = $this->Registers->patchEntity($register, $this->request->getData());
            if ($this->Registers->save($register)) {
                $this->Flash->success(__('The register has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The register could not be saved. Please, try again.'));
        }
        $this->set(compact('register'));
        $this->loadModel('Countries');
        $articles = $this->Countries->find('all');
        $this->set('countries', $articles);
          
          

    }

    /**
     * Edit method
     *
     * @param string|null $id Register id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $register = $this->Registers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $register = $this->Registers->patchEntity($register,$this->request->getData());
            if ($this->Registers->save($register)) {
                $this->Flash->success(__('The register has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The register could not be saved. Please, try again.'));
        }
        $this->set(compact('register'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Register id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $register = $this->Registers->get($id);
        if ($this->Registers->delete($register)) {
            $this->Flash->success(__('The register has been deleted.'));
        } else {
            $this->Flash->error(__('The register could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    

    public function state()
    {
       if ($this->request->is(['patch', 'post', 'put'])) {
        $this->autoRender = false;
        $country_id = $_POST['id'];
        $this->loadModel('States');
        $state = $this->States->find()
        ->select(['name' , 'id'])
        ->where(['country_id '=> $country_id]);
        echo json_encode($state);
       }
        
    }


}
