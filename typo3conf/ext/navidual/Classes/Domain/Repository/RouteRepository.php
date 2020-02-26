<?php
namespace Ciresa\Navidual\Domain\Repository;

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
 * The repository for Routes
 */
class RouteRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];
}
