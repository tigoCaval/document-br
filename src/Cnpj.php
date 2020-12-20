<?php
namespace Tigo;

use Tigo\DocumentBase;

/**
 * Regra do CNPJ
 */
class Cnpj extends DocumentBase
{

    const LIMIT = 14; // limite do tamanho do cnpj
    const DIGIT_ONE = [5,4,3,2,9,8,7,6,5,4,3,2]; // regra do primeiro digito 
    const DIGIT_TWO = [6,5,4,3,2,9,8,7,6,5,4,3,2]; // regra do segundo digito 
 
    /**
     * Verificar se o cnpj é válido.
     * @param mixed $cnpj
     * 
     * @return [type]
     */
    public function check($cnpj) 
    {
       return $this->authenticate($cnpj, self::LIMIT, self::DIGIT_ONE, self::DIGIT_TWO);        
    }  

    /**
     * Gerar cnpj. 
     * @return [type]
     */
    public function generate()
    {
       return $this->make(self::LIMIT, self::DIGIT_ONE, self::DIGIT_TWO);
    }  
  
}