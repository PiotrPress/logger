<?php declare( strict_types = 1 );

namespace PiotrPress\Logger\Handler;

use PiotrPress\Logger\Formatter\FormatterInterface;
use PiotrPress\Logger\Formatter\DefaultFormatter;

abstract class FormattableHandler {
    protected FormatterInterface $formatter;

    public function __construct( ?FormatterInterface $formatter = null ) {
        $this->formatter = $formatter ?? new DefaultFormatter();
    }
}