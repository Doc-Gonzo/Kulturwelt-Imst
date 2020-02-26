<?php
namespace Ciresa\Navidual\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Fabio Ciresa <fciresa@tsn.at>
 */
class RouteTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Ciresa\Navidual\Domain\Model\Route
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Ciresa\Navidual\Domain\Model\Route();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getRouteBezeichnungReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRouteBezeichnung()
        );
    }

    /**
     * @test
     */
    public function setRouteBezeichnungForStringSetsRouteBezeichnung()
    {
        $this->subject->setRouteBezeichnung('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'routeBezeichnung',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRouteBeschreibungReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRouteBeschreibung()
        );
    }

    /**
     * @test
     */
    public function setRouteBeschreibungForStringSetsRouteBeschreibung()
    {
        $this->subject->setRouteBeschreibung('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'routeBeschreibung',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWegpunkteReturnsInitialValueForOrt()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getWegpunkte()
        );
    }

    /**
     * @test
     */
    public function setWegpunkteForObjectStorageContainingOrtSetsWegpunkte()
    {
        $wegpunkte = new \Ciresa\Navidual\Domain\Model\Ort();
        $objectStorageHoldingExactlyOneWegpunkte = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneWegpunkte->attach($wegpunkte);
        $this->subject->setWegpunkte($objectStorageHoldingExactlyOneWegpunkte);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneWegpunkte,
            'wegpunkte',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addWegpunkteToObjectStorageHoldingWegpunkte()
    {
        $wegpunkte = new \Ciresa\Navidual\Domain\Model\Ort();
        $wegpunkteObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $wegpunkteObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($wegpunkte));
        $this->inject($this->subject, 'wegpunkte', $wegpunkteObjectStorageMock);

        $this->subject->addWegpunkte($wegpunkte);
    }

    /**
     * @test
     */
    public function removeWegpunkteFromObjectStorageHoldingWegpunkte()
    {
        $wegpunkte = new \Ciresa\Navidual\Domain\Model\Ort();
        $wegpunkteObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $wegpunkteObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($wegpunkte));
        $this->inject($this->subject, 'wegpunkte', $wegpunkteObjectStorageMock);

        $this->subject->removeWegpunkte($wegpunkte);
    }
}
