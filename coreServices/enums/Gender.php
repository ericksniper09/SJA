<?php

namespace enumerations;

include_once 'BaseEnum.php';

abstract class Gender extends BaseEnum {
    const SEX_M = "Male";
    const SEX_F = "Female";
    const SEX_U = "Unspecified";
}