![image](https://github.com/user-attachments/assets/ccdc760a-43cf-4966-8b7f-fa87730a502a)![image](https://github.com/user-attachments/assets/26c6c5f1-8e02-46fd-9c2f-e950fe015ed3)Pronto grande Teacher! Lá no final tem toda a parte do banco de dados!
Print---- Diagrama ![image](https://github.com/user-attachments/assets/5ae33fc3-0040-4084-9cc4-73f07d24aebf)
Print---- Criptografia Senha Usuarios-- ![image](https://github.com/user-attachments/assets/45313ddc-5501-44d0-b640-efd050573a1e)
Print---- Modal do Editar Funcionários "Consertada"----![image](https://github.com/user-attachments/assets/917cec37-e9d6-4398-a82f-8b8f11e753e1)
Print---- Painel Administração ![image](https://github.com/user-attachments/assets/7efbfdf8-67f6-439f-a5d5-17cc070406d9)
Comprovação de tudo que foi pedido questão por questão logo a baixo.:
Print---- Tela Inicial, onde aparece somente o botão entrar: ![image](https://github.com/user-attachments/assets/d990bc0d-6530-491f-9f9f-c9a18f30d0f2)
Print---- Após Logar aparece o Botão Adiministração ![image](https://github.com/user-attachments/assets/77b3dba3-74d4-44cb-abb0-dc7e04f266d8)
Print---- Area Administrativa ![image](https://github.com/user-attachments/assets/ce4e078b-9fa4-4c82-b353-fba273c5ff91)
Print---- Area Gerenciar Equipe(editar, visualizar ou excluir) ![image](https://github.com/user-attachments/assets/5103283a-a7b0-4987-a8a6-3f80fe5bf739)
Print---- Area Editar Funcionario ![image](https://github.com/user-attachments/assets/71a4e981-44fd-428c-8f59-0e9c5481e867)
Print---- Mural de Funcionários ![image](https://github.com/user-attachments/assets/a930bc95-11d4-4846-9cce-5fa0cb7c6e32)
Print---- Area Cadastrar Bolos (restrita a usuarios) ![image](https://github.com/user-attachments/assets/d475225f-8dd9-4ac7-aad3-007b12c06519)
Print---- Area Gerenciar Bolos(editar, visualizar ou excluir)![image](https://github.com/user-attachments/assets/c8efac4e-cffb-4f09-80f9-547617fed441)
Print---- Area Editar Bolos ![image](https://github.com/user-attachments/assets/20f4d574-f75d-4c81-abaf-7136885c693a)
Print---- Area Catalogo Bolos ![image](https://github.com/user-attachments/assets/ea835fa0-1797-4970-873a-211050fcb7f3)


-- Criando o Banco de Dados!

CREATE DATABASE IF NOT EXISTS bolos;
USE bolos;

-- Tabela de Funcionários
CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto_perfil VARCHAR(255),
    funcao VARCHAR(100) NOT NULL
);

-- Inserção de exemplo na tabela de Funcionários
INSERT INTO funcionarios (nome_usuario, senha, foto_perfil, funcao) VALUES
('Joaquim Carvalho', '1234', 'https://i.ibb.co/WpNLfm0/Imagem-do-Whats-App-de-2024-11-26-s-04-03-09-1a887249.jpg', 'Gerente Geral'),
('Erik Marques', '1234', 'https://avatars.githubusercontent.com/u/47763378?v=4', 'Gerente T.I');

-- Tabela de Bolos
CREATE TABLE bolos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    ingredientes TEXT NOT NULL,
    url_imagem VARCHAR(255) NOT NULL
);

-- Inserção de exemplos na tabela de Bolos
INSERT INTO bolos (nome, descricao, ingredientes, url_imagem) VALUES
('Pistache com Morango e Leite Condensado', 'Pistache com morango e leite condensado: Bolo de massa branca, recheios de trufa de pistache e leite condensado com morango, cobertura de trufa de pistache, pistache granulado, morango e Moça base.', 'Contém trigo, leite e derivados, pistache, avelãs e derivados de soja. CONTÉM GLÚTEN. CONTÉM LACTOSE. ALTO EM GORDURA SATURADAS.', 'https://cdn.sodiedoces.com.br/wp-content/uploads/2024/10/21121649/Bolo-Pistache-com-Morango-1.png'),
('Fubá com Goiabada', 'Bolo de fubá com goiabada e cobertura de goiabada cremosa.', 'Contém Glúten e Lactose. Alérgicos: contém farinha de trigo, leite e derivados, ovos. Pode conter amendoim, nozes, castanha-de-caju, amêndoa e avelã.', 'https://cdn.sodiedoces.com.br/wp-content/uploads/2021/10/25112541/Fuba_Goiabada.png'),
('Brigadeiro Tradicional Zero Açúcar', 'Bolo de massa integral sabor chocolate, recheio de brigadeiro zero açúcar, cobertura de trufado de chocolate ao leite zero açúcar, finalizado com brigadeiro (docinho) zero açúcar.', 'Imagem meramente ilustrativa. Alérgicos: contém farinha integral, leite e derivados, ovos e soja. Pode conter amêndoa, amendoim, avelã, castanha-de-caju e nozes. Contém açúcares próprios dos ingredientes. CONTÉM GLÚTEN. CONTÉM LACTOSE.', 'https://cdn.sodiedoces.com.br/wp-content/uploads/2024/01/22093515/151-Brigadeiro-Tradicional-INTEIRO-IMG_6868_540x400px.png');

-- Tabela de Mensagens de Contato
CREATE TABLE mensagens_contato (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


