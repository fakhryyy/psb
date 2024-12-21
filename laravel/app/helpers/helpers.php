<?php

if (!function_exists('generateDateDropdowns')) {
    function generateDateDropdowns($selectedDate = null)
    {
        $date = $selectedDate ? \Carbon\Carbon::parse($selectedDate) : null;

        $days = range(1, 31);
        $dayOptions = '<option value="" disabled selected>Pilih Tanggal</option>';
        foreach ($days as $day) {
            $selected = ($date && $date->day == $day) ? 'selected' : '';
            $dayOptions .= "<option value='{$day}' {$selected}>{$day}</option>";
        }

        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        $monthOptions = '<option value="" disabled selected>Pilih Bulan</option>';
        foreach ($months as $key => $month) {
            $selected = ($date && $date->month == $key) ? 'selected' : '';
            $monthOptions .= "<option value='{$key}' {$selected}>{$month}</option>";
        }

        $years = range(date('Y'), 1900);
        $yearOptions = '<option value="" disabled selected>Pilih Tahun</option>';
        foreach ($years as $year) {
            $selected = ($date && $date->year == $year) ? 'selected' : '';
            $yearOptions .= "<option value='{$year}' {$selected}>{$year}</option>";
        }

        return compact('dayOptions', 'monthOptions', 'yearOptions');
    }
}
