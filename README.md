# Brazil Holiday
Brazil Holiday é uma biblioteca PHP que diz se um dia é ou não feriado, por enquanto temos só os feriados mais importantes mas estamos em constante atualização e sempre adicionando novos feriados!

# Começando

### Instalando

A biblioteca pode ser instalada pelo composer (e é o mais recomendado), o comando para instalar é este abaixo:

```composer
composer require gs-nasc/brazil-holiday
```

### Implementando

A biblioteca é de fácil implementação e utilização abaixo estão códigos de exemplo:<br>
Obs.  **<b>lembre-se de carregar o autoload do composer</b>**

#### Qualquer data

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
$holiday->load(2021);

// No lugar de 01/01/2021 coloque a data que você quer 
//saber se é feriado, siga o padrão que está ali!
$date = DateTime::createFromFormat('d/m/Y', '01/01/2021');

// Finalmente verificamos se é ou não feriado
if($holiday->isHoliday($date)){
  $foo = "É feriado";
}else{
  $foo = "Não é feriado";
}

echo $foo;

// Método if curto

echo $holiday->isHoliday($date) ? "É feriado" : "Não é feriado";

```

#### Hoje

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
$holiday->load(2021);

// Verificamos se hoje é ou não feriado
if($holiday->todayHoliday()){
  $foo = "É feriado";
}else{
  $foo = "Não é feriado";
}

echo $foo;

// Método if curto

echo $holiday->todayHoliday() ? "É feriado" : "Não é feriado";

```

#### Amanhã

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
$holiday->load(2021);

// Verificamos se amanhã vai ser ou não feriado
if($holiday->tomorrowHoliday()){
  $foo = "É feriado";
}else{
  $foo = "Não é feriado";
}

echo $foo;

// Método if curto

echo $holiday->tomorrowHoliday() ? "É feriado" : "Não é feriado";

```

#### Ontem

```php

use BrazilHoliday\Holiday;

$holiday = new Holiday();

// Aqui carregamos o ano que vamos usar para encontrarmos o feriado
$holiday->load(2021);

// Verificamos se ontem foi ou não feriado
if($holiday->yesterdayHoliday()){
  $foo = "É feriado";
}else{
  $foo = "Não é feriado";
}

echo $foo;

// Método if curto

echo $holiday->yesterdayHoliday() ? "É feriado" : "Não é feriado";

```

## Tabela de Feriados Disponíveis
| Holiday                  	| Status 	|
|--------------------------	|--------	|
| Ano Novo                 	| ✔️    	|
| Tiradentes               	| ✔️     	|
| Dia do Trabalho          	| ✔️     	|
| Independência do Brasil  	| ✔️      |
| Nossa Senhora Aparecida  	| ✔️     	|
| Finados                  	| ✔️     	|
| Proclamação da República 	| ✔️     	|
| Véspera de Natal         	| ✔️     	|
| Natal                    	| ✔️     	|
| Véspera de Ano Novo      	| ✔️     	|
