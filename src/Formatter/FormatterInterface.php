<?php declare( strict_types = 1 );

namespace PiotrPress\Logger\Formatter;

use PiotrPress\Logger\LogRecord;

interface FormatterInterface {
    public function format( LogRecord $record ) : string;
}