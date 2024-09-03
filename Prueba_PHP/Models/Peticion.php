<?php
class Consulta {
    private $baseUrl;
    public function __construct()
    {
        $this->baseUrl = "https://api.worldbank.org/pip/v1/pip?country=PER";
    }
    private function getCurlResponse($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function getDatos($startYear, $endYear)
    {
        $dataArray = [];
        $response = $this->getCurlResponse($this->baseUrl);
        $data = json_decode($response, true);
        
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
        return $dataArray;
    }
}

