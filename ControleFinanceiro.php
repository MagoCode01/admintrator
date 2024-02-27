<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | Organização Financeira</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .inputBox {
            margin-bottom: 20px;
            position: relative;
        }

        .inputUser, .selectUser, .textareaUser {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .labelInput {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #888;
            transition: all 0.3s ease;
        }

        .inputUser:focus + .labelInput,
        .inputUser:not(:placeholder-shown) + .labelInput {
            top: -10px;
            left: 10px;
            font-size: 12px;
            color: #333;
            background-color: #fff;
            padding: 0 5px;
        }

        .fileInput {
            display: none;
        }

        .fileLabel {
            display: inline-block;
            background-color: dodgerblue;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        #submit {
            background-color: dodgerblue;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }

        #submit:hover {
            background-color: #0b5ed7;
        }

        .buttonContainer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .buttonContainer button {
            flex: 1;
            margin: 0 5px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buttonContainer button:hover {
            background-color: #0b5ed7;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }

            .inputUser, .selectUser, .textareaUser {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Formulário de Organização Financeira</h1>
        <form id="financeForm" action="transiction.html" method="post" enctype="multipart/form-data">
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome</label>
            </div>
            <input type="number" name="valor" id="valorInput" class="inputUser" required placeholder="Valor (R$)">
            <select name="tipo" id="tipoInput" class="selectUser" required>
                <option value="receita">Receita</option>
                <option value="despesa">Despesa</option>
            </select>
            <textarea name="descricao" id="descricaoInput" class="textareaUser" rows="4" placeholder="Descrição"></textarea>
            <input type="file" name="fileInput" id="fileInput" class="fileInput" accept="image/*,.pdf,.txt">
            <label for="fileInput" class="fileLabel">Anexar arquivo</label>
            <input type="button" id="submit" value="Salvar Transação">
        </form>
        <div class="buttonContainer">
            <button id="redirectButton" onclick="window.location.href='transiction.html';">Ver Transações</button>
            <button id="backButton" onclick="window.location.href='home.php.html';">Voltar</button>
        </div>
    </div>

    <ul id="transactionList"></ul>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("submit").addEventListener("click", function(event) {
                event.preventDefault(); // Evitar que o formulário seja enviado

                var nome = document.getElementById("nome").value;
                var valor = document.getElementById("valorInput").value;
                var tipo = document.getElementById("tipoInput").value;
                var descricao = document.getElementById("descricaoInput").value;

                // Cria um objeto com os dados da transação
                var transaction = {
                    nome: nome,
                    valor: valor,
                    tipo: tipo,
                    descricao: descricao
                };

                // Cria um elemento de lista para a transação
                var transactionListItem = document.createElement("li");
                transactionListItem.textContent = `Nome: ${nome} | Valor: R$ ${valor} | Tipo: ${tipo} | Descrição: ${descricao}`;

                // Adiciona a transação à lista de transações
                var transactionList = document.getElementById("transactionList");
                transactionList.appendChild(transactionListItem);

                // Limpa os campos do formulário
                document.getElementById("nome").value = "";
                document.getElementById("valorInput").value = "";
                document.getElementById("tipoInput").value = "";
                document.getElementById("descricaoInput").value = "";
            });
        });
    </script>
</body>
</html>
