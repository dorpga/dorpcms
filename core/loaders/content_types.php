<?php
	require_once __DIR__.'/../errors.php';

	class ContentTypeLoader {
		static function load ($o) {
			$f = __DIR__.'/../content_types/'.$o.'.xml';
			if (file_exists($f)) {
				$doc = new DOMDocument;
				$doc->load($f);
				return array("object" => $doc);
			} else {
				return array("error" => Errors::LoaderObjectNotFound());
			}
		}
	}
?>
