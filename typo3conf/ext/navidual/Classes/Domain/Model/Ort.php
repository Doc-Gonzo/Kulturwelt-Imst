<?php
namespace Ciresa\Navidual\Domain\Model;

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
 * Model für einen Ort.
 */
class Ort extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Bezeichnung des Orts.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $ortBezeichnung = '';

    /**
     * Beschreibung des Orts.
     *
     * @var string
     */
    protected $ortBeschreibung = '';

    /**
     * Adresse des Orts.
     *
     * @var string
     */
    protected $ortAdresse = '';

    /**
     * Gemeinde des Orts.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $ortGemeinde = '';

    /**
     * Postleitzahl des Orts.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $ortPlz = '';

    /**
     * Latitude des Orts.
     *
     * @var float
     */
    protected $ortLatitude = 0.0;

    /**
     * Longitude des Orts.
     *
     * @var float
     */
    protected $ortLongitude = 0.0;

    /**
     * Returns the ortBezeichnung
     *
     * @return string $ortBezeichnung
     */
    public function getOrtBezeichnung()
    {
        return $this->ortBezeichnung;
    }

    /**
     * Sets the ortBezeichnung
     *
     * @param string $ortBezeichnung
     * @return void
     */
    public function setOrtBezeichnung($ortBezeichnung)
    {
        $this->ortBezeichnung = $ortBezeichnung;
    }

    /**
     * Returns the ortBeschreibung
     *
     * @return string $ortBeschreibung
     */
    public function getOrtBeschreibung()
    {
        return $this->ortBeschreibung;
    }

    /**
     * Sets the ortBeschreibung
     *
     * @param string $ortBeschreibung
     * @return void
     */
    public function setOrtBeschreibung($ortBeschreibung)
    {
        $this->ortBeschreibung = $ortBeschreibung;
    }

    /**
     * Returns the ortAdresse
     *
     * @return string $ortAdresse
     */
    public function getOrtAdresse()
    {
        return $this->ortAdresse;
    }

    /**
     * Sets the ortAdresse
     *
     * @param string $ortAdresse
     * @return void
     */
    public function setOrtAdresse($ortAdresse)
    {
        $this->ortAdresse = $ortAdresse;
    }

    /**
     * Returns the ortGemeinde
     *
     * @return string $ortGemeinde
     */
    public function getOrtGemeinde()
    {
        return $this->ortGemeinde;
    }

    /**
     * Sets the ortGemeinde
     *
     * @param string $ortGemeinde
     * @return void
     */
    public function setOrtGemeinde($ortGemeinde)
    {
        $this->ortGemeinde = $ortGemeinde;
    }

    /**
     * Returns the ortPlz
     *
     * @return string $ortPlz
     */
    public function getOrtPlz()
    {
        return $this->ortPlz;
    }

    /**
     * Sets the ortPlz
     *
     * @param string $ortPlz
     * @return void
     */
    public function setOrtPlz($ortPlz)
    {
        $this->ortPlz = $ortPlz;
    }

    /**
     * Returns the ortLatitude
     *
     * @return float $ortLatitude
     */
    public function getOrtLatitude()
    {
        return $this->ortLatitude;
    }

    /**
     * Sets the ortLatitude
     *
     * @param float $ortLatitude
     * @return void
     */
    public function setOrtLatitude($ortLatitude)
    {
        $this->ortLatitude = $ortLatitude;
    }

    /**
     * Returns the ortLongitude
     *
     * @return float $ortLongitude
     */
    public function getOrtLongitude()
    {
        return $this->ortLongitude;
    }

    /**
     * Sets the ortLongitude
     *
     * @param float $ortLongitude
     * @return void
     */
    public function setOrtLongitude($ortLongitude)
    {
        $this->ortLongitude = $ortLongitude;
    }
}
