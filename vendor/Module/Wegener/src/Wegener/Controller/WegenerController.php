<?php
/**
 * 
 * @package Wegener
 * 
 */
namespace Wegener\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Wegener\Form\SimpleForm;
use Wegener\Entity\Foo;

/**
 *
 * @package Wegener
 */
class WegenerController extends AbstractActionController
{
    /**
     * Index - Wegener
     * 
     * @return Zend\View\Model\ViewModel Zend View Model
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $foo = new Foo();
        $form = new SimpleForm();
        $form->setAttribute('action', '/wegener');
        $dataFoo = $entityManager->getRepository('Wegener\Entity\Foo')->findAll();
        
        if ($request->isPost()) {
            $data = $request->getPost();
            $form->setData($data);
            if ($form->isValid()) {
                $formData = $form->getData($data);
                $foo->setBar($formData['bar']);
                $entityManager->persist($foo);
                $entityManager->flush();

                $this->redirect()->toRoute('wegener');
            }
        }

        $finalData = array();
        if (count($dataFoo) > 0) {
            foreach ($dataFoo as $key => $foo) {
                $finalData[$key]['id'] = $foo->getId();
                $finalData[$key]['bar'] = $foo->getBar();
            }
        }

        return new ViewModel(
            array(
                'form' => $form,
                'finalData' => $finalData
            )
        );
    }
}
