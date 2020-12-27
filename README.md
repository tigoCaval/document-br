# Documentos BR - Validador CPF e CNPJ
Validação de CPF e CNPJ 
## Utilizando com Laravel/composer
- Observação: este pacote pode ser utilizado em qualquer aplicação PHP.
- Baixar pacote:  ```composer require tigo/documentbr```
- Sintaxe exemplo:
```php
use Tigo\Cpf; //import class 
use Tigo\Cnpj; //import class 

$cpf = new Cpf(); 
var_dump($cpf->check('00000000000')) // verifica se o cpf é válido, caso seja válido retorne true
var_dump($cpf->generate());// gerar cpf válido

$cnpj = new Cnpj();
var_dump($cnpj->check('00000000000000')) // verifica se o cnpj é válido, caso seja válido retorne true
var_dump($cnpj->generate());// gerar cnpj válido

 ```
## Licença

[MIT license](https://opensource.org/licenses/MIT).
