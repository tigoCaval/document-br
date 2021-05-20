<?php
namespace Tigo\DocumentBr;

use Tigo\DocumentBr\DocumentBase;

/**
 * Regra do CPF
 */
class Cpf extends DocumentBase
{

    const  LIMIT = 11; // limite do tamanho do cpf
    const  DIGIT_ONE = [10,9,8,7,6,5,4,3,2]; // regra do primeiro digito 
    const  DIGIT_TWO = [11,10,9,8,7,6,5,4,3,2]; //regra do segundo digito 
   
    /**
     * Verificar se o cpf é válido.
     * @param mixed  $cpf
     * 
     * @return [type]
     */
    public function check($cpf)
    { 
       return $this->authenticate($cpf, self::LIMIT, self::DIGIT_ONE, self::DIGIT_TWO);        
    } 

    /**
     * Gerar cpf. 
     * @return [type]
     */
    public function generate()
    {
       return $this->make(self::LIMIT, self::DIGIT_ONE, self::DIGIT_TWO);
    }

}