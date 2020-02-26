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
 * RouteController
 */
class RouteController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * routeRepository
     *
     * @var \Ciresa\Navidual\Domain\Repository\RouteRepository
     * @inject
     */
    protected $routeRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $routes = $this->routeRepository->findAll();
        $this->view->assign('routes', $routes);
    }

    /**
     * action show
     *
     * @param \Ciresa\Navidual\Domain\Model\Route $route
     * @return void
     */
    public function showAction(\Ciresa\Navidual\Domain\Model\Route $route)
    {
        $this->view->assign('route', $route);
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
     * @param \Ciresa\Navidual\Domain\Model\Route $newRoute
     * @return void
     */
    public function createAction(\Ciresa\Navidual\Domain\Model\Route $newRoute)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->routeRepository->add($newRoute);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Ciresa\Navidual\Domain\Model\Route $route
     * @ignorevalidation $route
     * @return void
     */
    public function editAction(\Ciresa\Navidual\Domain\Model\Route $route)
    {
        $this->view->assign('route', $route);
    }

    /**
     * action update
     *
     * @param \Ciresa\Navidual\Domain\Model\Route $route
     * @return void
     */
    public function updateAction(\Ciresa\Navidual\Domain\Model\Route $route)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->routeRepository->update($route);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Ciresa\Navidual\Domain\Model\Route $route
     * @return void
     */
    public function deleteAction(\Ciresa\Navidual\Domain\Model\Route $route)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->routeRepository->remove($route);
        $this->redirect('list');
    }
}
