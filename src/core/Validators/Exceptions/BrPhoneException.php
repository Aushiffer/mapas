<?php
namespace MapasCulturais\Validators\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class BrPhoneException extends ValidationException {
    
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid brazilian telephone number',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid brazilian telephone number',
        ],
    ];
}