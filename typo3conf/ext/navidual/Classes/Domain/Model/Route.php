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
 * Model für eine Route.
 */
class Route extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Bezeichnung der Route.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $routeBezeichnung = '';

    /**
     * Beschreibung der Route.
     *
     * @var string
     */
    protected $routeBeschreibung = '';

    /**
     * Eine Route kann aus mehreren Orten bestehen. Ein Ort kann in mehren Routen
     * vorkommen.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ciresa\Navidual\Domain\Model\Ort>
     */
    protected $wegpunkte = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->wegpunkte = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the routeBezeichnung
     *
     * @return string $routeBezeichnung
     */
    public function getRouteBezeichnung()
    {
        return $this->routeBezeichnung;
    }

    /**
     * Sets the routeBezeichnung
     *
     * @param string $routeBezeichnung
     * @return void
     */
    public function setRouteBezeichnung($routeBezeichnung)
    {
        $this->routeBezeichnung = $routeBezeichnung;
    }

    /**
     * Returns the routeBeschreibung
     *
     * @return string $routeBeschreibung
     */
    public function getRouteBeschreibung()
    {
        return $this->routeBeschreibung;
    }

    /**
     * Sets the routeBeschreibung
     *
     * @param string $routeBeschreibung
     * @return void
     */
    public function setRouteBeschreibung($routeBeschreibung)
    {
        $this->routeBeschreibung = $routeBeschreibung;
    }

    /**
     * Adds a Ort
     *
     * @param \Ciresa\Navidual\Domain\Model\Ort $wegpunkte
     * @return void
     */
    public function addWegpunkte(\Ciresa\Navidual\Domain\Model\Ort $wegpunkte)
    {
        $this->wegpunkte->attach($wegpunkte);
    }

    /**
     * Removes a Ort
     *
     * @param \Ciresa\Navidual\Domain\Model\Ort $wegpunkteToRemove The Ort to be removed
     * @return void
     */
    public function removeWegpunkte(\Ciresa\Navidual\Domain\Model\Ort $wegpunkteToRemove)
    {
        $this->wegpunkte->detach($wegpunkteToRemove);
    }

    /**
     * Returns the wegpunkte
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ciresa\Navidual\Domain\Model\Ort> $wegpunkte
     */
    public function getWegpunkte()
    {
        return $this->wegpunkte;
    }

    /**
     * Sets the wegpunkte
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ciresa\Navidual\Domain\Model\Ort> $wegpunkte
     * @return void
     */
    public function setWegpunkte(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $wegpunkte)
    {
        $this->wegpunkte = $wegpunkte;
    }
}
