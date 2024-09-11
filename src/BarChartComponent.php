<?php

namespace Pringgojs\LivewireCharts;

use Livewire\Attributes\Reactive;
use Illuminate\Support\Str;
use Livewire\Component;

class BarChartComponent extends Component
{
    #[Reactive] 
    public $title;
    
    #[Reactive] 
    public $categories = [];

    #[Reactive] 
    public $series = [];

    public $colors = [];
    public $id;

    protected $listeners = ['refreshComponent' => '$refresh', 'updateChart'];

    public function mount($series, $categories)
    {
        $this->id = Str::random(10);
        $this->series = $series;
        $this->categories = $categories;
        $this->colors = $this->generateColors(count($series));
    }

    public function updateChart($categories, $series)
    {
        $this->dispatch('update-chart', categories: $categories, series: $series);
    }

    private function generateColors($count)
    {
        $colors = [
            '#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6'
        ];
        return array_slice($colors, 0, $count);
    }

    public function render()
    {
        return view('livewire-charts::bar-chart-component');
    }
}