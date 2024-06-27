*Projeto de Fórum Técnico com Laravel*

Este projeto foi desenvolvido como parte do curso de Técnicas Avançadas de Programação, utilizando o padrão Model View Controller (MVC) com Laravel. O objetivo é criar um fórum técnico com as seguintes funcionalidades:
*Incompleto
Telas:

**1. Tela de Login:**
        Permite que usuários registrados entrem na plataforma.
        Autenticação segura utilizando Laravel Passport ou similar.

**2. Registro:**
        - Permite que novos usuários se registrem na plataforma.
        - Validação de dados para garantir informações corretas e seguras.

**3. Ver Perfil de Usuário:**
        - Exibe informações detalhadas sobre o perfil do usuário logado.
        - Mostra dados como nome, foto de perfil, informações pessoais, etc.

**4. Ver Todos os Usuários:**
        - Lista todos os usuários registrados na plataforma.
        - Opção de buscar usuários específicos por nome ou filtro.

**5. Banir e Suspender Conta (Moderador):**
        - Rota: http://127.0.0.1:8000/users/{id}/moderator
        - Funcionalidade disponível apenas para moderadores ou administradores.
        - Permite banir temporariamente ou suspender permanentemente contas de usuário.

**6. Editar Usuário / Deletar (Botão):**
        - Permite que usuários editem suas próprias informações de perfil.
        - Administradores têm a opção de deletar contas de usuário, se necessário.

**Erros:**
    - UI fraca e com erros;
    - Não há opções de tags, topicos e posts;
    - Erros no menu em algumas blades;
