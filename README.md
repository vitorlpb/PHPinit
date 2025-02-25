# Configurando o Ambiente PHP + Docker + Nginx

## 1. Instalar o Docker
Se ainda não possui o Docker instalado, faça o seguinte:

### Windows:
1. pare AGORA de usar isso

### Linux (Ubuntu/Debian):
```bash
sudo apt update
sudo apt install -y docker.io docker-compose
```
Adicione seu usuário ao grupo Docker (evita a necessidade de sudo o tempo todo):
```bash
sudo usermod -aG docker $USER
```

## Iniciar os containers
Para subir o ambiente:
```bash
docker-compose up -d --build
```

## Acessar o projeto no navegador
O servidor estará disponível em:
[http://localhost:8000](http://localhost:8000)

## Parar os containers
Para parar os containers sem remover os dados:
```bash
docker-compose down
```

## Executar comandos dentro do container do PHP
Para acessar o terminal do container PHP:
```bash
docker exec -it app bash
```