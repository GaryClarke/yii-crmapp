<?php

class AcceptanceHelper {

    public function seeContentIsLong($content, $triggerLength = 100)
    {
        $this->assertGreaterThan($triggerLength, strlen($content));
    }
}