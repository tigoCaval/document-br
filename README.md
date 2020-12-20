# Documentos BR
Validar CPF e CNPJ 

## Utilizando com Laravel/composer
- Install:  ```composer require tigo/documentbr```
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
