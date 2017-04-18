<?php

class Renderer {
  function renderPageFromDom ($contentXml) {
    // Load content type
    $contentType = ContentTypeLoader::load($contentXml->getElementsByTagName('Type')[0]->nodeValue);

    // Check for errors
    if (isset($contentType['error'])) {
      // Echp error
      echo 'Renderer: ContentTypeLoader: Error '.$contentType['error'];
    } else {
      echo 'OK';
    }
  }
}
?>
