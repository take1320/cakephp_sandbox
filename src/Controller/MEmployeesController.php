<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MEmployees Controller
 *
 * @property \App\Model\Table\MEmployeesTable $MEmployees
 *
 * @method \App\Model\Entity\MEmployee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MEmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $mEmployees = $this->paginate($this->MEmployees);

        $this->set(compact('mEmployees'));
    }

    /**
     * View method
     *
     * @param string|null $id M Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mEmployee = $this->MEmployees->get($id, [
            'contain' => [],
        ]);

        $this->set('mEmployee', $mEmployee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mEmployee = $this->MEmployees->newEntity();
        if ($this->request->is('post')) {
            $mEmployee = $this->MEmployees->patchEntity($mEmployee, $this->request->getData());
            if ($this->MEmployees->save($mEmployee)) {
                $this->Flash->success(__('The m employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The m employee could not be saved. Please, try again.'));
        }
        $this->set(compact('mEmployee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id M Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mEmployee = $this->MEmployees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mEmployee = $this->MEmployees->patchEntity($mEmployee, $this->request->getData());
            if ($this->MEmployees->save($mEmployee)) {
                $this->Flash->success(__('The m employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The m employee could not be saved. Please, try again.'));
        }
        $this->set(compact('mEmployee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id M Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mEmployee = $this->MEmployees->get($id);
        if ($this->MEmployees->delete($mEmployee)) {
            $this->Flash->success(__('The m employee has been deleted.'));
        } else {
            $this->Flash->error(__('The m employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
