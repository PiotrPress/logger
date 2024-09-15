<?php declare( strict_types = 1 );

namespace PiotrPress\Logger\Formatter;

use PiotrPress\Logger\LogRecord;

class FileFormatter extends TemplateFormatter {
    protected string $template = __DIR__ . '/../../tpl/file.php';

    public function __construct( ?string $template = null ) {
        parent::__construct( $template ?? $this->template );
    }

    public function format( LogRecord $record ) : string {
        return parent::format( new LogRecord(
            $record->getLevel(),
            $record->getMessage(),
            \array_merge( [ 'date' => \date( 'Y-m-d G:i:s' ) ], $record->getContext() )
        ) );
    }
}