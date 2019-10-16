<?php

namespace enumerations;

include_once 'BaseEnum.php';

abstract class Occupation extends BaseEnum {
    const OCC_STUDENT = "Student";
    const OCC_EMPLOYED = "Employed";
    const OCC_UNEMPLOYED = "Unemployed";
    const OCC_RETIRED = "Retired";
}