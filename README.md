# Atividade Avaliativa 2 - Sistema de Ranking em PHP (com MySQLi Procedural)

Este repositório contém uma aplicação simples desenvolvida em **PHP com MySQLi procedural**, que permite cadastrar itens com nota e exibi-los em formato de **ranking Top 10**. Os itens são classificados por categorias como **Filmes, Músicas, Livros ou Jogos**.

A aplicação segue os requisitos da segunda atividade avaliativa da disciplina de **Programação Web**.

## ✅ Funcionalidades

- Cadastro de itens com:
  - Nome
  - Nota (de 0 a 10)
  - Tipo (Filmes, Músicas, Livros, Jogos)
- Exibição dos 10 itens com maior nota (ranking)
- Validação de campos obrigatórios
- Estrutura dividida em arquivos separados, conforme solicitado:
  - `index.php`: formulário de cadastro
  - `salvar.php`: gravação no banco de dados
  - `listar.php`: exibição do ranking
  - `conexao.php`: conexão com MySQL
- Banco de dados em arquivo `entradas.sql` exportado via phpMyAdmin

## 🛠 Banco de Dados

Use o conteúdo do arquivo `sql.txt` para criar a estrutura no **phpMyAdmin**:

- Crie um banco de dados chamado `ranking`
- Execute o conteúdo de `sql.txt` para criar a tabela `entradas`

## ▶️ Como Executar

1. Clone ou baixe este repositório.
2. Coloque os arquivos em um servidor local como **XAMPP** ou **WampServer**.
3. No **phpMyAdmin**:
   - Crie o banco `ranking`
   - Importe o arquivo `sql.txt`
4. Acesse no navegador:
/localhost/ranking/index.php


## 🧪 Tecnologias Utilizadas

- PHP (MySQLi Procedural)
- MySQL
- HTML

---

Marcela dos Santos Gorge  
**RGM:** 34408088
