@php
    $colors = [
        'onprogress' => 'warning',
        'completed' => 'success',
        'ontrack' => 'success',
        'overdue' => 'danger',
    ];
    $label = [
        'onprogress' => 'On Progress',
        'completed' => 'Completed',
        'ontrack' => 'On Track',
        'overdue' => 'Overdue',
    ];
@endphp

<span class="badge rounded-pill bg-{{ $colors[$status] ?? 'secondary' }} me-1">{{ $label[$status] ?? $status }}</span>
