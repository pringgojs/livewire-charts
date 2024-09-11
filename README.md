# Livewire Apexchart component

Apexchart livewire component

Here's an example of how you can use it in your views:

```php
$legend = ['Category A', 'Category B', 'Category C', 'Category D'];
$series = [
    [
        'name' => 'Series 1',
        'data' => [10, 20, 15, 25],
    ],
    [
        'name' => 'Series 2',
        'data' => [12, 18, 22, 30],
    ],
];
```

```bladehtml
<livewire:bar-chart-component :series="$series" :categories="$legend" :$title  />
```

## Installation

You can install the package via composer:

```bash
composer require pringgojs/livewire-charts
```

## Update Data Chart

Here's an example:

```php
use Pringgojs\LivewireCharts\BarChartComponent;

function updateChart() {
    ...
    $this->dispatch('updateChart', $categories, $series)->to(BarChartComponent::class);
}
```
