<?php

namespace model;

class HomeModel
{
    public function __construct()
    {
        $this->dao = new \dao\Dao();
    }
    public function grafVendasByServico()
    {
        $servicos = $this->dao->getAll("servicos");
        $vendas = $this->dao->getAll("vendas");

        $array = [];

        foreach ($vendas as $key => $venda) {
            $servicoidVenda = $venda['servicoId'];
            foreach ($servicos as $key => $servico) {
                $servicoid = $servico['id'];
                if ($servicoid == $servicoidVenda) {
                    if (isset($array[$servico['descricaoServico']])) {
                        $array[$servico['descricaoServico']] += $venda['valorFaturado'];
                    } else {
                        $array[$servico['descricaoServico']] = $venda['valorFaturado'];
                    }
                }
            }
        }
        echo "<script>
        function vendasServico() {
            var data = google.visualization.arrayToDataTable([
                ['Serviço', 'Valor Faturado'],";
        foreach ($array as $key => $servico) {
            echo "['$key',  $servico],";
        }
                echo "]);
                var formatter = new google.visualization.NumberFormat({
                    prefix: 'R$ ', decimalSymbol: ',', groupingSymbol: '.' });
                    formatter.format(data, 0); formatter.format(data, 1);
                    var chart = new google.visualization.PieChart(document.getElementById('vendasServico'));
                    chart.draw(data);
                } </script>
                <div id='vendasServico'  style='height: 400px;'></div>";
    }
    public function grafVendasByCliente()
    {
        $clientes = $this->dao->getAll("clientes");
        $vendas = $this->dao->getAll("vendas");

        $array = [];

        foreach ($vendas as $key => $venda) {
            $clienteidVenda = $venda['clienteId'];
            foreach ($clientes as $key => $cliente) {
                $clienteid = $cliente['id'];
                if ($clienteid == $clienteidVenda) {
                    $k = $cliente['razaoSocial'] . " (" . $cliente['cnpj'] . ")";
                    if (isset($array[$k])) {
                        $array[$k] += $venda['valorFaturado'];
                    } else {
                        $array[$k] = $venda['valorFaturado'];
                    }
                }
            }
        }
        echo "<script>
        function vendasCliente() {
            var data = google.visualization.arrayToDataTable([
                ['Serviço', 'Valor Faturado'],";
        foreach ($array as $key => $cliente) {
            echo "['$key',  $cliente],";
        }
                echo "]);
                var formatter = new google.visualization.NumberFormat({
                    prefix: 'R$ ', decimalSymbol: ',', groupingSymbol: '.' });
                    formatter.format(data, 0); formatter.format(data, 1);
                    var chart = new google.visualization.PieChart(document.getElementById('vendasCliente'));
                    chart.draw(data);
                } </script>
                <div id='vendasCliente'  style='height: 400px;'></div>";
    }

    public function grafVendasDiaria()
    {
        $vendas = $this->dao->getAllOrder("vendas");


        foreach ($vendas as $key => $venda) {
            if (isset($array[$venda['dataVenda']])) {
                $array[$venda['dataVenda']] = array(
                    $array['data'] = $venda['dataVenda'],
                    $array['valorFaturado'] += $venda['valorFaturado'],
                    $array['valorCusto'] += $venda['valorCusto'],
                    $array['resultadoVenda'] += $venda['resultadoVenda']);
            } else {
                $array[$venda['dataVenda']] = array(
                    $array['data'] = $venda['dataVenda'],
                    $array['valorFaturado'] = $venda['valorFaturado'],
                    $array['valorCusto'] = $venda['valorCusto'],
                    $array['resultadoVenda'] = $venda['resultadoVenda']);
            }
        }//var_dump($array);

        $i = 0;



        echo "<script>
        function vendasDiarias  () {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['Data', 'Valor Faturado', 'Valor de Custo', 'Resultado da Venda'],";


        foreach ($array as $key => $dado) {
            $i++;
            if ($i > 4) {
                    $data = date('d/m/Y', strtotime(str_replace("-", "/", $dado[0])));
                    echo "['$data',  $dado[1], $dado[2], $dado[3]],";
            }
        }


        echo "]);

            var options = {
              vAxis: {title: 'Valores'},
              hAxis: {title: 'Dias'},
              };
              var formatter = new google.visualization.NumberFormat({
                prefix: 'R$ ', decimalSymbol: ',', groupingSymbol: '.' });
                formatter.format(data, 0);
                formatter.format(data, 1);
                formatter.format(data, 2);
                formatter.format(data, 3);
            var chart = new google.visualization.AreaChart(document.getElementById('vendasDiarias'));
            chart.draw(data, options);
          }
          </script>
        <div id='vendasDiarias' style='height: 500px;'></div>";
    }
    public function vendasDiariaDetalhada()
    {
        $vendas = $this->dao->getAllOrder("vendas");


        foreach ($vendas as $key => $venda) {
            if (isset($array[$venda['dataVenda']])) {
                $array[$venda['dataVenda']] = array(
                    $array['data'] = $venda['dataVenda'],
                    $array['valorFaturado'] += $venda['valorFaturado'],
                    $array['valorCusto'] += $venda['valorCusto'],
                    $array['resultadoVenda'] += $venda['resultadoVenda']);
            } else {
                $array[$venda['dataVenda']] = array(
                    $array['data'] = $venda['dataVenda'],
                    $array['valorFaturado'] = $venda['valorFaturado'],
                    $array['valorCusto'] = $venda['valorCusto'],
                    $array['resultadoVenda'] = $venda['resultadoVenda']);
            }
        }//var_dump($array);

        $i = 0;


        foreach ($array as $key => $dado) {
            $i++;
            if ($i > 4) {
                $data = date('d/m/Y', strtotime(str_replace("-", "/", $dado[0])));
                echo "<tr><td>$data</td>";
                echo "<td>" . moeda($dado[1]) . "</td>";
                echo "<td>" . moeda($dado[2]) . "</td>";
                echo "<td>" . moeda($dado[3]) . "</td></tr>";
            }
        }
    }
}
