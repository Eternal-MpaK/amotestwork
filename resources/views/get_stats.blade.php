<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Тестовое задание №2</title>
        <script src="https://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">

        </header>
        <div>
            Статистика
        </div>
        <input id="from" type="date">
        <input id="to" type="date">
        <div style="margin-top: 10px">
            <input id="sendRequest" type="button" value="Отправить запрос">
        </div>
        <div>
            <div style="display: inline-block; width: 40%">
                <canvas id="lineChart"></canvas>
            </div>
            <div style="display: inline-block; width: 20%">
                <canvas id="pieChart"></canvas>
            </div>
        </div>

    </body>
{{--    <script src="http://amotestwork.test/js/statistic_widget.js"></script>--}}
    <script>
        $(document).ready(function() {
            let from = $("#from")
            let to = $("#to")

            let lineChart
            let pieChart

            from.val(new Date().toISOString().split('T')[0])
            to.val(new Date().toISOString().split('T')[0])
            console.log(from.val())
                // const ctx = document.getElementById('lineChart');
            let requestStats = function () {
                $.get(`/api/show_stats?from=${from.val()}&to=${to.val()}`, (res) => {
                    console.log(res)
                    lineChart = new Chart($("#lineChart"), {
                        type: 'line',
                        data: {
                            labels: res.lineChart.labels,
                            datasets: res.lineChart.datasets
                        },
                        options: {

                        }
                    });
                    pieChart = new Chart($("#pieChart"), {
                        type: 'doughnut',
                        data: {
                            labels: res.pieChart.labels,
                            datasets: res.pieChart.datasets
                        },
                        options: {

                        }
                    });
                })
            }
            requestStats()
            $("#sendRequest").on("click", () => {
                lineChart.destroy()
                pieChart.destroy()

                requestStats()
            })
        })



    </script>
</html>
