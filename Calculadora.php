<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/css/bootstrap.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous" />
    <style>
        body {
            background-color: rgb(0,0,0);
        }
    </style>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU/+6DcTmMmU6/8DK5EKv84mGzZM2sA==" crossorigin="anonymous"></script>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Calculadora PHP</h1>
                    </div>
                    <div class="card-body">
                        <form id="calculator-form" method="GET" action="">
                            <div class="form-row">
                                <div class="col">
                                    <input type="number" class="form-control" id="numero1" name="numero1" placeholder="Número 1">
                                </div>
                                <div class="col">
                                    <select class="form-control" id="operacao" name="operacao">
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                        <option value="*">*</option>
                                        <option value="/">/</option>
                                        <option value="potencia">^</option>
                                        <option value="fatorial">!</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" id="numero2" name="numero2" placeholder="Número 2">
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col">
                                    <button type="submit" id="calcular" name="calcular" class="btn btn-secondary mr-2">Calcular</button>
                                    <button type="button" id="apagarHistorico" name="apagarHistorico" class="btn btn-danger">Apagar Histórico</button>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="salvar">Salvar</button>
                                    <button type="button" class="btn btn-primary" id="memoria">Memória</button>
                                    <button type="button" class="btn btn-success" id="historico">Histórico</button>
                                    <button type="button" class="btn btn-success" id="pegarValores">Pegar Valores</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Resultado do Cálculo</h5>
                        <p class="card-text" id="resultado"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var historicoMemoria = "";

    document.getElementById("calculator-form").addEventListener("submit", function(event) {
        event.preventDefault();
        var numero1 = parseFloat(document.getElementById("numero1").value);
        var numero2 = parseFloat(document.getElementById("numero2").value);
        var operacao = document.getElementById("operacao").value;

        if (isNaN(numero1) || isNaN(numero2)) {
           alert("Por favor, insira apenas números válidos.");
            return;
        }

        var resultado = calcular(numero1, operacao, numero2);
        exibirResultado(resultado);
    });

    function calcular(numero1, operacao, numero2) {
        switch (operacao) {
            case '+':
                return numero1 + numero2;
            case '-':
                return numero1 - numero2;
            case '*':
                return numero1 * numero2;
            case '/':
                if (numero2 === 0) {
                    throw new Error("Divisão por zero é inválida.");
                }
                return numero1 / numero2;
            case 'potencia':
                return Math.pow(numero1, numero2);
            case 'fatorial':
                return fatorial(numero1);
            default:
                throw new Error("Operação inválida.");
        }
    }

    function fatorial(numero) {
        if (numero < 0) {
            throw new Error("Número negativo não é permitido.");
        }
        if (numero === 0 || numero === 1) {
            return 1;
        }
        return numero * fatorial(numero - 1);
    }

    function exibirResultado(resultado) {
        var cardResultado = document.getElementById("resultadoCalculo");
        var paragrafoResultado = document.getElementById("resultado");
        paragrafoResultado.innerText = resultado;
        cardResultado.style.display = "block";
    }

    document.getElementById("memoria").addEventListener("click", function() {
        historicoMemoria += "Resultado: " + document.getElementById("resultado").innerText + "\n";
        alert(historicoMemoria);
    });

    document.getElementById("salvar").addEventListener("click", function() {
        historicoMemoria += "Resultado: " + document.getElementById("resultado").innerText + "\n";
        alert(historicoMemoria);
    });

    document.getElementById("historico").addEventListener("click", function() {
        alert(historicoMemoria);
    });

    document.getElementById("pegarValores").addEventListener("click", function() {
      if (resultado !== null) {
        document.getElementById("numero1").value = resultado;
        document.getElementById("numero2").value = ""; 
      } else {
        alert("Não há resultado anterior para pegar.");
      }
    });

    document.getElementById("apagarHistorico").addEventListener("click", function() {
        historicoMemoria = "";
        alert("Histórico apagado.");
    });

    document.getElementById("limpar").addEventListener("click", function() {
        document.getElementById("numero1").value = "";
        document.getElementById("numero2").value= "";
        document.getElementById("operacao").value = "+";
        document.getElementById("resultado").innerText = "";
    });
});
</script>
<?php

class Calculadora {
    public function calcular($numero1, $operacao, $numero2) {
        switch ($operacao) {
            case '+':
                return $numero1 + $numero2;
            case '-':
                return $numero1 - $numero2;
            case '*':
                return $numero1 * $numero2;
            case '/':
                if ($numero2 == 0) {
                    throw new Exception("Divisão por zero é inválida.");
                }
                return $numero1 / $numero2;
            case 'potencia':
                return pow($numero1, $numero2);
            case 'fatorial':
                return $this->fatorial($numero1);
            default:
                throw new Exception("Operação inválida.");
        }
    }

    private function fatorial($numero) {
        if ($numero < 0) {
            throw new Exception("Número negativo não é permitido.");
        }
        if ($numero === 0 || $numero === 1) {
            return 1;
        }
        return $numero * $this->fatorial($numero - 1);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $numero1 = isset($_GET["numero1"]) ? $_GET["numero1"] : null;
    $numero2 = isset($_GET["numero2"]) ? $_GET["numero2"] : null;
    $operacao = isset($_GET["operacao"]) ? $_GET["operacao"] : null;

    if (!is_numeric($numero1) || !is_numeric($numero2)) {
        $erro = "Invalid number.";
    } else {
        $calc = new Calculadora();
        try {
            $resultado = $calc->calcular($numero1, $operacao, $numero2);
        } catch (Exception $e) {
            $erro = $e->getMessage();
        }
    }

    if (isset($erro)) {
        echo "<script>alert('$erro');</script>";
    } else {
        echo "<div id='resultadoCalculo' style='display: none;'>
                <p id='resultado'>$resultado</p>
              </div>";
    }

    
}

?>