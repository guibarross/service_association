# Service Association

## Documentação de Instalação e Configuração

### Pré-requisitos:

Antes de iniciar a instalação do Service Association, certifique-se de que seu ambiente atenda aos seguintes pré-requisitos:

1. **PHP:** Garanta que o PHP esteja instalado e configurado nas variáveis de sistema.
2. **Composer:** Certifique-se de ter o Composer instalado em seu sistema.
3. **Git:** Tenha o Git instalado para clonar o repositório.
4. **Node.js:** Instale o Node.js, preferencialmente na versão LTS.

### Instalação:

Siga as etapas abaixo para configurar e executar o Service Association em seu ambiente local:

1. **Clone o Repositório:**
   ```bash
   git clone https://github.com/seu-usuario/service-association.git

2. **Crie o Banco de Dados:**
   - Execute o banco de dados local para o projeto, garantindo que ele esteja vazio.
   - Configure o arquivo .env com o nome do banco de dados criado anteriormente.

3. **Instale as Dependências:**
   - Acesse a pasta do projeto no terminal:
   cd (caminho local da pasta que armazena o projeto)

   -Execute os seguintes comandos:
   npm install
   composer install

4. **Compilação e Execução:**
   - Para compliar os ativos front-end execute o comando abaixo no terminal:
     npm run dev
     
   - Para iniciar o servidor Laravel execute o comando abaixo no terminal:
     php artisan serve

**Após realizar estes passos, a aplicação estará disponível em http://localhost:8000. Certifique-se de ajustar a porta conforme necessário.**    

### Controle de Perfis:

O **Service Association** possui um sistema de controle de perfis, no qual os usuários administradores são identificados pelo valor **'1'** na coluna **'is_admin'** da tabela **'users'**. Para tornar um usuário administrador, basta alterar o valor da coluna **'is_admin'** no banco de dados da tabela **'users'**.

### Recursos Principais:
O **Service Association** oferece diversos recursos, incluindo:

- **Diversidade de Serviços:** Uma ampla gama de serviços em diferentes setores.
- **Associação Simples:** Facilidade para os usuários se associarem aos serviços desejados.
- **Gerenciamento de Associações:** Interface intuitiva para que os usuários possam gerenciar suas associações.
- **Controle de Perfis:** Sistema de controle de perfis, com usuários administradores e operacionais.
- **Layout Responsivo:** Todo o sistema foi desenvolvido para se adaptar a diferentes dispositivos e telas.

 ### Tecnologias Utilizadas:
- O projeto é desenvolvido em **Laravel**, aproveitando sua robustez e facilidade de manutenção. Adotamos boas práticas de desenvolvimento para garantir segurança e desempenho. Para estilização das telas, foi utilizado o framework Bootstrap.


   
