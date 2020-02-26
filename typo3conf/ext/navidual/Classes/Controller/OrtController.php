<?php
namespace Ciresa\Navidual\Controller;

/***
 *
 * This file is part of the "Navidual" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Fabio Ciresa <fciresa@tsn.at>
 *
 ***/

/**
 * OrtController
 */
class OrtController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * ortRepository
     *
     * @var \Ciresa\Navidual\Domain\Repository\OrtRepository
     * @inject
     */
    protected $ortRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $orts = $this->ortRepository->findAll();
        $this->view->assign('orts', $orts);
    }

    /**
     * action show
     *
     * @param \Ciresa\Navidual\Domain\Model\Ort $ort
     * @return void
     */
    public function showAction(\Ciresa\Navidual\Domain\Model\Ort $ort)
    {
        $this->view->assign('ort', $ort);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Ciresa\Navidual\Domain\Model\Ort $newOrt
     * @return void
     */
    public function createAction(\Ciresa\Navidual\Domain\Model\Ort $newOrt)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ortRepository->add($newOrt);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Ciresa\Navidual\Domain\Model\Ort $ort
     * @ignorevalidation $ort
     * @return void
     */
    public function editAction(\Ciresa\Navidual\Domain\Model\Ort $ort)
    {
        $this->view->assign('ort', $ort);
    }

    /**
     * action update
     *
     * @param \Ciresa\Navidual\Domain\Model\Ort $ort
     * @return void
     */
    public function updateAction(\Ciresa\Navidual\Domain\Model\Ort $ort)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ortRepository->update($ort);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Ciresa\Navidual\Domain\Model\Ort $ort
     * @return void
     */
    public function deleteAction(\Ciresa\Navidual\Domain\Model\Ort $ort)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ortRepository->remove($ort);
        $this->redirect('list');
    }
}
