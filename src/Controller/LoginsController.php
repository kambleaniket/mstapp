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
 * Logins Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $logins = $this->paginate($this->Logins);

        $this->set(compact('logins'));
    }

    /**
     * View method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $login = $this->Logins->get($id, [
            'contain' => []
        ]);

        $this->set('login', $login);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        if ($this->request->is('post')) {
            $username = $this->request->data('email');
            $hashPswdObj = new DefaultPasswordHasher;
            $password = $hashPswdObj->hash($this->request->data('password'));
            $logins_table = TableRegistry::get('logins');
            $logins = $logins_table->newEntity();
            $logins->email = $username;
            $logins->password = $password;
            if ($logins_table->save($logins))
             {
                $this->Flash->success(__('The user has been saved.'));
             return $this->redirect(['action' => 'login']);
            }
        }


    }

    /**
     * Edit method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $login = $this->Logins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $login = $this->Logins->patchEntity($login, $this->request->getData());
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $this->set(compact('login'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $login = $this->Logins->get($id);
        if ($this->Logins->delete($login)) {
            $this->Flash->success(__('The login has been deleted.'));
        } else {
            $this->Flash->error(__('The login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if($this->request->is('post')) {
           
            $login = $this->Auth->identify();
            debug($this->request->getData());
            debug($login);
            if ($login) {
                 
                $this->Auth->setUser($login);
                return $this->redirect($this->Auth->redirectUrl());
            }
    
            $this->Flash->error(__("Your username or password is incorrect"));
            

            
            }
         }


    }

