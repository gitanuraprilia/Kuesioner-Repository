@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Charts</h1>
        </div>
        <div class="row">
            @foreach ($questions as $question)
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $question->question_text }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                @if ($question->results->count() > 0)
                                    <canvas id="pieChart{{ $question->id }}"></canvas>
                                @else
                                    <p>Belum ada data</p>
                                @endif

                            </div>
                            @if ($question->category_id == 1)
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: red;"></i> Sangat tidak setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: orange;"></i> Tidak setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: yellow;"></i> Cukup tidak setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: gray;"></i> Netral
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: lightgreen;"></i> Cukup setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: green;"></i> Setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: darkgreen;"></i> Sangat setuju
                                    </span>
                                </div>
                            @else
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: darkgreen;"></i> Sangat setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: green;"></i> Setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: gray;"></i> Netral
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: orange;"></i> Tidak setuju
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: red;"></i> Sangat tidak setuju
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Menampilkan pagination links -->
            <div class="d-flex justify-content-center">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
    <script>
        $(document).ready(function() {


            @foreach ($questions as $question)
                // Inisialisasi chart

                var ctx = document.getElementById("pieChart{{ $question->id }}");

                var myPieChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Sangat tidak setuju", "Tidak setuju", "Cukup tidak setuju", "Netral",
                            "Cukup setuju", "Setuju", "Sangat setuju"
                        ],
                        datasets: [{
                            data: [
                                {{ $question->option_counts['Sangat tidak setuju'] }},
                                {{ $question->option_counts['Tidak setuju'] }},
                                {{ $question->option_counts['Cukup tidak setuju'] }},
                                {{ $question->option_counts['Netral'] }},
                                {{ $question->option_counts['Cukup setuju'] }},
                                {{ $question->option_counts['Setuju'] }},
                                {{ $question->option_counts['Sangat setuju'] }}
                            ],
                            backgroundColor: ['#FF0000', '#FFA500', '#FFFF00', '#808080', '#90EE90',
                                '#008000', '#006400'
                            ],
                            hoverBackgroundColor: ['#FF6666', '#FFB84D', '#FFFF66', '#A9A9A9',
                                '#A2D3A2', '#33CC33', '#004d00'
                            ],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                        legend: {
                            display: false
                        },
                        cutoutPercentage: 80,
                    }
                });
            @endforeach

        });
    </script>
@endpush
