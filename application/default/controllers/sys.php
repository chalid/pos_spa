<?php

class sys extends base_sys_controller {

    function cache_clean() {
        $this->cache->clean();
    }
}