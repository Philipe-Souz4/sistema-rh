# 🏢 Sistema de Gestão de RH - Yii2

Este é um sistema de **gerenciamento de funcionários e cargos**
desenvolvido como parte de um desafio técnico. O projeto utiliza o
framework **Yii2 (Basic)** com banco de dados **PostgreSQL**.

------------------------------------------------------------------------

# 🚀 Funcionalidades

## 📌 Gestão de Cargos

-   Cadastro de cargos
-   Edição de cargos
-   Visualização de cargos
-   Exclusão de cargos

## 👨‍💼 Gestão de Funcionários

-   Cadastro completo de funcionários
-   Vínculo obrigatório com um cargo
-   Validação de **CPF único com 11 dígitos**
-   Máscaras de entrada para **CPF** e **CEP**
-   Formatação automática na listagem (exibição do **nome do cargo em
    vez do ID**)

## 🎨 Interface Otimizada

-   Sistema **100% em Português (pt-BR)**
-   Colunas de ação alinhadas e estilizadas
-   Layout limpo e focado no usuário

------------------------------------------------------------------------

# 🛠️ Tecnologias Utilizadas

-   **Framework:** Yii2 Framework
-   **Linguagem:** PHP 8.x
-   **Banco de Dados:** PostgreSQL
-   **Frontend:** Bootstrap 5 (via Yii2)
-   **Extensões:**
    -   `yii2-widgets-maskedinput` para máscaras de formulário

------------------------------------------------------------------------

# 📦 Como Instalar

## 1️⃣ Clonar o repositório

``` bash
git clone https://seu-repositorio.git
cd nome-do-projeto
```

------------------------------------------------------------------------

## 2️⃣ Instalar dependências

``` bash
composer install
```

------------------------------------------------------------------------

## 3️⃣ Configurar o Banco de Dados

No arquivo:

    config/db.php

Configure as credenciais do PostgreSQL:

``` php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=nome_do_banco',
    'username' => 'seu_usuario',
    'password' => 'sua_senha',
    'charset' => 'utf8',
];
```

------------------------------------------------------------------------

## 4️⃣ Importar o Schema (SQL)

Crie as tabelas utilizando os scripts abaixo:

``` sql
CREATE TABLE cargo (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE funcionario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    cep VARCHAR(8),
    logradouro VARCHAR(150),
    numero VARCHAR(10),
    complemento VARCHAR(150),
    cidade VARCHAR(150),
    estado VARCHAR(2),
    cargo_id INTEGER NOT NULL,
    FOREIGN KEY (cargo_id) REFERENCES cargo (id)
);
```

------------------------------------------------------------------------

# ⚙️ Configurações Aplicadas

### 🌎 Idioma

Configurado para **pt-BR** em:

    config/web.php

### 🔢 Máscaras de Campos

Aplicadas via **MaskedInput** nos campos:

-   CPF
-   CEP

No formulário de funcionários.

### 🧱 Arquitetura

O sistema segue o padrão **MVC** do Yii2:

-   **Models:** Regras de negócio e validações
-   **Controllers:** Controle das ações
-   **Views:** Interface com o usuário

Relacionamento entre **Funcionário → Cargo** implementado com:

``` php
hasOne()
```

para exibir o **nome do cargo nas listagens**.

------------------------------------------------------------------------

# 👨‍💻 Philipe Souza

Projeto desenvolvido como **desafio técnico** utilizando Yii2 e
PostgreSQL.