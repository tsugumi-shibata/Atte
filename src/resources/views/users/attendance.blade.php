@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="title">
        <p class="user_name">{{ $user->name }}さんの勤怠表</p>
    </div>

    <p class="date-navigation">
        <a href="{{ route('users.attendance.show', ['user' => $user->id, 'date' => $carbonDate->copy()->subDay()->format('Y-m-d')]) }}" class="button">&lt;</a>
        <span class="date">{{ $carbonDate->format('Y-m-d') }}</span>
        <a href="{{ route('users.attendance.show', ['user' => $user->id, 'date' => $carbonDate->copy()->addDay()->format('Y-m-d')]) }}" class="button">&gt;</a>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach($works as $work)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($work->work_start)->format('H:i:s') }}</td>
                    <td>{{ $work->work_end ? \Carbon\Carbon::parse($work->work_end)->format('H:i:s') : '-' }}</td>
                    <td>
                        @php
                            $breakDuration = $work->breakTimes->sum(function($break) {
                                if ($break->break_end) {
                                    return \Carbon\Carbon::parse($break->break_end)->diffInMinutes(\Carbon\Carbon::parse($break->break_start));
                                }
                                return 0;
                            });
                            $breakHours = floor($breakDuration / 60);
                            $breakMinutes = $breakDuration % 60;
                        @endphp
                        {{ sprintf('%02d:%02d:00', $breakHours, $breakMinutes) }}
                    </td>
                    <td>
                        @php
                            $workDuration = 0;
                            if ($work->work_end) {
                                $workDuration = \Carbon\Carbon::parse($work->work_end)->diffInMinutes(\Carbon\Carbon::parse($work->work_start));
                                $workDuration -= $breakDuration;
                            }
                            $workHours = floor($workDuration / 60);
                            $workMinutes = $workDuration % 60;
                        @endphp
                        {{ sprintf('%02d:%02d:00', $workHours, $workMinutes) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $works->links() }}
    </div>
</div>
@endsection