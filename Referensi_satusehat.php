<?php

require "ServiceReferensi.php";
class Referensi
{
    protected $serviceReferensi;

    public function __construct()
    {
        $this->serviceReferensi = new ServiceReferensi;
    }

    public function getDiagnosa($kode)
    {
        $diagnosa = $this->serviceReferensi->diagnosa($kode);
        return $diagnosa;
    }

    public function getPatient($nik)
    {
        $hasil = $this->serviceReferensi->getPatient($nik);
        return $hasil;
    }

    public function createEncounter($data)
    {
        $hasil = $this->serviceReferensi->createEncounter($data);
        return $hasil;
    }

    public function createMedication($data)
    {
        $hasil = $this->serviceReferensi->createMedication($data);
        return $hasil;
    }

}

$referensi = new Referensi;

echo "<p>";
echo $referensi->getPatient('3507070101750041');
echo "</p>";

$data = '{
    "identifier": [
        {
            "use": "official",
            "value": "2311200298",
            "system": "https://sys-ids.kemkes.go.id/encounter/100026255"
        }
    ],
    "class": {
        "code": "AMB",
        "system": "http://terminology.hl7.org/CodeSystem/v3-ActCode",
        "display": "Ambulatory"
    },
    "status": "in-progress",
    "subject": {
        "display": "NAYRA NAJMI HARINDA",
        "reference": "Patient/P10883745559"
    },
    "participant": [
        {
            "type": [
                {
                    "coding": [
                        {
                            "code": "ATND",
                            "system": "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                            "display": "attender"
                        }
                    ]
                }
            ],
            "individual": {
                "display": "DR. I KETUT HARY WIDYATAMA, SP. THT-KL",
                "reference": "Practitioner/10011828209"
            }
        }
    ],
    "period": {
        "start": "2023-11-20T09:38:50+07:00"
    },
    "location": [
        {
            "location": {
                "display": "POLI THT",
                "reference": "Location/dab1d6db-d92d-4fbc-83a6-329d445f294a"
            }
        }
    ],
    "statusHistory": [
        {
            "period": {
                "end": "2023-11-20T15:15:35+07:00",
                "start": "2023-11-20T09:38:50+07:00"
            },
            "status": "arrived"
        },
        {
            "period": {
                "start": "2023-11-20T15:15:35+07:00"
            },
            "status": "in-progress"
        }
    ],
    "serviceProvider": {
        "reference": "Organization/100026255"
    },
    "resourceType": "Encounter"
}';

$data_medication = '{
    "resourceType": "Medication",
    "meta": {
        "profile": [
            "https://fhir.kemkes.go.id/r4/StructureDefinition/Medication"
        ]
    },
    "identifier": [
        {
            "system": "http://sys-ids.kemkes.go.id/medication/10000004",
            "use": "official",
            "value": "123456789"
        }
    ],
    "code": {
        "coding": [
            {
                "system": "http://sys-ids.kemkes.go.id/kfa",
                "code": "93001019",
                "display": "Obat Anti Tuberculosis / Rifampicin 150 mg / Isoniazid 75 mg / Pyrazinamide 400 mg / Ethambutol 275 mg Kaplet Salut Selaput (KIMIA FARMA)"
            }
        ]
    },
    "status": "active",
    "manufacturer": {
        "reference": "Organization/900001"
    },
    "form": {
        "coding": [
            {
                "system": "http://terminology.kemkes.go.id/CodeSystem/medication-form",
                "code": "BS023",
                "display": "Kaplet Salut Selaput"
            }
        ]
    },
    "ingredient": [
        {
            "itemCodeableConcept": {
                "coding": [
                    {
                        "system": "http://sys-ids.kemkes.go.id/kfa",
                        "code": "91000330",
                        "display": "Rifampin"
                    }
                ]
            },
            "isActive": true,
            "strength": {
                "numerator": {
                    "value": 150,
                    "system": "http://unitsofmeasure.org",
                    "code": "mg"
                },
                "denominator": {
                    "value": 1,
                    "system": "http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm",
                    "code": "TAB"
                }
            }
        },
        {
            "itemCodeableConcept": {
                "coding": [
                    {
                        "system": "http://sys-ids.kemkes.go.id/kfa",
                        "code": "91000328",
                        "display": "Isoniazid"
                    }
                ]
            },
            "isActive": true,
            "strength": {
                "numerator": {
                    "value": 75,
                    "system": "http://unitsofmeasure.org",
                    "code": "mg"
                },
                "denominator": {
                    "value": 1,
                    "system": "http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm",
                    "code": "TAB"
                }
            }
        },
        {
            "itemCodeableConcept": {
                "coding": [
                    {
                        "system": "http://sys-ids.kemkes.go.id/kfa",
                        "code": "91000329",
                        "display": "Pyrazinamide"
                    }
                ]
            },
            "isActive": true,
            "strength": {
                "numerator": {
                    "value": 400,
                    "system": "http://unitsofmeasure.org",
                    "code": "mg"
                },
                "denominator": {
                    "value": 1,
                    "system": "http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm",
                    "code": "TAB"
                }
            }
        },
        {
            "itemCodeableConcept": {
                "coding": [
                    {
                        "system": "http://sys-ids.kemkes.go.id/kfa",
                        "code": "91000288",
                        "display": "Ethambutol"
                    }
                ]
            },
            "isActive": true,
            "strength": {
                "numerator": {
                    "value": 275,
                    "system": "http://unitsofmeasure.org",
                    "code": "mg"
                },
                "denominator": {
                    "value": 1,
                    "system": "http://terminology.hl7.org/CodeSystem/v3-orderableDrugForm",
                    "code": "TAB"
                }
            }
        }
    ],
    "extension": [
        {
            "url": "https://fhir.kemkes.go.id/r4/StructureDefinition/MedicationType",
            "valueCodeableConcept": {
                "coding": [
                    {
                        "system": "http://terminology.kemkes.go.id/CodeSystem/medication-type",
                        "code": "NC",
                        "display": "Non-compound"
                    }
                ]
            }
        }
    ]
 }';

echo "<p>";
echo ($referensi->createEncounter($data));
echo "</p>";

echo "<p>";
echo ($referensi->createMedication($data_medication));
echo "</p>";
