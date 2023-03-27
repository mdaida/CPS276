<?php

class Page {
	public function nav(){
		$nav = <<<NAV
      <nav>
        <ul>
          <li><a href="fileUpload.php">File Upload</a></li>
          
          <li><a href="listFiles.php">List Files</a></li>
        </ul>
      </nav>
NAV;
		return $nav;
	}
}