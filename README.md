# Sobre o Projeto
Projeto criado por mim para registrar o que eu fiz durante o dia, eu tinha um grande problema de não lembrar o que eu fiz durante o dia na reunião diaria da empresa então eu fiz esse software só para registrar as atividades e no final do dia eu saber o que falar.

Criar sistema para registrar todas as atividades realizadas no dia, desde reunião a verificações e implementações
- [x] criar aplicação
- [x] modelar tabelas
- [x] adicionar layout
- [x] criar autenticação
- [x] criar telas de cadastro
- [ ] analisar como criar sistema pomodoro integrado com alertas
- [ ] criar sistema de pomodoro para que o sistema 
- [ ] Criar API basica
- [ ] Planejar sistema de planejamento de sprint para integrar

## Installation

1. Baixe o [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Rode o comando `php composer.phar install` na pasta rais do projeto.

Se o composer estiver instalado globalmente rode

```bash
composer install
```
## Configuration

Leia e edite o arquivo de configuração `config/app_local.php` e configure a 
`'Database'` outras configurações importantes podem ser feitas em `config/app.php`.

Depois disso basta rodar o servidor integrado

```bash
bin/cake server -p 8765
```

então acesse `http://localhost:8765` para visualizar a pagina inicial do projeto.



## Layout
Esta aplicação utilizou:

[Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.
[Cakephp](https://cakephp.org/) (4.x) Framework em php
