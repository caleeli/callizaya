<?php

namespace Tests\Feature;

use function GuzzleHttp\json_encode;

trait ChartJsTrait
{
    /**
     * Save a chart
     *
     * @param array $values
     */
    public function saveLineChart($title, $labelX, $labelY, array $labels, ...$lines)
    {
        $datasets = [];
        foreach ($lines as $data) {
            $datasets[] = ['data' => $data];
        }
        $code = 'var myLineChart = new Chart(canvas, {
            type: "line",
            data: ' . json_encode(['labels' => $labels, 'datasets' => $datasets]) . ',
            options: {
                title: {display:true, text:' . json_encode($title) . '},
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: ' . json_encode($labelX) . '
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: ' . json_encode($labelY) . '
                        }
                    }],
                }
            },
        });';
        $chartJsTrait = md5(get_class($this) . '::' . $this->getName()) . '.js';
        file_put_contents('coverage/' . $chartJsTrait, $code);
    }
}
