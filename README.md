# Documentos BR - Validador CPF e CNPJ
Validação de CPF e CNPJ 

- Observação: este pacote pode ser utilizado com Laravel/composer ou em qualquer aplicação PHP.
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

Licença MIT. Veja o arquivo [License](https://github.com/tigoCaval/document-br/blob/main/LICENSE).

---

[Donate/Doar](https://www.paypal.com/donate?hosted_button_id=QAANKJUX8M8LG) - 
Olá! Se você achou este pacote útil, considere fazer uma [doação](https://www.paypal.com/donate?hosted_button_id=QAANKJUX8M8LG). Fique à vontade para contribuir ou não.
