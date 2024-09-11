<?php

namespace Pringgojs\LivewireCharts;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Livewire\Livewire;

class LivewireChartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-charts')
            ->hasViews(); // Menyatakan bahwa package ini memiliki views.
    }

    public function bootingPackage()
    {
        // Registrasi komponen Livewire
        Livewire::component('bar-chart-component', BarChartComponent::class);
    }
}
