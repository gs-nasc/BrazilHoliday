# Brazil Holiday
Brazil Holiday é uma biblioteca PHP que diz se um dia é ou não feriado, por enquanto temos só os feriados mais importantes mas estamos em constante atualização e sempre adicionando novos feriados!

[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=gs-nasc_BrazilHoliday&metric=bugs)](https://sonarcloud.io/dashboard?id=gs-nasc_BrazilHoliday)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=gs-nasc_BrazilHoliday&metric=code_smells)](https://sonarcloud.io/dashboard?id=gs-nasc_BrazilHoliday)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=gs-nasc_BrazilHoliday&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=gs-nasc_BrazilHoliday)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=gs-nasc_BrazilHoliday&metric=security_rating)](https://sonarcloud.io/dashboard?id=gs-nasc_BrazilHoliday)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=gs-nasc_BrazilHoliday&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=gs-nasc_BrazilHoliday)
<a target='_blank' href="https://www.codefactor.io/repository/github/gs-nasc/brazilholiday">
  <img src="https://www.codefactor.io/Content/badges/APlus.svg"/>
</a>

# Começando

### Instalando

A biblioteca pode ser instalada pelo composer (e é o mais recomendado), o comando para instalar é este abaixo:

```composer
composer require gs-nasc/brazil-holiday
```

via [Packagist](https://packagist.org/packages/gs-nasc/brazil-holiday)

### Implementando

A biblioteca é de fácil implementação e utilização abaixo estão códigos de exemplo:<br>
Obs.  **<b>lembre-se de carregar o autoload do composer</b>**

#### Qualquer data

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
// Somente feriados que não são dias úteis (Ex: Natal)
$holiday->load(2021);

// Todos os feriados ( Ex: Dia da Bandeira )
$holiday->load(2021, "all");

// troque 2021 pelo ano que irá utilizar

// No lugar de 01/01/2021 coloque a data que você quer 
//saber se é feriado, siga o padrão que está ali!
$date = DateTime::createFromFormat('d/m/Y', '01/01/2021');

// Finalmente verificamos se é ou não feriado
$feriado = $holiday->isHoliday($date);

echo  ($feriado) ? "Feriado " . $feriado->title : "Não é feriado";

// OU

if($feriado) {
    $foo = "Feriado " . $feriado->title;
}else{
    $foo = "Não é feriado";
}


echo $foo;

```

#### Hoje

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
// Somente feriados que não são dias úteis (Ex: Natal)
$holiday->load(2021);

// Todos os feriados ( Ex: Dia da Bandeira )
$holiday->load(2021, "all");

// troque 2021 pelo ano que irá utilizar

// Finalmente verificamos se é ou não feriado
$feriado = $holiday->todayHoliday($date);

echo  ($feriado) ? "Feriado " . $feriado->title : "Não é feriado";

// OU

if($feriado) {
    $foo = "Feriado " . $feriado->title;
}else{
    $foo = "Não é feriado";
}


echo $foo;
```

#### Amanhã

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
// Somente feriados que não são dias úteis (Ex: Natal)
$holiday->load(2021);

// Todos os feriados ( Ex: Dia da Bandeira )
$holiday->load(2021, "all");

// troque 2021 pelo ano que irá utilizar

// Finalmente verificamos se é ou não feriado
$feriado = $holiday->tomorrowHoliday($date);

echo  ($feriado) ? "Feriado " . $feriado->title : "Não é feriado";

// OU

if($feriado) {
    $foo = "Feriado " . $feriado->title;
}else{
    $foo = "Não é feriado";
}


echo $foo;
```

#### Ontem

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
// Somente feriados que não são dias úteis (Ex: Natal)
$holiday->load(2021);

// Todos os feriados ( Ex: Dia da Bandeira )
$holiday->load(2021, "all");

// troque 2021 pelo ano que irá utilizar

// Finalmente verificamos se é ou não feriado
$feriado = $holiday->yesterdayHoliday($date);

echo  ($feriado) ? "Feriado " . $feriado->title : "Não é feriado";

// OU

if($feriado) {
    $foo = "Feriado " . $feriado->title;
}else{
    $foo = "Não é feriado";
}


echo $foo;
```

Quando é feriado a biblioteca retorna um objeto com os seguintes atributos:
- title (Título do feriado. Ex: Ano Novo)
- date (Data do feriado. Ex: 01/01/2021)
- type (Tipo do feriado. Ex: Feriado Nacional)

Quando não é feriado a biblioteca retorna ```false```

# Como ajudar?

Se você está sentindo falta de algum feriado ou quer arrumar algum bug que encontrou siga os passos abaixo:

## Adicionar novo feriado

### Feriado Fixo

Para adicionar um novo feriado fixo (Ex: Natal) é só fazer um fork deste respositório e editar o arquivo [dates.json](https://github.com/gs-nasc/BrazilHoliday/blob/main/src/dates.json) que se econtra na pasta ```src/``` seguindo seus padrões, quando terminar é só fazer um Pull Request que eu analizarei o pedido e caso se enquadre na Biblioteca adicionarei no projeto.

### Feriado Móvel

Para adicionar um novo feriado móvel basta abrir uma Issue dizendo qual o feriado que eu buscarei um método de adiciona-lo no projeto

## Arrumar Bug

Caso queira arrumar algum bug é só fazer fork do projeto, arrumar o bug e fazer testes para ver se tudo continua funcionando, caso tudo funcione fazer um Pull Request para ser implementado.

## Tabela de Feriados Disponíveis
|                                        	| Status 	|
|----------------------------------------	|--------	|
| Ano Novo                               	| ✔️      	|
| Dia Internacional da Mulher            	| ✔️      	|
| Dia da Mentira                         	| ✔️      	|
| Dia do Índio                           	| ✔️      	|
| Tiradentes                             	| ✔️      	|
| Descobrimento do Brasil                	| ✔️      	|
| Dia do Trabalhador                     	| ✔️      	|
| Dia da Abolição da Escravatura         	| ✔️      	|
| Dia Mundial do Meio Ambiente           	| ✔️      	|
| Dia dos Namorados                      	| ✔️      	|
| Dia de São João                        	| ✔️      	|
| Dia do Amigo                           	| ✔️      	|
| Dia dos Avós                           	| ✔️      	|
| Dia do Estudante                       	| ✔️      	|
| Dia do Folclore                        	| ✔️      	|
| Dia do Soldado                         	| ✔️      	|
| Independência do Brasil                	| ✔️      	|
| Dia da Árvore                          	| ✔️      	|
| Dia Internacional da Paz               	| ✔️      	|
| Dia das Crianças                       	| ✔️      	|
| Nossa Senhora Aparecida                	| ✔️      	|
| Dia do Professor                       	| ✔️      	|
| Dia Nacional do Livro                  	| ✔️      	|
| Halloween                              	| ✔️      	|
| Finados                                	| ✔️      	|
| Proclamação da República               	| ✔️      	|
| Dia da Bandeira                        	| ✔️      	|
| Dia Nacional da Consciência Negra      	| ✔️      	|
| Dia Internacional dos Direitos Humanos 	| ✔️      	|
| Véspera de Natal                       	| ✔️      	|
| Natal                                  	| ✔️      	|
| Véspera de Ano Novo                    	| ✔️      	|
| Carnaval                               	| ✔️      	|
| Páscoa                                 	| ✔️      	|
| Sexta-Feira Santa                      	| ✔️      	|
| Corpus Christ                          	| ✔️      	|
| Dia da Mães                            	| ✔️      	|
| Dia dos Pais                           	| ✔️      	|
| Dia do Servidor Público                 | ✔️        |

