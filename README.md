Pronto grande Teacher! Aqui a abaixo ta toda a parte do banco de dados 
Print---- Diagrama ![image](https://github.com/user-attachments/assets/5ae33fc3-0040-4084-9cc4-73f07d24aebf)
Print---- Criptografia Senha Usuarios-- ![image](https://github.com/user-attachments/assets/45313ddc-5501-44d0-b640-efd050573a1e)
Print---- Modal do Editar Funcionários "Consertada"----![image](https://github.com/user-attachments/assets/917cec37-e9d6-4398-a82f-8b8f11e753e1)
Print---- Painel Administração ![image](https://github.com/user-attachments/assets/7efbfdf8-67f6-439f-a5d5-17cc070406d9)


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
