<?php
// Imports
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/render.php';

// Create objects
$renderer = new Renderer();

// Create content object
$content = [];

// Content xml loop
foreach (scandir(__DIR__.'/../content') as $f) {

  // Check if file is a dot file
  if ($f != '.' and $f != '..') {

    // Check if is a xml file
    if (pathinfo($f, PATHINFO_EXTENSION) == 'xml') {

      // Load xml
      $contentXml = new DOMDocument;
      $contentXml->load(__DIR__.'/../content/'.$f);

      // Get urls
      $items = $contentXml->getElementsByTagName('Urls');

      // Content urls loop
      for ($i = 0; $i < $items->length; $i++) {

        // Set url variable
        $url = trim($items->item($i)->nodeValue);

        // Respond with a rendered page
        if (strcmp($_SERVER['REQUEST_URI'], $url) == 0) {
          $renderer->renderPageFromDom($contentXml);
        }
      }
    }
  }
}
?>
