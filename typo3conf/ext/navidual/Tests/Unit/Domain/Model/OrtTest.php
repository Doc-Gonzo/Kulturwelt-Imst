<?php
namespace Ciresa\Navidual\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Fabio Ciresa <fciresa@tsn.at>
 */
class OrtTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Ciresa\Navidual\Domain\Model\Ort
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Ciresa\Navidual\Domain\Model\Ort();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getOrtBezeichnungReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrtBezeichnung()
        );
    }

    /**
     * @test
     */
    public function setOrtBezeichnungForStringSetsOrtBezeichnung()
    {
        $this->subject->setOrtBezeichnung('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'ortBezeichnung',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrtBeschreibungReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrtBeschreibung()
        );
    }

    /**
     * @test
     */
    public function setOrtBeschreibungForStringSetsOrtBeschreibung()
    {
        $this->subject->setOrtBeschreibung('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'ortBeschreibung',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrtAdresseReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrtAdresse()
        );
    }

    /**
     * @test
     */
    public function setOrtAdresseForStringSetsOrtAdresse()
    {
        $this->subject->setOrtAdresse('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'ortAdresse',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrtGemeindeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrtGemeinde()
        );
    }

    /**
     * @test
     */
    public function setOrtGemeindeForStringSetsOrtGemeinde()
    {
        $this->subject->setOrtGemeinde('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'ortGemeinde',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrtPlzReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrtPlz()
        );
    }

    /**
     * @test
     */
    public function setOrtPlzForStringSetsOrtPlz()
    {
        $this->subject->setOrtPlz('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'ortPlz',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrtLatitudeReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getOrtLatitude()
        );
    }

    /**
     * @test
     */
    public function setOrtLatitudeForFloatSetsOrtLatitude()
    {
        $this->subject->setOrtLatitude(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'ortLatitude',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getOrtLongitudeReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getOrtLongitude()
        );
    }

    /**
     * @test
     */
    public function setOrtLongitudeForFloatSetsOrtLongitude()
    {
        $this->subject->setOrtLongitude(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'ortLongitude',
            $this->subject,
            '',
            0.000000001
        );
    }
}
