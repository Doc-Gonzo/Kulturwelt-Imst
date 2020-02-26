<?php
namespace Ciresa\Navidual\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Fabio Ciresa <fciresa@tsn.at>
 */
class RouteControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Ciresa\Navidual\Controller\RouteController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Ciresa\Navidual\Controller\RouteController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllRoutesFromRepositoryAndAssignsThemToView()
    {

        $allRoutes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $routeRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\RouteRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $routeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRoutes));
        $this->inject($this->subject, 'routeRepository', $routeRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('routes', $allRoutes);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenRouteToView()
    {
        $route = new \Ciresa\Navidual\Domain\Model\Route();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('route', $route);

        $this->subject->showAction($route);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenRouteToRouteRepository()
    {
        $route = new \Ciresa\Navidual\Domain\Model\Route();

        $routeRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\RouteRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $routeRepository->expects(self::once())->method('add')->with($route);
        $this->inject($this->subject, 'routeRepository', $routeRepository);

        $this->subject->createAction($route);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenRouteToView()
    {
        $route = new \Ciresa\Navidual\Domain\Model\Route();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('route', $route);

        $this->subject->editAction($route);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenRouteInRouteRepository()
    {
        $route = new \Ciresa\Navidual\Domain\Model\Route();

        $routeRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\RouteRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $routeRepository->expects(self::once())->method('update')->with($route);
        $this->inject($this->subject, 'routeRepository', $routeRepository);

        $this->subject->updateAction($route);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenRouteFromRouteRepository()
    {
        $route = new \Ciresa\Navidual\Domain\Model\Route();

        $routeRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\RouteRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $routeRepository->expects(self::once())->method('remove')->with($route);
        $this->inject($this->subject, 'routeRepository', $routeRepository);

        $this->subject->deleteAction($route);
    }
}
