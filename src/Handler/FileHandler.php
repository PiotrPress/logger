<?php declare( strict_types = 1 );

namespace PiotrPress\Logger\Handler;

use PiotrPress\Logger\LogRecord;
use PiotrPress\Logger\Formatter\FormatterInterface;
use PiotrPress\Logger\Formatter\FileFormatter;

class FileHandler extends FormattableHandler implements HandlerInterface {
    private string $file;

    public function __construct( string $file, ?FormatterInterface $formatter = null  ) {
        parent::__construct( $formatter ?? new FileFormatter() );
        $this->file = $file;
    }

    public function handle( LogRecord $record ) : bool {
        return (bool)@\file_put_contents( $this->file, $this->formatter->format( $record ), FILE_APPEND );
    }
}