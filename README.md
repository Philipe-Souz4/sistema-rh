# 🏢 Sistema de Gestão de RH - Yii2

Sistema de gerenciamento de funcionários e cargos desenvolvido com **Yii2 (Basic)** e **PostgreSQL**.

## 📌 Links Úteis
- **Prints do Sistema:** [Abrir pasta de imagens](./prints)
- **Minhas Anotações:** [Notion - Estudo Yii2](https://www.notion.so/YII2-2b2f3fe951ae80d8ad1acc82f2fca196)

---

## 🚀 Funcionalidades Principais
* **Gestão de Cargos:** CRUD completo de cargos.
* **Gestão de Funcionários:** Cadastro com vínculo obrigatório a um cargo.
* **Validações:** CPF único com 11 dígitos e máscaras de entrada (CPF/CEP).
* **Interface pt-BR:** Sistema totalmente em português e formatado para o usuário brasileiro.

---

## 🛠️ Tecnologias
* **PHP 8.x** + **Yii2 Framework**
* **PostgreSQL**
* **Bootstrap 5**

---

## 📦 Como Instalar e Rodar

### 1. Clonar o repositório
```bash
git clone [https://github.com/Philipe-Souz4/sistema-rh.git](https://github.com/Philipe-Souz4/sistema-rh.git)
cd sistema-rh
```
### 2. Configurar o Banco de Dados
Edite o arquivo config/db.php com suas credenciais do PostgreSQL

### 3. Instalação Automática
Para facilitar a instalação das dependências (Composer) e a criação das tabelas (Migrations), utilize os instaladores na raiz:

- No Windows: Execute o arquivo instalar.bat
- No Linux/Mac: Execute o arquivo instalar.sh

### 4. Após a instalação, inicie o servidor interno do Yii:
```bash
php yii serve
```
### 👨‍💻 Desenvolvido por
Philipe Souza - Desafio Técnico
