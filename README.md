# Documentos BR - Validador e Gerador de CPF e CNPJ
Validar e Gerar CPF/CNPJ 

- Observação: este pacote pode ser utilizado com Laravel/composer ou em qualquer aplicação PHP.
- Baixar pacote:  ```composer require tigo/documentbr```
- Sintaxe exemplo:

Em algum lugar do seu projeto, pode ser necessário usar o autoload
 ```php
 include __DIR__ ."/vendor/autoload.php";
 ```
```php
use Tigo\DocumentBr\Cpf; //import class 
use Tigo\DocumentBr\Cnpj; //import class 

$cpf = new Cpf(); 
var_dump($cpf->check('00000000000')); // verifica se o cpf é válido, caso seja válido retorne true
var_dump($cpf->generate());// gerar cpf válido

$cnpj = new Cnpj();
var_dump($cnpj->check('00000000000000')); // verifica se o cnpj é válido, caso seja válido retorne true
var_dump($cnpj->generate());// gerar cnpj válido
 ```
## Projeto Exemplo
   Exemplo de um projeto utilizando este pacote: [tigoCaval/example-documentbr](https://github.com/tigoCaval/example-documentbr)
## Licença

Licença MIT. Veja o arquivo [License](https://github.com/tigoCaval/document-br/blob/main/LICENSE).

---

Olá! Se você achou este pacote útil, considere fazer uma [doação](https://www.paypal.com/donate?hosted_button_id=GNFS3L3FRC9K8). Fique à vontade para contribuir ou não.

[![paypal](https://www.paypalobjects.com/pt_BR/i/btn/btn_donate_SM.gif)](https://www.paypal.com/donate?hosted_button_id=GNFS3L3FRC9K8) 
