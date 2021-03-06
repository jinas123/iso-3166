<?php

namespace Jinas\ISO;

class ISO3166
{
    public $data = [];

    public function __construct()
    {
        $this->GetJsonData();
    }

    protected function GetJsonData()
    {
        $this->data = collect(json_decode(file_get_contents(__DIR__.'/iso-3166.json'), true));
    }

    /**
     * whereAlpha2.
     *
     *  Get country by ISO 3166-1 Alpha-2
     *
     * @param mixed $alpha2
     *
     * @return array
     */
    public function whereAlpha2(string $alpha2): array
    {
        return $this->data->where('alpha2', strtoupper($alpha2))->values()->toArray()[0];
    }

    /**
     * whereAlpha3.
     *
     *  Get country by ISO 3166-1 Alpha-3
     *
     * @param mixed $alpha3
     *
     * @return array
     */
    public function whereAlpha3(string $alpha3): array
    {
        return $this->data->where('alpha3', strtoupper($alpha3))->values()->toArray()[0];
    }

    /**
     * whereNumeric.
     *
     *  Get country by ISO 3166-1 Numeric
     *
     * @param mixed $numeric
     *
     * @return array
     */
    public function whereNumeric(int $numeric): array
    {
        return $this->data->where('numeric', $numeric)->values()->toArray()[0];
    }

    /**
     * whereCountry.
     *
     *  Get values by country name
     *
     * @param mixed $country
     *
     * @return array
     */
    public function whereCountry(string $country): array
    {
        return $this->data->where('country', ucfirst(strtolower($country)))->values()->toArray()[0];
    }
}
