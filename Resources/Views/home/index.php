<script>
    $(document).ready(function () {
        // Charts
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(vendasCliente);
        google.charts.setOnLoadCallback(vendasServico);
        google.charts.setOnLoadCallback(vendasDiarias);
        // Detalhar
        $("#btnExpandir").click(function () {
            $("#CntDetalhar").show("fast");
            $("#btnRecolher").show("fast");
            $("#btnExpandir").hide("fast");
        });
        $("#btnRecolher").click(function () {
            $("#CntDetalhar").hide("fast");
            $("#btnRecolher").hide("fast");
            $("#btnExpandir").show("fast");
        });


    });</script>
<div class="container print">
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title">Vendas diarias</h4>
            <?php
            $vendas = $this->vendas->allValues();


            foreach ($vendas as $key => $venda) {
                if (isset($array[$venda->dataVenda])) {
                    $array[$venda->dataVenda] = array(
                        $array['data'] = $venda->dataVenda,
                        $array['valorFaturado'] += $venda->valorFaturado,
                        $array['valorCusto'] += $venda->valorCusto,
                        $array['resultadoVenda'] += $venda->resultadoVenda);
                } else {
                    $array[$venda->dataVenda] = array(
                        $array['data'] = $venda->dataVenda,
                        $array['valorFaturado'] = $venda->valorFaturado,
                        $array['valorCusto'] = $venda->valorCusto,
                        $array['resultadoVenda'] = $venda->resultadoVenda);
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


            ?>
        </div>
        <div class="card-body">
            <div class="container d-flex flex-wrap justify-content-center">
                <h4 class="card-title col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">Vendas diarias detalhadas</h4>
                <div class="text-end">
                    <div class="btn btn-info" style="display: block;" id="btnExpandir">EXPANDIR</div>
                    <div class="btn btn-info" style="display: none;" id="btnRecolher">RECOLHER</div>

                </div>
            </div>
            <div id="CntDetalhar" style="display: none;" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Valor Faturado</th>
                        <th scope="col">Valor Custo</th>
                        <th scope="col">Resultado venda</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $vendas = $this->vendas->allValues();
                    foreach ($vendas as $key => $venda) {
                        if (isset($array[$venda->dataVenda])) {
                            $array[$venda->dataVenda] = array(
                                $array['data'] = $venda->dataVenda,
                                $array['valorFaturado'] += $venda->valorFaturado,
                                $array['valorCusto'] += $venda->valorCusto,
                                $array['resultadoVenda'] += $venda->resultadoVenda);
                        } else {
                            $array[$venda->dataVenda] = array(
                                $array['data'] = $venda->dataVenda,
                                $array['valorFaturado'] = $venda->valorFaturado,
                                $array['valorCusto'] = $venda->valorCusto,
                                $array['resultadoVenda'] = $venda->resultadoVenda);
                        }
                    }//var_dump($array);

                    $i = 0;

                    $f = new \Core\functions();

                    foreach ($array as $key => $dado) {
                        $i++;
                        if ($i > 4) {
                            $data = date('d/m/Y', strtotime(str_replace("-", "/", $dado[0])));
                            echo "<tr><td>$data</td>";
                            echo "<td>" . $f->moeda($dado[1]) . "</td>";
                            echo "<td>" . $f->moeda($dado[2]) . "</td>";
                            echo "<td>" . $f->moeda($dado[3]) . "</td></tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-group mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vendas faturadas por cliente</h4>
                <?php
                $clientes = $this->clientes->allValues();
                $vendas = $this->vendas->allValues();

                $array = [];

                foreach ($vendas as $key => $venda) {
                    $clienteidVenda = $venda->clienteId;
                    foreach ($clientes as $key => $cliente) {
                        $clienteid = $cliente->id;
                        if ($clienteid == $clienteidVenda) {
                            $k = $cliente->razaoSocial . " (" . $cliente->cnpj . ")";
                            if (isset($array[$k])) {
                                $array[$k] += $venda->valorFaturado;
                            } else {
                                $array[$k] = $venda->valorFaturado;
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
                ?>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vendas faturadas por serviço</h4>
                <?php
                $servicos = $this->servicos->allValues();
                $vendas = $this->vendas->allValues();

                $array = [];

                foreach ($vendas as $key => $venda) {
                    $servicoidVenda = $venda->servicoId;
                    foreach ($servicos as $key => $servico) {
                        $servicoid = $servico->id;
                        if ($servicoid == $servicoidVenda) {
                            if (isset($array[$servico->descricaoServico])) {
                                $array[$servico->descricaoServico] += $venda->valorFaturado;
                            } else {
                                $array[$servico->descricaoServico] = $venda->valorFaturado;
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
                ?>
            </div>
        </div>
    </div>
</div>
