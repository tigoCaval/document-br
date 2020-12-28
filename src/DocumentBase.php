<?php
namespace Tigo;
   
/**
 * Aqui contém a lógica para gerar e validar documentos do cpf e cnpj.
 * 
 * @package  documentbr  
 * @author Tiago A C Pereira  
 */
abstract class DocumentBase
{
 
     abstract protected function check($doc); // verificar documento
     abstract protected function generate(); // gerar documento
   
    /**
     * Autenticar documento, retorne true caso o documento seja válido.  
     * @param mixed $doc
     * @param int $limit
     * @param array $digitOne
     * @param array $digitTwo
     * 
     * @return bool
     */
    public function authenticate($doc, $limit, array $digitOne, array $digitTwo)
    { 
         $myDoc = $this->mountArray($doc, $limit); // documento do usuário
         $authDoc = $this->validate($doc, $limit, $digitOne, $digitTwo); // documento verdadeiro
         if($myDoc == $authDoc && $this->isAllValueEqual($myDoc) == false)
            return true;
         return false;    
    }

    /**
     * Criar número de documento válido. 
     * @param int $limit
     * @param array $digitOne
     * @param array $digitTwo
     * 
     * @return string 
     */
    public function make($limit, array $digitOne, array $digitTwo)
    {
       $doc = "";
       for($i=0; $i < $limit; $i++)
            $doc .= rand(0,9); // acrescentar valores aleatório  
       $newDoc = $this->validate($doc, $limit, $digitOne, $digitTwo);// validar documento    
       return $this->isAllValueEqual($newDoc) == false ? implode($newDoc) : "Algo deu errado"; 
    }

    /**
     * Calcular o primeiro digito.
     * @param mixed $doc
     * @param int $limit
     * @param array $digitOne
     * @access private
     * 
     * @return int 
     */
    private function computerOne($doc, $limit, array $digitOne)
    {
        $total = 0;
        $result = 0;
        $docAux = $this->mountArray($doc, $limit); // montar array
        if(!empty($docAux)){
            for($i = 0; $i < count($digitOne); $i++)
               $result  += ($docAux[$i] * $digitOne[$i]); 
            $resto = ($result % 11);
            $check =  $resto < 2 ? 0 : $resto; 
            if($check == 0)
               return $check;
            $total = abs(11 - $resto);
        }    
        return $total;  
    }

    /**
     * Calcular o segundo digito.
     * @param mixed $doc
     * @param int $limit
     * @param array $digitOne
     * @param array $digitTwo
     * @access private
     * 
     * @return int
     */
    private function computerTwo($doc, $limit, array $digitOne, array $digitTwo)
    {
        $position = null; // posição
        $total = 0;
        $result = 0;
        $docAux = $this->mountArray($doc, $limit); // montar array 
        if(!empty($docAux)){
            $position = count($docAux) - 2; // obter a penúltima posição
            $docAux[$position] = $this->computerOne($doc, $limit, $digitOne);  // acrescentar primeiro digito identificado   
            for($i = 0; $i < count($digitTwo); $i++)
               $result  += ($docAux[$i] * $digitTwo[$i]);
            $resto = ($result % 11);
            $check =  $resto < 2 ? 0 : $resto; 
            if($check == 0)
               return $check;
            $total = abs(11 - $resto);
         }    
         return $total;  
    }
    
    /**
     * Validar documento.
     * Acrescentar os dois digitos finais e retornar array do documento completo.
     * @param mixed $doc
     * @param int $limit
     * @param array $digitOne
     * @param array $digitTwo
     * @access private
     * 
     * @return array
     */
    private function validate($doc, $limit, array $digitOne, array $digitTwo)
    { 
         $myDoc = $this->mountArray($doc, $limit); // transformar atributo em array
         $i = count($myDoc) - 2; // posição do primeiro digito; 
         $y = count($myDoc) - 1; // posição do segundo digito; 
         $myDoc[$i] = $this->computerOne($doc, $limit, $digitOne); // realizar calculo do primeiro digito e atribuir novo valor
         $myDoc[$y] = $this->computerTwo($doc, $limit, $digitOne, $digitTwo);// realizar calculo do segundo digito e atribuir novo valor 
         return $myDoc; 
    }


    /**
     * Montar array (aceitar apenas valores numéricos), com limite de tamanho.
     * @param mixed $doc
     * @param int $limit
     * @access private
     *  
     * @return array
     */
    private function mountArray($doc, $limit)
    { 
       return  strlen($doc) == $limit && is_numeric($doc) ? str_split($doc) : []; 
    }

     /**
     * Verificar se todos os valores da matriz são iguais.
     * @param array $data
     * @access private
     * 
     * @return bool
     */
    private function isAllValueEqual(array $data)
    {
         $value =  count(array_unique($data)); 
         return $value <= 1 ? true : false;  
    }
      
}
