<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "newsslider".
 *
 * Auto generated 14-10-2019 11:25
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'News slider',
  'description' => 'jQuery slider-plugins for versatile news extension (tx_news).',
  'category' => 'plugin',
  'version' => '4.0.0',
  'state' => 'stable',
  'uploadfolder' => false,
  'createDirs' => '',
  'clearcacheonload' => false,
  'author' => 'Helmut Hackbarth',
  'author_email' => 'typo3@t3solution.de',
  'author_company' => 't3solution',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '8.7.13-9.2.99',
      'news' => '7.0.1-7.99.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  'autoload' => 
  array (
    'psr-4' => 
    array (
      'T3S\\Newsslider\\' => 'Classes',
    ),
  ),
);

