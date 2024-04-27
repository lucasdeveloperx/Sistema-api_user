# Sistema de API_USER

Este é um projeto desenvolvido para fins de estudo, visando entender o processo de criação de uma API de usuário simples utilizando PHP e MySQL.

![Cadastro de Usuário](https://media.discordapp.net/attachments/1064561225473736859/1233923152099147846/image.png?ex=662edbfc&is=662d8a7c&hm=5625de3badac19f785793bd38e24d6c80f1bda9c33b6c9cfc0bca0b3af5604e8&=&format=webp&quality=lossless&width=915&height=431)

## Funcionalidades

- Cadastro de usuários com nome, telefone, CPF e usuário.
- Geração automática de chave de API_USER para cada usuário cadastrado.
- Verificação de usuários com base na chave de API_USER fornecida.
- Exibição das informações do usuário encontrado.

## Tecnologias Utilizadas

- **PHP:** Utilizado para processamento dos formulários, interação com o banco de dados e geração da chave de API_USER.
- **MySQL:** Banco de dados utilizado para armazenar os dados dos usuários.
- **HTML:** Utilizado para estruturar os formulários de cadastro e verificação.
- **CSS:** Adicionado para fornecer uma aparência mais agradável aos formulários.

## Funcionamento do Código

### `registro.php`

Este arquivo contém um formulário HTML para o cadastro de usuários. Quando o formulário é submetido, o script PHP processa os dados recebidos e os insere no banco de dados. Além disso, uma chave de API_USER única é gerada para cada usuário cadastrado.

### `verificar-chave.php`

Neste arquivo, há outro formulário HTML onde os usuários podem inserir sua chave de API_USER para verificar suas informações. O script PHP consulta o banco de dados em busca da chave fornecida e, se encontrada, exibe as informações do usuário correspondente.

## Instalação e Uso

1. Clone este repositório para o diretório do seu servidor web.
2. Importe o arquivo `database.sql` para criar a tabela necessária no banco de dados.
3. Acesse `registro.php` no seu navegador para cadastrar novos usuários.
4. Acesse `verificar-chave.php` para verificar as informações do usuário com base na chave de API_USER.

## Propósito

Este projeto foi criado para fins de estudo, permitindo que os desenvolvedores pratiquem conceitos básicos de desenvolvimento web com PHP e MySQL, incluindo manipulação de formulários, interação com bancos de dados e geração de chaves de API.

## Contribuindo

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou pull requests para melhorias no projeto.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
