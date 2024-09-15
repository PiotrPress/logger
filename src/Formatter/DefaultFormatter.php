<?php declare( strict_types = 1 );

namespace PiotrPress\Logger\Formatter;

use PiotrPress\Logger\LogRecord;

class DefaultFormatter implements FormatterInterface {
    public function format( LogRecord $record ) : string {
        $message = $record->getMessage();
        $context = $record->getContext();

        foreach( $context as $key => $value )
            if( ! \is_array( $value ) && ( ! \is_object( $value ) || \method_exists( $value, '__toString' ) ) )
                $message = \str_replace( '{' . $key . '}', $value, $message );
        
        return $message;
    }
}