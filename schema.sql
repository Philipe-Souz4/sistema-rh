CREATE TABLE cargo (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE funcionario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    logradouro VARCHAR(150),
    cep VARCHAR(8),
    cidade VARCHAR(100),
    estado VARCHAR(2),
    numero VARCHAR(10),
    complemento VARCHAR(100),
    cargo_id INTEGER NOT NULL,
    CONSTRAINT fk_cargo FOREIGN KEY (cargo_id) REFERENCES cargo (id)
);