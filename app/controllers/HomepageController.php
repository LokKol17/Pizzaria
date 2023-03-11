<?php

class HomepageController {
    public function execute() {
        $html = file_get_contents(__DIR__ . '../public/index.html');
        
    }
}