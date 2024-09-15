<?php declare( strict_types = 1 );

namespace PiotrPress\Logger\Handler;

use PiotrPress\Logger\LogRecord;
use PiotrPress\Logger\Formatter\FormatterInterface;
use PiotrPress\Logger\Formatter\ErrorLogFormatter;

class ErrorLogHandler extends FormattableHandler implements HandlerInterface {
    public function __construct( ?FormatterInterface $formatter = null ) {
        parent::__construct( $formatter ?? new ErrorLogFormatter() );
    }

    public function handle( LogRecord $record ) : bool {
        return @\error_log( $this->formatter->format( $record ) );
    }
}