<?php
namespace T3S\T3sJslidernews\Domain\Model;

/***************************************************************
*  Copyright notice
*
*  (c) 2014 Helmut Hackbarth <typo3@t3solution.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Class for the tt_content
 *
 * represents the Content Model
 *
 *
 */


/**
 * @scope prototype
 * @entity
 */
class Content extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {


	/**
	 * uid
	 * @var int
	 * @validate NotEmpty
	 */
    protected $uid;

	/**
	 * pid
	 * @var int
	 * @validate NotEmpty
	 */
    protected $pid;

	/**
	 * sorting
	 * @var int
	 * @validate NotEmpty
	 */
    protected $sorting;


	/**
	 * title
	 * @var string
	 *
	 */
    protected $title;

	/**
	 * subheader
	 * @var string
	 *
	 */
    protected $subheader;

	/**
	 * headerLink
	 * @var string
	 *
	 */
	    protected $headerLink;

	/**
	 * bodytext
	 * @var string
	 *
	 */
    protected $bodytext;

	/**
	 * image
	 * @var string
	 *
	 */
    protected $image;

	/**
	 * imageLink
	 * @var string
	 *
	 */
    protected $imageLink;


	/**
	 * colPos
	 * @var int
	 *
	 */
    protected $colPos;


	/**
	 * Returns the uid
	 *
	 * @return int $uid
	 */
    public function getUid() {
    	return $this->uid;
    }

	/**
	 * Returns the pid
	 *
	 * @return int $pid
	 */
    public function getPid() {
    	return $this->pid;
    }

	/**
	 * Returns the sorting
	 *
	 * @return int $sorting
	 */
    public function getSorting() {
    	return $this->sorting;
    }


	 /**
	 * Returns the title
	 *
	 * @return string $title
	 */
	    public function getTitle() {
    	return $this->title;
    }

	 /**
	 * Returns the subheader
	 *
	 * @return string $subheader
	 */
    public function getSubheader() {
    	return $this->subheader;
    }

	/**
	 * Returns the headerLink
	 *
	 * @return string $headerLink
	 */
	    public function getHeaderLink() {
    	return $this->headerLink;
    }

	 /**
	 * Returns the bodytext
	 *
	 * @return string $bodytext
	 */
	    public function getBodytext() {
    	return $this->bodytext;
    }

	/**
	 * Returns the image
	 *
	 * @return string $image
	 */
    public function getImage() {
    	return $this->image;
    }
	
	/**
	 * Sets the image
	 *
	 * @param array $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the imageLink
	 *
	 * @return string $imageLink
	 */
    public function getImageLink() {
    	return $this->imageLink;
    }

	/**
	 * Returns the colPos
	 *
	 * @return int $colPos
	 */
    public function getColPos() {
    	return $this->colPos;
    }

}
