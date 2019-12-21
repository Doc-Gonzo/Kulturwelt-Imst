<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "news".
 *
 * Auto generated 03-08-2019 09:38
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'News system',
  'description' => 'Versatile news extension, based on extbase & fluid. Editor friendly, default integration of social sharing and many other features',
  'category' => 'fe',
  'author' => 'Georg Ringer',
  'author_email' => 'mail@ringer.it',
  'state' => 'stable',
  'clearCacheOnLoad' => true,
  'version' => '7.2.0',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '8.7.13-9.5.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
      'rx_shariff' => '11.0.0-11.99.99',
    ),
  ),
  'uploadfolder' => false,
  'createDirs' => NULL,
  'clearcacheonload' => true,
  'author_company' => NULL,
);

