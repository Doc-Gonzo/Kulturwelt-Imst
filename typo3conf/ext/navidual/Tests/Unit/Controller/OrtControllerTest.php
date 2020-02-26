<?php
namespace Ciresa\Navidual\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Fabio Ciresa <fciresa@tsn.at>
 */
class OrtControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Ciresa\Navidual\Controller\OrtController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Ciresa\Navidual\Controller\OrtController::class)
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
    public function listActionFetchesAllOrtsFromRepositoryAndAssignsThemToView()
    {

        $allOrts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ortRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\OrtRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ortRepository->expects(self::once())->method('findAll')->will(self::returnValue($allOrts));
        $this->inject($this->subject, 'ortRepository', $ortRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('orts', $allOrts);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenOrtToView()
    {
        $ort = new \Ciresa\Navidual\Domain\Model\Ort();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('ort', $ort);

        $this->subject->showAction($ort);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenOrtToOrtRepository()
    {
        $ort = new \Ciresa\Navidual\Domain\Model\Ort();

        $ortRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\OrtRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $ortRepository->expects(self::once())->method('add')->with($ort);
        $this->inject($this->subject, 'ortRepository', $ortRepository);

        $this->subject->createAction($ort);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenOrtToView()
    {
        $ort = new \Ciresa\Navidual\Domain\Model\Ort();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('ort', $ort);

        $this->subject->editAction($ort);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenOrtInOrtRepository()
    {
        $ort = new \Ciresa\Navidual\Domain\Model\Ort();

        $ortRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\OrtRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $ortRepository->expects(self::once())->method('update')->with($ort);
        $this->inject($this->subject, 'ortRepository', $ortRepository);

        $this->subject->updateAction($ort);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenOrtFromOrtRepository()
    {
        $ort = new \Ciresa\Navidual\Domain\Model\Ort();

        $ortRepository = $this->getMockBuilder(\Ciresa\Navidual\Domain\Repository\OrtRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $ortRepository->expects(self::once())->method('remove')->with($ort);
        $this->inject($this->subject, 'ortRepository', $ortRepository);

        $this->subject->deleteAction($ort);
    }
}
