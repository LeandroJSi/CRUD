# CRUD

#CRUD estacionamento

**Objetivo:** Controlar o acesso de pessoas a um estacionamento via consulta de dados cadastrados no sistema.

Para executar esse projeto antes deve ser feita a criação do banco de dados usando o arquivo .sql contido no repositório.

Nesse sistema há dois tipos de usuários, sendo administrador e usuário comum.
Usuário comum consiste no fiscal que irá permitir ou não o acesso ao estacionamento, enquanto o administrador poderá além disso editar, excluir e cadastrar novos clientes.
Abaixo há um email de conta adminstrador e outro de usuário respectivamente:

**Email:**Adminstrador@gmail.com
**Senha:** admin

**Email:**User@gmail.com	
**Senha:**usuario
 Devido a falta de apresentação dos clientes cadastrados, para realizar testes com consulta de clientes será necessário inserir o CPF do cliente cadastrado abaixo há alguns exemplos de CPF cadastrados

**CPF1**39014892370

**CPF2** 41825341413

**Arquivos:**
CRUD.sql: esse é o arquivo necessário para a criação do banco de dados
/Class1 dentro desta pasta encontram-se todos os demais arquivos do sistema 

**Observação:** nesse sistema o cadastro de usuário como adminstrador só é possivel através da inserção direta do banco de dados, por padrão ao cadastrar usuário ele já será do tipo "fiscal", todavia no banco de dados possui um usuário administrador para que possam ser realizados os testes de sistema.
