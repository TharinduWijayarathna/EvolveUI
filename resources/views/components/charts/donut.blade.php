@props([
    'id' => 'donutChart',
    'series' => [],
    'labels' => [],
    'colors' => [],
    'centerValue' => '',
    'centerLabel' => '',
    'height' => 250,
])

<div class="mx-auto aspect-square" style="max-height: {{ $height }}px;">
    <div class="relative h-full w-full">
        <div id="{{ $id }}"></div>
        <div class="absolute left-1/2 top-1/2 z-10 -translate-x-1/2 -translate-y-1/2 pointer-events-none pb-7">
            <div class="text-center">
                <div class="text-3xl font-bold leading-none text-foreground">{{ $centerValue }}</div>
                <div class="mt-1 text-sm text-muted-foreground">{{ $centerLabel }}</div>
            </div>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <style>
            /* Hide ApexCharts default labels */
            .donut-chart .apexcharts-datalabels {
                display: none !important;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if dark mode
            const isDark = document.documentElement.classList.contains('dark');
            const backgroundColor = isDark ? '#252525' : '#ffffff';
            
            const chart_{{ $id }} = new ApexCharts(
                document.querySelector("#{{ $id }}"),
                {
                    series: @json($series),
                    chart: {
                        type: 'donut',
                        height: {{ $height }},
                        fontFamily: 'inherit',
                    },
                    labels: @json($labels),
                    colors: @json($colors),
                    stroke: {
                        show: true,
                        width: 5,
                        colors: [backgroundColor]
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%',
                                labels: {
                                    show: false
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        fontWeight: 400,
                        labels: {
                            colors: isDark ? '#a3a3a3' : '#737373'
                        },
                        markers: {
                            width: 12,
                            height: 12,
                            radius: 2
                        },
                        itemMargin: {
                            horizontal: 8,
                            vertical: 8
                        }
                    },
                    tooltip: {
                        enabled: true,
                        y: {
                            formatter: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            );
            chart_{{ $id }}.render();
        });
    </script>
@endpush

