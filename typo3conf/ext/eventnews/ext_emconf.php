<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "eventnews".
 *
 * Auto generated 21-12-2019 12:24
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'News events',
  'description' => 'Events for news',
  'category' => 'plugin',
  'author' => 'Georg Ringer',
  'author_email' => '',
  'state' => 'beta',
  'clearCacheOnLoad' => true,
  'version' => '3.0.0',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '8.7.22-9.5.99',
      'news' => '7.0.0-7.9.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  'uploadfolder' => false,
  'createDirs' => NULL,
  'clearcacheonload' => true,
  'author_company' => NULL,
);

