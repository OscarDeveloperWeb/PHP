<?php
if (isset($_GET['inicio']) && isset($_GET['final'])) {
    $startYear = $_GET['inicio'];
    $endYear = $_GET['final'];

    $baseUrl = "https://api.worldbank.org/pip/v1/pip?country=PER";
    $dataArray = [];
    function getCurlResponse($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    $var = getCurlResponse($baseUrl);
    $data = json_decode($var, true);

    foreach ($data as $item) {
        $year = $item['reporting_year'] ?? null;
        $headcount = $item['headcount'] ?? null;
        if ($year !== null && $headcount !== null && $year >= $startYear && $year <= $endYear) {
            $dataArray[] = [
                'year' => $year,
                'headcount' => $headcount
            ];
        }
    }
    echo json_encode($dataArray);
}

