<?php
/**
 * @validator PublicacoesAutoresValidatorTrait
 * @created at 23-10-2016 12:03:57
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Validators;

use HTR\Helpers\Mensagem\Mensagem as msg;
use Respect\Validation\Validator as v;

trait PublicacoesAutoresValidatorTrait
{
    use \HTR\System\CommonTrait;

    protected function validateAutoresId()
    {
        $value = v::intVal()->notEmpty()->length(1, 11)->validate($this->getAutoresId());
        if (!$value) {
            msg::showMsg('Houve um erro ao consultar um autor...'
                . '<script>focusOn("autores");</script>', 'danger');
            return $this;
        }
    }
}
