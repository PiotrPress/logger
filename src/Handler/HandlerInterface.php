<?php declare( strict_types = 1 );

namespace PiotrPress\Logger\Handler;

use PiotrPress\Logger\LogRecord;

interface HandlerInterface {
    public function handle( LogRecord $record ) : bool;
}