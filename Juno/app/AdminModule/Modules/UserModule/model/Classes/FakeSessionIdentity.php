<?php

namespace UserModule\Classes;

class FakeSessionIdentity {

    private $originID;

    private $originFullName;

    public function __construct($originID, $originFullName) {
        $this->originID = $originID;
        $this->originFullName = $originFullName;
    }

    public function getFullName() {
        return $this->originFullName;
    }

    public function getOriginID() {
        return $this->originID;
    }

}