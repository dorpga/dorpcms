<?php

class Renderer {
  function renderPageFromDom ($contentXml) {
    // Load content type
    $contentTypeResponse = ContentTypeLoader::load($contentXml->getElementsByTagName('Type')[0]->nodeValue);

    // Check for errors
    if (isset($contentTypeResponse['error'])) {

      // Echo error
      echo 'Renderer/ContentTypeLoader/Error '.$contentTypeResponse['error'];

    } else {

      // Get xml
      $contentType = $contentTypeResponse['object'];

      // Get model node
      $contentModel = $contentType->getElementsByTagName('Model')[0];

      // Check if src attribute exists
      if ($contentModel->getAttribute('src')) {
        // Set model source variable
        $contentModelSrc = $contentModel->getAttribute('src');

        // Load model xml
        $contentModelXml = DOMDocument::load(__DIR__.'/models/'.$contentModelSrc.'.xml');
      }
    }
  }
}
?>
